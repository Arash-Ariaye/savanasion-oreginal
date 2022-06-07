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
            <li class="breadcrumb-item "><a href="javascript:void(0)">دسته بندی</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> ویرایش </a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات شما</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route("update-category") }}" method="post">
                            @csrf
                            @method('PUT')
                            <input name="id" type="hidden" value="{{ $categories[0]->id }}">
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
                                            <input type="text" class="form-control" value="{{ $categories[0]->category }}" name="category">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            ماه
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" required class="form-control" name="mah" value="{{ $categories[0]->mah }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            سال
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" required class="form-control" value="{{ $categories[0]->sal }}" name="sal">
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
