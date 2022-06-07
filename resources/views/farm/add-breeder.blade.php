@extends('layouts.app')

{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')
@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>افزودن مرغدار</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">فارم گوشتی</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">افزودن اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">افزودن مرغدار</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">مشخصات مرغدار</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">

                        <form method="post" action="{{ route('insert-breeder') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                           placeholder="نام و نام خانوادگی مرغدار">
                                    @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" name="capacity" class="form-control"
                                           value="{{ old('capacity') }}"
                                           placeholder="ظرفیت پروانه">
                                    @error('capacity') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                                           placeholder="تلفن تماس">
                                    @error('phone') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                           placeholder="آدرس">
                                    @error('address') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm mt-5">افزودن</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')

@endsection
