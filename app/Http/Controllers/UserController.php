<?php

namespace App\Http\Controllers;

use App\Http\Help;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function users()
    {
        $data = [
            'title' => 'مدیریت کاربران',
            'users' => User::all(),
        ];
        return view('user.users', $data);
    }

    public function create(Request $request)
    {
        $check = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'group' => ['required'],
            'avatar' => '',
        ]);

        try {
            User::create([
                'name' => $request['name'],
                'user' => $request['user'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['group'],
                'group' => Help::group($request['group']),
                'avatar' => Help::UpImage($request['avatar'], $request['user'])
            ]);
            toastr()->success('کاربر با موفقیت اضافه شد :)');
            return redirect()->route('users');
        } catch (\Exception $e) {
            toastr()->error('مشکلی در اضافه کردن کاربر پیش آمد :(');
            return redirect()->back();
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            toastr()->success('کاربر مورد نظر حذف گردید.');
            return redirect()->route('users');
        } catch (\Exception $e) {
            toastr()->error('نشد کاربر حذف کنیم :(');
            return redirect()->back();
        }

    }

//
    public function edit(Request $request)
    {
        $data = [
            'title' => 'ویرایش کاربر',
            'user' => User::find($request['user'])
        ];
        return view('user.edit-user', $data);
    }

//
    public function update(User $user, Request $request)
    {
        $check = $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'user' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => ['nullable', 'string', 'min:4'],
            'role' => ['nullable'],
            'group' => ['nullable']
        ], [
            '*.required' => 'این فیلد را پر کنید.',
            '*.string' => 'مقدار حروف وارد کنید.',
            '*.min' => 'بیشتر از 4 کاراکتر وارد کنید',
        ]);
        try {
            if (!empty($check['password']) or !is_null($check['password'])) {
                $user->update([
                    'name' => $check['name'],
                    'user' => $check['user'],
                    'email' => $check['email'],
                    'password' => Hash::make($check['password']),
                    'role' => $check['group'],
                    'group' => Help::group($check['group']),
                ]);
            }else{
                $user->update([
                    'name' => $check['name'],
                    'user' => $check['user'],
                    'email' => $check['email'],
                    'role' => $check['group'],
                    'group' => Help::group($check['group']),
                ]);
            }
            toastr()->success('کاربر با موفقیت ویرایش شد :)', $check['name']);
            return redirect()->route('users');
        } catch (\Exception $e) {
            toastr()->error('مشکلی در ویرایش کردن کاربر پیش آمد :(');
            return redirect()->back();
        }
    }
}
