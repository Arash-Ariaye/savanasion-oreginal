@extends('layouts.app')

@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>مدیریت کاربران</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="javascript:void(0)">داشبرد</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> مدیریت و افزودن کاربر</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">افزودن کاربر</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('update-user', $user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="row">

                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ old('name') ?? $user->name}}">
                                            @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام کاربری
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="user" class="form-control"
                                                   value="{{ old('user') ?? $user->user}}">
                                            @error('user') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            ایمیل
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="email" class="form-control"
                                                   value="{{ old('email') ?? $user->email}}">
                                            @error('email') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            رمز عبور
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="password" class="form-control"
                                                   value="{{ old('password') }}">
                                            @error('password') <span
                                                class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            گروه
                                        </label>
                                        <div class="col-lg-8">
                                            <select name="group" class="form-control">
                                                <option value="{{ $user->role }}"> {{ $user->group }}</option>
                                                <option value="3"> کارشناس</option>
                                                <option value="2"> دکتر</option>
                                                <option value="1"> ادمین</option>
                                                <option value="4"> رئیس</option>
                                            </select>
                                            @error('group') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">بروزرسانی</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
@endsection
