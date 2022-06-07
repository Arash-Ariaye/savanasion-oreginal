<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $data = [
            'title' => ' اطلاعات کارشناسان فارم',
            'expert' => Expert::all(),
        ];

        return view('dashboard.experts', $data);
    }

    public function add_expert()
    {
        $data = [
            'title' => 'افزودن کارشناس فارم'
        ];

        return view('dashboard.add-expert', $data);
    }

    public function create(Expert $expert, Request $request)
    {

        $check = $request->validate([
            'name' => 'required|unique:experts,name',
            'phone' => 'required|numeric|unique:experts,phone'
        ], [
            '*.required' => 'این مقدار را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید.',
            'phone.unique' => 'این شماره قبلا ثبت شده است.',
            'name.unique' => 'این نام قبلا ثبت شده است.',
        ]);
        try {
            Expert::create($check);
            toastr()->success('کارشناس باموفقیت افزوده شد.');
            return redirect()->route('add-expert');
        } catch (\Exception $e) {
            toastr()->error($e);
            return redirect()->route('add-expert');
        }
    }


    public function edit(Expert $expert)
    {
        $data = [
            'title' => 'ویرایش اطلاعات دامپزشک',
            'expert' => Expert::find($expert),
        ];

        return view('dashboard.edit-expert', $data);
    }

    public function update(Request $request, Expert $expert)
    {
        $check = $request->validate([
            'name' => ['required', Rule::unique('experts', 'name')->ignore($expert)],
            'phone' => ['required', 'numeric', Rule::unique('experts', 'phone')->ignore($expert)],
        ], [
            '*.required' => 'این مقدار را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید.',
            'phone.unique' => 'این شماره قبلا ثبت شده است.',
            'name.unique' => 'این نام قبلا ثبت شده است.',
        ]);
        try {
            $expert->update($check);
            toastr()->success('کارشناس باموفقیت ویرایش شد.');
            return redirect()->route('experts');
        } catch (\Exception $e) {
            toastr()->error($e);
            return redirect()->route('experts');
        }
    }

    public function destroy(Expert $expert)
    {
        try {
            $expert->delete();
            toastr()->success('کارشناس باموفقیت حذف شد.');
            return redirect()->route('experts');

        } catch (\Exception $e) {
            toastr()->error($e);
            return redirect()->route('experts');

        }
    }
}
