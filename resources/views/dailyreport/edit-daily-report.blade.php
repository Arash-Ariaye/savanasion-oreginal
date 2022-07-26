@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/css/date-pick/persian-datepicker.min.css") }}">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4>ویرایش گزارش روزانه</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت گزارش</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">ویرایش گزارش روزانه</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ویرایش گزارش روزانه</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('update-daily-report', $report->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            @foreach($errors as $error)
                                @error($error)<span class="text-danger"> {{ $message }}</span> @enderror
                            @endforeach
                        @endif
                        <div class="row col-lg-12 justify-content-lg-between">
                            <div class="col-md-4 p-2">
                                <label class=" col-form-label">تاریخ گزارش:</label>
                                <div class="input-group col-lg-8">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    </div>
                                    <input name="tarikh" value="{{$report->tarikh}}"
                                           class=" form-control"
                                           style="text-align: left; direction: ltr;">
                                </div>
                                @error('tarikh_start') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="col-lg-6 col-form-label">دوره مرغدار:</label>
                                <select name="breeder" style="text-align: left; direction: ltr;"
                                        class="form-control col-lg-8">
                                    @if(old('breeder'))
                                        <option
                                            value="{{old('breeder') ?? $report->breeder}}">{{old('breeder') ?? $report->breeder}}</option>
                                    @endif
                                        <option
                                            value="{{$report->breeder}}">{{ $report->breeder}}</option>

                                    @foreach($breeder as $item)
                                        <option
                                            value="{{$item->breeder}}">{{$item->breeder}}</option>
                                    @endforeach
                                </select>
                                @error('breeder') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{--                        سالن 1--}}
                        <div class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 1</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s1') ?? $report->t_talafat_s1}}"
                                                       name="t_talafat_s1">
                                                @error('t_talafat_s1') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s1') ?? $report->v_talafat_s1}}"
                                                       name="v_talafat_s1">
                                                @error('v_talafat_s1') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s1') ?? $report->dan_masrafi_s1}}"
                                                       name="dan_masrafi_s1">
                                                @error('dan_masrafi_s1') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s1" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s1') ?? $report->dan_cat_s1}}">{{old('dan_cat_s1') ?? $report->dan_cat_s1}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s1') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s1') ?? $report->ave_vazn_s1}}"
                                                       name="ave_vazn_s1">
                                                @error('ave_vazn_s1') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s1') ?? $report->app_nori_s1}}"
                                                       name="app_nori_s1">
                                                @error('app_nori_s1')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        سالن 2--}}
                        <div hidden id="2" class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 2</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s2') ?? $report->t_talafat_s2}}"
                                                       name="t_talafat_s2">
                                                @error('t_talafat_s2') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s2') ?? $report->v_talafat_s2}}"
                                                       name="v_talafat_s2">
                                                @error('v_talafat_s2') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s2') ?? $report->dan_masrafi_s2}}"
                                                       name="dan_masrafi_s2">
                                                @error('dan_masrafi_s2') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s2" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s2') ?? $report->dan_cat_s2}}">{{old('dan_cat_s2') ?? $report->dan_cat_s2}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s2') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s2') ?? $report->ave_vazn_s2}}"
                                                       name="ave_vazn_s2">
                                                @error('ave_vazn_s2') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s2') ?? $report->app_nori_s2}}"
                                                       name="app_nori_s2">
                                                @error('app_nori_s2')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        سالن 3--}}
                        <div hidden id="3" class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 3</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s3') ?? $report->t_talafat_s3}}"
                                                       name="t_talafat_s3">
                                                @error('t_talafat_s3') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s3') ?? $report->v_talafat_s3}}"
                                                       name="v_talafat_s3">
                                                @error('v_talafat_s3') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s3') ?? $report->dan_masrafi_s3}}"
                                                       name="dan_masrafi_s3">
                                                @error('dan_masrafi_s3') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s3" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s3') ?? $report->dan_cat_s3}}">{{old('dan_cat_s3') ?? $report->dan_cat_s3}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s3') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s3') ?? $report->ave_vazn_s3}}"
                                                       name="ave_vazn_s3">
                                                @error('ave_vazn_s3') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s3') ?? $report->app_nori_s3}}"
                                                       name="app_nori_s3">
                                                @error('app_nori_s3')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        سالن 4--}}
                        <div hidden id="4" class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 4</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s4') ?? $report->t_talafat_s4}}"
                                                       name="t_talafat_s4">
                                                @error('t_talafat_s4') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s4') ?? $report->v_talafat_s4}}"
                                                       name="v_talafat_s4">
                                                @error('v_talafat_s4') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s4') ?? $report->dan_masrafi_s4}}"
                                                       name="dan_masrafi_s4">
                                                @error('dan_masrafi_s4') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s4" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s4') ?? $report->dan_cat_s4}}">{{old('dan_cat_s4') ?? $report->dan_cat_s4}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s4') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s4') ?? $report->ave_vazn_s4}}"
                                                       name="ave_vazn_s4">
                                                @error('ave_vazn_s4') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s4') ?? $report->app_nori_s4}}"
                                                       name="app_nori_s4">
                                                @error('app_nori_s4')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        سالن 5--}}
                        <div hidden id="5" class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 5</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s5') ?? $report->t_talafat_s5}}"
                                                       name="t_talafat_s5">
                                                @error('t_talafat_s5') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s5') ?? $report->v_talafat_s5}}"
                                                       name="v_talafat_s5">
                                                @error('v_talafat_s5') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s5') ?? $report->dan_masrafi_s5}}"
                                                       name="dan_masrafi_s5">
                                                @error('dan_masrafi_s5') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s5" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s5') ?? $report->dan_cat_s5}}">{{old('dan_cat_s5') ?? $report->dan_cat_s5}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s5') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s5') ?? $report->ave_vazn_s5}}"
                                                       name="ave_vazn_s5">
                                                @error('ave_vazn_s5') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s5') ?? $report->app_nori_s5}}"
                                                       name="app_nori_s5">
                                                @error('app_nori_s5')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        سالن 6--}}
                        <div hidden id="6" class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">سالن شماره 6</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                تعداد تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_talafat_s6') ?? $report->t_talafat_s6}}"
                                                       name="t_talafat_s6">
                                                @error('t_talafat_s6') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                وزن تلفات:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('v_talafat_s6') ?? $report->v_talafat_s6}}"
                                                       name="v_talafat_s6">
                                                @error('v_talafat_s6') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دان مصرفی(کیلوگرم):
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('dan_masrafi_s6') ?? $report->dan_masrafi_s6}}"
                                                       name="dan_masrafi_s6">
                                                @error('dan_masrafi_s6') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">نوع دان مصرفی:</label>
                                            <select name="dan_cat_s6" style="text-align: left; direction: ltr;"
                                                    class="form-control col-lg-12">
                                                <option value="{{old('dan_cat_s6') ?? $report->dan_cat_s6}}">{{old('dan_cat_s6') ?? $report->dan_cat_s6}}</option>
                                                <option value="سوپر استارتر">سوپر استارتر</option>
                                                <option value="پیش دان">پیش دان</option>
                                                <option value="میان دان">میان دان</option>
                                                <option value="پس دان">پس دان</option>
                                            </select>
                                            @error('dan_cat_s6') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                میانگین وزن:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('ave_vazn_s6') ?? $report->ave_vazn_s6}}"
                                                       name="ave_vazn_s6">
                                                @error('ave_vazn_s6') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                برنامه خاموشی:
                                            </label>
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control"
                                                       value="{{ old('app_nori_s6') ?? $report->app_nori_s6}}"
                                                       name="app_nori_s6">
                                                @error('app_nori_s6')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="add" type="button" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                    <path
                                        d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            نمایش سالن دیگر
                        </button>

                        {{--                        دارو ها و واکسن های استفاده شده--}}

                        <div class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">دارو ها و واکسن های استفاده شده</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-md-3">
                                            <label class="col-lg-9 col-form-label">
                                                نوع بیماری مشاهده شده:
                                            </label>
                                            <div class="col-lg-8">
                                                <textarea type="text" class="form-control" rows="2"
                                                          name="type_Sickness">{{ old('type_Sickness') ?? $report->type_Sickness}}</textarea>
                                                @error('type_Sickness') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                دارو تجویز شده:
                                            </label>
                                            <div class="col-lg-8">
                                                <textarea type="text" class="form-control" rows="3"
                                                          name="medicines">{{ old('medicines') ?? $report->medicines}}</textarea>
                                                @error('medicines') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                واکسن:
                                            </label>
                                            <div class="col-lg-8">
                                                <textarea type="text" class="form-control" name="vaksan">{{ old('vaksan') ?? $report->vaksan}}</textarea>
                                                @error('vaksan')
                                                <span class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class=" col-form-label">
                                                افزودنی ها:
                                            </label>
                                            <div class="col-lg-8">
                                                <textarea type="text" class="form-control" rows="4"
                                                          name="vitamin">{{ old('vitamin') ?? $report->vitamin}}</textarea>
                                                @error('vitamin') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{--                        ارسالی کشتارگاه--}}

                        <div class="card mt-5 shadow shadow-sm">
                            <div class="card-header">
                                <h4 class="card-title">ارسالی به کشتارگاه</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <div class="row col-lg-12 mt-5">
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">
                                                تعداد مرغ ارسالی به کشتارگاه:
                                            </label>
                                            <div class="col-lg-6 col-md-12">
                                                <input type="text" class="form-control"
                                                       value="{{ old('t_send_koshtargah') ?? $report->t_send_koshtargah}}"
                                                       name="t_send_koshtargah">
                                                @error('t_send_koshtargah') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3 ">
                                            <label class="col-lg-12 col-form-label">
                                                وزن ارسالی به کشتارگاه:
                                            </label>
                                            <div class="col-lg-6 col-md-12">
                                                <input type="text" class="form-control"
                                                       name="bw" value="{{ old('bw') ?? $report->bw}}">
                                                @error('bw') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">
                                                میانگین وزن ارسالی به کشتارگاه:
                                            </label>
                                            <div class="col-lg-6 col-md-12">
                                                <input type="text" class="form-control"
                                                       name="avr_v_koshtar" value="{{ old('avr_v_koshtar') ?? $report->avr_v_koshtar}}">
                                                @error('avr_v_koshtar') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label class="col-lg-12 col-form-label">
                                                ساعت قطع دان:
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="time" class="form-control"
                                                       value="{{ old('dan_stop_time') ?? $report->dan_stop_time}}"
                                                       name="dan_stop_time">
                                                @error('dan_stop_time') <span
                                                    class="text-danger"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label class="col-lg-12 col-form-label">
                                            توضیحات:
                                        </label>
                                        <div class="col-lg-12">
                                                <textarea type="text" class="form-control" rows="6"
                                                          name="description">{{ old('description') ?? $report->description}}</textarea>
                                            @error('description') <span
                                                class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-5">
                            <button type="submit" class="btn btn-primary">بروزرسانی گزارش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <script type="text/javascript">
        var id = 2;
        var breeder = {{ \Illuminate\Support\Facades\DB::table('periods')->where('breeder', $report->breeder)->where('status', 1)->value('sln') }} ;
        $("#add").click(function () {
            if (id <= breeder) {
                document.getElementById(id).hidden = false;
                id++;
                if(id >= breeder){
                    document.getElementById('add').hidden = true;
                }
            }
        });
    </script>
    <script src="{{ asset("assets/js/date-pick/persian-date.min.js") }}"></script>
    <script src="{{ asset("assets/js/date-pick/persian-datepicker.min.js") }}"></script>
@endsection
