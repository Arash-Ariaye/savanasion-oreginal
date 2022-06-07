@extends('layouts.app')

@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>مدیریت دسته بندی</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="javascript:void(0)">داشبرد</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> دسته بندی</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">افزودن دسته</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('add-category') }}" method="post">
                            @csrf
                            <div class="row">
                                @foreach ($errors->all() as $error)
                                    <span class="text-danger"> {{ $error }}</span> <br>
                                @endforeach
                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام دسته
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" value="{{ $category }}" name="category">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            ماه
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" required class="form-control" name="mah" value="{{ $mah }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            سال
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" required class="form-control" value="{{ $sal }}" name="sal">
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
                    <h4 class="card-title">مدیریت دسته بندی ها</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4">
                            <thead>
                            <tr>
                                <th></th>
                                <th>عنوان دسته</th>
                                <th>ماه</th>
                                <th>سال</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $item)
                                <tr>
                                    <th></th>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->mah }}</td>
                                    <td>{{ $item->sal }}</td>
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
                                                   href="{{ route('edit-category', $item->id ) }}">ویرایش</a>
                                                <form action="{{ route('destroy-category', $item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit" onclick="alert('حذف شود ؟')">حذف</button>
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
