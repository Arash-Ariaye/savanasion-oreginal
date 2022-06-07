<?php

namespace App\Http\Controllers;

use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{


    public function index()
    {
        $data = [
            'title' => 'دسته بندی',
            'category' => verta()->format('Y-m'),
            'mah' => verta()->format('%B'),
            'sal' => verta()->format('Y'),
            'categories' => DB::table('categories')->orderBy('id', 'desc')->get()
        ];
        return view('dashboard.categories', $data);
    }

    //insert category
    public function insert(Request $request)
    {
        $check = $request->validate([
            'category' => 'required|unique:categories',
            'sal' => 'required',
            'mah' => 'required'
        ],[
            'category.unique' => 'قبلا اضافه شده است.',
        ]);
        try {
            Category::create($check);
            toastr()->success('دسته بندی با موفقیت ذخیره شد.');
            return redirect()->route('category');
        } catch (\Exception $e) {
            toastr()->error($e, 'خطایی در ذخیره سازی رخ داد.');
            return redirect()->back();
        }

    }

    //edit category
    public function edit(Category $category, Request $request)
    {

        $data = [
            'title' => 'ویرایش دسته بندی',
            'categories' => Category::find($category),
        ];
        return view('dashboard.edit-category', $data);
    }

    //update category
    public function update(category $category, Request $request)
    {
        $check = $request->validate([
            'id' => 'required',
            'category' => 'required',
            'mah' => 'required',
            'sal' => 'required'
        ]);
        try {
            $up = Category::find($check['id']);
            $up->update($check);
            toastr()->success('با موفقیت ویرایش شد');
            return redirect()->route('category');
        } catch (\Exception $e) {
            toastr()->error('مشکلی در ذخیره سازی ویرایش پیش آمد :(');
            return redirect()->back();
        }
    }

    public function destroy(category $category)
    {

        try {
            $category->delete();
            toastr()->success('دسته بندی با موفقیت حذف شد.');
            return redirect()->route('category');
        } catch (\Exception $e) {
            toastr()->error('مشکلی در حذف دسته پیش آمد :(');
            return redirect()->back();
        }

    }
}
