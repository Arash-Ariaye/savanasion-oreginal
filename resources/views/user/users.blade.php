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
                        <form class="form-valide" action="{{ route('add-user') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ old('name') }}">
                                            @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام کاربری
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="user" class="form-control"
                                                   value="{{ old('user') }}">
                                            @error('user') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            ایمیل
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" name="email" class="form-control"
                                                   value="{{ old('email') }}">
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
                                                <option value="3"> کارشناس</option>
                                                <option value="2"> دکتر</option>
                                                <option value="1"> ادمین</option>
                                                <option value="4"> رئیس</option>
                                            </select>
                                            @error('group') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label">کاور عکس: </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">اپلود</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="avatar" class="custom-file-input">
                                                <label class="custom-file-label selected"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary">افزودن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">مدیریت کاربران</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>نام کاربری</th>
                                <th>گروه</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->user }}</td>
                                    <td>{{ $item->group }}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-right">
                                            <div class="btn-link" data-toggle="dropdown">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                     version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                        </circle>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                   href="{{ route('edit-user', $item->id ) }}">ویرایش</a>
                                                <form action="{{ route('destroy-user', $item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit"
                                                            onclick="alert('حذف شود ؟')">حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
