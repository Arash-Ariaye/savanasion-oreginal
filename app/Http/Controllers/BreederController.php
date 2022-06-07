<?php

namespace App\Http\Controllers;

use App\Models\Breeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreederController extends Controller
{

    public function index(Request $request)
    {
        $title = 'اسامی مرغدار ها';
        $users = DB::table('breeders')->get();
        return view('farm.breeders', compact('title', 'users'));
    }


    public function create()
    {
        $title = 'افزودن مرغدار';
        return view('farm.add-breeder', compact('title'));
    }


    public function insert(Request $request)
    {
        $check = $request->validate([
            'name' => 'required',
            'capacity' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'وارد کردن نام الظامی است.',
            'capacity.required' => 'وارد کردن مقدار مجوز الظامی است.',
            'address.required' => 'وارد کردن آدرس الظامی است.',
            'phone.required' => 'وارد کردن تلفن الظامی است.',
        ]);
        try {
            Breeder::create($check);
            toastr()->success('مرغدار با موفقیت افزوده شد.');
            return redirect()->route('add-breeder');
        }catch (\Exception $e){
            toastr()->error($e,'خطا!');
            return redirect()->route('add-breeder');
        }

    }


    public function edit(Breeder $breeder)
    {
        $title = 'ویرایش اطلاعات مرغدار';
        $edit = Breeder::find($breeder)->all();
        return view('farm.edit-breeder', compact('edit', 'title'));
    }


    public function update(Breeder $breeder, Request $request)
    {
        $check = $request->validate([
            'name' => 'required',
            'capacity' => 'required|numeric',
            'address' => 'required',
            'phone' => 'required',
        ], [
            '*.required' => 'وارد کردن الظامی است.',
            '*.min' => ' باید بیشتر از 3 کاراکتر باشد',
            '*.max' => ' نباید بیشتر از 30 کاراکتر باشد',
            '*.numeric' => ' مقدار عددی وارد کنید.',
        ]);

        try {
            $breeder->update($check);
            toastr()->success('با موفقیط بروزرسانی شد.');
            return redirect()->route('breeders');
        } catch (\Exception $e) {
            toastr()->error($e,'خطا !');
            return redirect()->route('breeders');
        }

    }

    public function destroy(Breeder $breeder)
    {
        try {
            $breeder->delete();
            toastr()->success('با موفقیط ذخیره شد.');
            return redirect()->route('breeders');
        } catch (\Exception $e) {
            toastr()->error($e,'خطا !');
            return redirect()->route('breeders');
        }

    }
}
