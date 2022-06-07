@extends('layouts.app')

{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')

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
                        <form class="col-md-12" method="post" action="{{ route('update-farm', $farm[0]->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-row mb-2">
                                <div class="form-group col-md-4">
                                    <label>مرغدار</label>
                                    <select name="breeder" class="form-control default-select form-control-lg">
                                        @if(old('breeder') or $farm[0]->breeder)
                                            <option value="{{old('breeder') ?? $farm[0]->breeder}}">{{old('breeder') ?? $farm[0]->breeder}}</option>
                                        @endif
                                        @foreach($breeders as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> نوع سوخت</label>
                                    <select multiple name="gas[]" class="form-control default-select form-control-lg">
                                        @if(old('gas') or $farm[0]->gas)
                                            <option selected value="{{old('gas') ?? $farm[0]->gas}}">{{old('gas') ?? $farm[0]->gas}}</option>
                                        @endif
                                        <option value="گاز">گاز</option>
                                        <option value="کازوئیل">گازوئیل</option>
                                    </select>
                                    @error('gas') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> حصار مرغداری</label>
                                    <select multiple name="fences[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('fences') or $farm[0]->fences)
                                            <option selected
                                                value="{{old('fences') ?? $farm[0]->fences}}">{{old('fences') ?? $farm[0]->fences}}</option>
                                        @endif
                                        <option value="بلوک، آجر">بلوک، آجر</option>
                                        <option value="توری، فنس"> توری، فنس</option>
                                    </select>
                                    @error('fences') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> سیستم روشنایی</label>
                                    <select multiple name="light_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('light_sys') or $farm[0]->light_sys)
                                            <option selected
                                                value="{{old('light_sys') ?? $farm[0]->light_sys}}">{{old('light_sys') ?? $farm[0]->light_sys}}</option>
                                        @endif
                                        <option value="تایمردار">تایمردار</option>
                                        <option value="دستی">دستی</option>

                                    </select>
                                    @error('light_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> سیستم آبخوری</label>
                                    <select multiple name="drink_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('drink_sys') or $farm[0]->drink_sys)
                                            <option selected
                                                value="{{old('drink_sys') ?? $farm[0]->drink_sys}}">{{old('drink_sys') ?? $farm[0]->drink_sys}}</option>
                                        @endif
                                        <option value="نیپل">نیپل</option>
                                        <option value="آویز">آویز</option>
                                    </select>
                                    @error('drink_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> چاه سپتیک </label>
                                    <select name="septic_tank" class="form-control default-select form-control-lg">
                                        @if(old('septic_tank') or $farm[0]->septic_tank)
                                            <option
                                                value="{{old('septic_tank') ?? $farm[0]->septic_tank}}">{{old('septic_tank') ?? $farm[0]->septic_tank == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('septic_tank') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>


                                <div class="form-group col-md-4">
                                    <label>مخزن آب</label>
                                    <select multiple name="water_tank[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('water_tank') or $farm[0]->water_tank)
                                            <option selected
                                                value="{{old('water_tank') ?? $farm[0]->water_tank}}">{{old('water_tank') ?? $farm[0]->water_tank}}</option>
                                        @endif
                                        <option value="آهنی">آهنی</option>
                                        <option value="pvc">pvc</option>
                                        <option value="بتونی">بتونی</option>
                                    </select>
                                    @error('water_tank') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> سیستم تصفیه </label>
                                    <select multiple name="filtration[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('filtration') or $farm[0]->filtration)
                                            <option selected
                                                value="{{old('filtration') ?? $farm[0]->filtration}}">{{old('filtration') ?? $farm[0]->filtration == 0 ? 'ندارد': $farm[0]->filtration}}</option>
                                        @endif
                                        <option value="ازن">ازن</option>
                                        <option value="uv">uv</option>
                                        <option value="ro">ro</option>
                                        <option value="0">ندارد</option>
                                    </select>
                                    @error('filtration') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label>لاشه سوز </label>
                                    <select name="carcass" class="form-control default-select form-control-lg">
                                        @if(old('carcass') or $farm[0]->carcass)
                                            <option
                                                value="{{old('carcass') ?? $farm[0]->carcass}}">{{old('carcass') ?? $farm[0]->carcass == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0">ندارد</option>
                                    </select>
                                    @error('carcass') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                                <div class="form-group col-md-4">
                                    <label>آب مصرفی</label>
                                    <select multiple name="water[]" class="form-control default-select form-control-lg">
                                        @if(old('water') or $farm[0]->water)
                                            <option selected value="{{old('water') ?? $farm[0]->water}}">{{old('water') ?? $farm[0]->water}}</option>
                                        @endif
                                        <option value="شهری/روستایی">شهری/روستایی</option>
                                        <option value="چاه">چاه</option>
                                        <option value="چشمه">چشمه</option>
                                    </select>
                                    @error('water') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> سیستم دانخوری </label>
                                    <select multiple name="seeds[]" class="form-control default-select form-control-lg">
                                        @if(old('seeds') or $farm[0]->seeds)
                                            <option selected value="{{old('seeds') ?? $farm[0]->seeds}}">{{old('seeds') ?? $farm[0]->seeds}}</option>
                                        @endif
                                        <option value=" بشقابی"> بشقابی</option>
                                        <option value=" زنجیری"> زنجیری</option>
                                        <option value=" دستی"> دستی</option>
                                    </select>
                                    @error('seeds') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> انتقال دان </label>
                                    <select name="seeds_transfer" class="form-control default-select form-control-lg">
                                        @if(old('seeds_transfer') or $farm[0]->seeds_transfer)
                                            <option value="{{old('seeds_transfer') ?? $farm[0]->seeds_transfer}}">{{old('seeds_transfer') ?? $farm[0]->seeds_transfer == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('seeds_transfer') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> سیستم تهویه</label>
                                    <select multiple name="air_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('air_sys') or $farm[0]->air_sys)
                                            <option selected
                                                value="{{old('air_sys') ?? $farm[0]->air_sys}}">{{old('air_sys') ?? $farm[0]->air_sys}}</option>
                                        @endif
                                        <option value="اینورتر">اینورتر</option>
                                        <option value="تایمر">تایمر</option>
                                        <option value="ترموستات">ترموستات</option>
                                        <option value="اتوماسیون">اتوماسیون</option>
                                        <option value="دستی">دستی</option>
                                    </select>
                                    @error('air_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> محوطه مرغداری</label>
                                    <select multiple name="form_area[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('form_area') or $farm[0]->form_area)
                                            <option selected
                                                value="{{old('form_area') ?? $farm[0]->form_area}}">{{old('form_area') ?? $farm[0]->form_area }}</option>
                                        @endif
                                        <option value=" بتون ">بتون</option>
                                        <option value=" شن ریزی "> شن ریزی</option>
                                    </select>
                                    @error('form_area') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label>مولد برق</label>
                                    <select name="generator" class="form-control default-select form-control-lg">
                                        @if(old('generator') or $farm[0]->generator)
                                            <option
                                                value="{{old('generator') ?? $farm[0]->generator}}">{{old('generator') ?? $farm[0]->generator == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('generator') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label>سیستم خنک کننده</label>
                                    <select multiple name="cooling_sys[]"
                                            class="form-control default-select form-control-lg">
                                        @if(old('cooling_sys') or $farm[0]->cooling_sys)
                                            <option selected
                                                value="{{old('cooling_sys') ?? $farm[0]->cooling_sys}}">{{old('cooling_sys') ?? $farm[0]->cooling_sys == 0 ? 'ندارد' : $farm[0]->cooling_sys}}</option>
                                        @endif
                                        <option value="پدکولینگ "> پدکولینگ</option>
                                        <option value=" دستی"> دستی</option>
                                        <option value=" مه پاش"> مه پاش</option>
                                        <option value="ندارد "> ندارد</option>
                                    </select>
                                    @error('cooling_sys') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> آلارم قطع برق</label>
                                    <select name="power_alert" class="form-control default-select form-control-lg">
                                        @if(old('power_alert') or $farm[0]->power_alert)
                                            <option
                                                value="{{old('power_alert') ?? $farm[0]->power_alert}}">{{old('power_alert') ?? $farm[0]->power_alert == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('power_alert') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> آلارم دما</label>
                                    <select name="air_alert" class="form-control default-select form-control-lg">
                                        @if(old('air_alert') or $farm[0]->air_alert)
                                            <option
                                                value="{{old('air_alertair_alert') or $farm[0]->air_alert}}">{{old('air_alert') ?? $farm[0]->air_alert == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('air_alert') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label>دوربین مدار بسته </label>
                                    <select name="cctv" class="form-control default-select form-control-lg">
                                        @if(old('cctv') or $farm[0]->cctv)
                                            <option
                                                value="{{old('cctv') ?? $farm[0]->cctv}}">{{old('cctv') ?? $farm[0]->cctv == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('cctv') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label> باسکول </label>
                                    <select name="weighbridge" class="form-control default-select form-control-lg">
                                        @if(old('weighbridge') or $farm[0]->weighbridge)
                                            <option
                                                value="{{old('weighbridge') ?? $farm[0]->weighbridge}}">{{old('weighbridge') ?? $farm[0]->weighbridge == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('weighbridge') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> قرنطینه ورودی </label>
                                    <select name="input_quarantine" class="form-control default-select form-control-lg">
                                        @if(old('input_quarantine') or $farm[0]->input_quarantine)
                                            <option
                                                value="{{old('input_quarantine') ?? $farm[0]->input_quarantine}}">{{old('input_quarantine') ?? $farm[0]->input_quarantine == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('input_quarantine') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="form-group col-md-4">
                                    <label> چاه تلفات</label>
                                    <select name="losses_pit" class="form-control default-select form-control-lg">
                                        @if(old('losses_pit') or $farm[0]->losses_pit)
                                            <option
                                                value="{{old('losses_pit') ?? $farm[0]->losses_pit}}">{{old('losses_pit') ?? $farm[0]->losses_pit == 1 ? 'دارد' : 'ندارد'}}</option>
                                        @endif
                                        <option value="1">دارد</option>
                                        <option value="0"> ندارد</option>
                                    </select>
                                    @error('losses_pit') <span class="text-danger">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-primary">بروزرسانی اطلاعات</button>
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
