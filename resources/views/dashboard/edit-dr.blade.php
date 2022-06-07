@extends('layouts.app')

@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4> ویرایش داپزشک </h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">ویرایش اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> دامپزشک</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ویرایش اطلاعات دامپزشک</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{ route('update-dr', $dr[0]->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            نام و نام خانوادگی
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" value="{{ old('name') ?? $dr[0]->name }}"
                                                   name="name">
                                            @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label">
                                            شماره تماس
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" required class="form-control" value="{{ old('phone') ?? $dr[0]->phone}}"
                                                   name="phone">
                                            @error('phone') <span class="text-danger"> {{ $message }}</span> @enderror
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
