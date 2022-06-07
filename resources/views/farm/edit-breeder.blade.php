@extends('layouts.app')

{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>ویرایش اطلاعات مرغدار</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">فارم گوشتی</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">ویرایش مرغدار</a></li>
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

                        <form method="post" action="{{ route('update-breeder', $edit[0]->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" value="{{ $edit[0]->name }}"
                                           placeholder="نام و نام خانوادگی مرغدار">
                                    @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                                <div class="col-sm-6 mt-2 mt-sm-0">
                                    <input type="text" name="capacity" class="form-control"
                                           value="{{ $edit[0]->capacity }}"
                                           placeholder="ظرفیت پروانه">
                                    @error('capacity') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <input type="text" name="phone" class="form-control" value="{{ $edit[0]->phone }}"
                                           placeholder="تلفن تماس">
                                    @error('phone') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="address" class="form-control" value="{{ $edit[0]->address }}"
                                           placeholder="آدرس">
                                    @error('address') <span class="text-danger"> {{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm mt-5">بروزرسانی</button>
                                <button class="btn btn-sm mt-5 mr-3 warning"><a href="{{ route('breeders') }}"> لغو </a>
                                </button>

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

@endsection
