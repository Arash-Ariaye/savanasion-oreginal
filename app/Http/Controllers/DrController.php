<?php

namespace App\Http\Controllers;

use App\Models\Dr;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class DrController extends Controller
{

    public function index()
    {
        $data = [
            'title' => 'افزودن اطلاعات دامپزشک',
            'dr' => Dr::all(),
        ];

        return view('dashboard.drs', $data);
    }

    public function add_dr(){
        $data = [
            'title' => 'افزودن دامپزشک'
        ];

        return view('dashboard.add-dr', $data);
    }

    public function create(Dr $dr, Request $request)
    {

        $check = $request->validate([
            'name' => 'required|unique:drs,name',
            'phone' => 'required|numeric|unique:drs,phone'
        ],[
            '*.required' => 'این مقدار را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید.',
            'phone.unique' => 'این شماره قبلا ثبت شده است.',
            'name.unique' => 'این نام قبلا ثبت شده است.',
        ]);
        try {
            Dr::create($check);
            toastr()->success('دامپزشک باموفقیت افزوده شد.');
            return redirect()->route('add-dr');
        }catch (\Exception $e){
            toastr()->error($e);
            return  redirect()->route('add-dr');
        }
    }

    public function edit(Dr $dr)
    {
        $data = [
            'title' => 'ویرایش اطلاعات دامپزشک',
            'dr' => Dr::find($dr),
        ];

        return view('dashboard.edit-dr', $data);
    }


    public function update(Request $request, Dr $dr)
    {
        $check = $request->validate([
            'name' => ['required', Rule::unique('drs', 'name')->ignore($dr)],
            'phone' => ['required', 'numeric', Rule::unique('drs', 'phone')->ignore($dr)],
        ],[
            '*.required' => 'این مقدار را وارد کنید.',
            '*.numeric' => 'فقط عدد وارد کنید.',
            'phone.unique' => 'این شماره قبلا ثبت شده است.',
            'name.unique' => 'این نام قبلا ثبت شده است.',
        ]);
        try {
            $dr->update($check);
            toastr()->success('دامپزشک باموفقیت ویرایش شد.');
            return redirect()->route('drs');
        }catch (\Exception $e){
            toastr()->error($e);
            return  redirect()->route('drs');
        }
    }

    public function destroy(Dr $dr)
    {
        try {
            $dr->delete();
            toastr()->success('دامپزشک باموفقیت حذف شد.');
            return redirect()->route('drs');
        }catch (\Exception $e){
            toastr()->error($e);
            return  redirect()->route('drs');
        }
    }
}
