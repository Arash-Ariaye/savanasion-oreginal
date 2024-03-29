@extends('layouts.app')

{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>فارم</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">فارم گوشتی</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">افزودن اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">افزودن فارم</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات شناسنامه را وارد کنید</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form class="col-md-12" method="post" action="{{ route('insert-farm') }}">
                            @csrf


                            <div class="form-row mb-2">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">مرغدار</label>
                                    <select name="breeder" class="form-control default-select form-control-lg">
                                        @if(old('breeder'))
                                            <option value="{{old('breeder')}}">{{old('breeder')}}</option>
                                        @endif
                                        @foreach($breeders as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">

                                    <label class="col-lg-4 col-form-label mt-2">
                                        نام
                                    </label>
                                    <div class="form-control-lg col-lg-8">
                                        <input type="text" name="name" class="form-control"
                                               value="{{ old('name') }}">
                                        @error('name') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> نوع سوخت</label>
                                    <select multiple name="gas[]" class="form-control default-select form-control-lg">
                                        @if(old('gas'))
                                            @foreach(old('gas') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="گاز">گاز</option>
                                            <option value="کازوئیل">گازوئیل</option>
                                        @endif
                                    </select>
                                    @error('gas') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> حصار مرغداری</label>
                                    <select multiple name="fences[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('fences'))
                                            @foreach(old('fences') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="بلوک، آجر">بلوک، آجر</option>
                                            <option value="توری، فنس"> توری، فنس</option>

                                        @endif

                                    </select>
                                    @error('fences') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> سیستم روشنایی</label>
                                    <select multiple name="light_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('light_sys'))
                                            @foreach(old('light_sys') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="تایمردار">تایمردار</option>
                                            <option value="دستی">دستی</option>
                                        @endif

                                    </select>
                                    @error('light_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> سیستم آبخوری</label>
                                    <select multiple name="drink_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('drink_sys'))
                                            @foreach(old('drink_sys') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="نیپل">نیپل</option>
                                            <option value="آویز">آویز</option>
                                        @endif
                                    </select>
                                    @error('drink_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> چاه سپتیک </label>
                                    <select name="septic_tank" class="form-control default-select form-control-lg">
                                        @if(old('septic_tank'))
                                            <option value="{{old('septic_tank')}}">{{old('septic_tank')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('septic_tank') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">مخزن آب</label>
                                    <select multiple name="water_tank[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('water_tank'))
                                            @foreach(old('water_tank') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="آهنی">آهنی</option>
                                            <option value="pvc">pvc</option>
                                            <option value="بتونی">بتونی</option>
                                        @endif

                                    </select>
                                    @error('water_tank') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> سیستم تصفیه </label>
                                    <select multiple name="filtration[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('filtration'))
                                            @foreach(old('filtration') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="ازن">ازن</option>
                                            <option value="uv">uv</option>
                                            <option value="ro">ro</option>
                                            <option value="0">ندارد</option>
                                        @endif
                                    </select>
                                    @error('filtration') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">لاشه سوز </label>
                                    <select name="carcass" class="form-control default-select form-control-lg">
                                        @if(old('carcass'))
                                            <option value="{{old('carcass')}}">{{old('carcass')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0">ندارد</option>
                                    </select>
                                    @error('carcass') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">آب مصرفی</label>
                                    <select multiple name="water[]" class="form-control default-select form-control-lg">
                                        @if(old('water'))
                                            @foreach(old('water') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="شهری/روستایی">شهری/روستایی</option>
                                            <option value="چاه">چاه</option>
                                            <option value="چشمه">چشمه</option>
                                        @endif
                                    </select>
                                    @error('water') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> سیستم دانخوری </label>
                                    <select multiple name="seeds[]" class="form-control default-select form-control-lg">
                                        @if(old('seeds'))
                                            @foreach(old('seeds') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value=" بشقابی"> بشقابی</option>
                                            <option value=" زنجیری"> زنجیری</option>
                                            <option value=" دستی"> دستی</option>
                                        @endif
                                    </select>
                                    @error('seeds') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> انتقال دان </label>
                                    <select name="seeds_transfer" class="form-control default-select form-control-lg">
                                        @if(old('seeds_transfer'))
                                            <option value="{{old('seeds_transfer')}}">{{old('seeds_transfer')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('seeds_transfer') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> سیستم تهویه</label>
                                    <select multiple name="air_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('air_sys'))
                                            @foreach(old('air_sys') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="اینورتر">اینورتر</option>
                                            <option value="تایمر">تایمر</option>
                                            <option value="ترموستات">ترموستات</option>
                                            <option value="اتوماسیون">اتوماسیون</option>
                                            <option value="دستی">دستی</option>
                                        @endif
                                    </select>
                                    @error('air_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> محوطه مرغداری</label>
                                    <select multiple name="form_area[]"
                                            class="form-control default-select form-control-lg">
                                        <option value=" بتون ">بتون</option>
                                        <option value=" شن ریزی "> شن ریزی</option>
                                    </select>
                                    @error('form_area') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">مولد برق</label>
                                    <select name="generator" class="form-control default-select form-control-lg">
                                        @if(old('generator'))
                                            <option value="{{old('generator')}}">{{old('generator')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('generator') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">سیستم خنک کننده</label>
                                    <select multiple name="cooling_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('cooling_sys'))
                                            @foreach(old('cooling_sys') as $item)
                                                <option selected value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        @else
                                            <option value="پدکولینگ "> پدکولینگ</option>
                                            <option value=" دستی"> دستی</option>
                                            <option value=" مه پاش"> مه پاش</option>
                                            <option value="ندارد "> ندارد</option>
                                        @endif
                                    </select>
                                    @error('cooling_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> آلارم قطع برق</label>
                                    <select name="power_alert" class="form-control default-select form-control-lg">
                                        @if(old('power_alert'))
                                            <option value="{{old('power_alert')}}">{{old('power_alert')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('power_alert') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> آلارم دما</label>
                                    <select name="air_alert" class="form-control default-select form-control-lg">
                                        @if(old('air_alert'))
                                            <option value="{{old('air_alertair_alert')}}">{{old('air_alert')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('air_alert') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2">دوربین مدار بسته </label>
                                    <select name="cctv" class="form-control default-select form-control-lg">
                                        @if(old('cctv'))
                                            <option value="{{old('cctv')}}">{{old('cctv')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('cctv') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> باسکول </label>
                                    <select name="weighbridge" class="form-control default-select form-control-lg">
                                        @if(old('weighbridge'))
                                            <option value="{{old('weighbridge')}}">{{old('weighbridge')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('weighbridge') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> قرنطینه ورودی </label>
                                    <select name="input_quarantine" class="form-control default-select form-control-lg">
                                        @if(old('input_quarantine'))
                                            <option
                                                value="{{old('input_quarantine')}}">{{old('input_quarantine')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('input_quarantine') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-lg-4 col-form-label mt-2"> چاه تلفات</label>
                                    <select name="losses_pit" class="form-control default-select form-control-lg">
                                        @if(old('losses_pit'))
                                            <option value="{{old('losses_pit')}}">{{old('losses_pit')}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('losses_pit') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-primary">ثبت اطلاعات</button>
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
