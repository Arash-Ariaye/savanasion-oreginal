@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/css/date-pick/persian-datepicker.min.css") }}">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4>ویرایش گزارش جوجه ریزی</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت گزارش</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> جوجه ریزی</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ویرایش گزارش جوجه ریزی</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('update-start-period', $period[0]->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            @foreach($errors as $error)
                                @error($error)<span class="text-danger"> {{ $message }}</span> @enderror
                            @endforeach
                        @endif
                        <div class="row col-lg-6 justify-content-lg-between">
                            <div class="col-md-6 p-2">
                                <label class="control-label">تاریخ تولید</label>
                                <div class="input-group col-sm-10">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    </div>
                                    <input name="tarikh_start" value="{{ $period[0]->tarikh_start }}"
                                           class="form-control"
                                           style="text-align: left; direction: ltr;">
                                </div>
                                @error('tarikh_start') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="control-label">دسته بندی</label>
                                <select name="cat_start" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('cat_start'))
                                        <option value="{{old('cat_start') ?? $period[0]->cat_start}}">{{old('cat_start') ?? $period[0]->cat_start}}</option>
                                    @endif
                                    @foreach($categories as $item)
                                        <option
                                            value="{{$item->category}}">{{$item->category .'    '. $item->mah}}</option>
                                    @endforeach
                                </select>
                                @error('category') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">
                                    مرغدار:
                                </label>
                                <select name="breeder" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('breeder'))
                                        <option value="{{old('breeder') ?? $period[0]->breeder}}">{{old('breeder') ?? $period[0]->breeder}}</option>
                                    @endif
                                    @foreach($breeder as $item)
                                        <option value="{{$item->name}}"> {{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('breeder') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">
                                    دکتر دامپزشک:
                                </label>
                                <select name="dr" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('dr'))
                                        <option value="{{old('dr') ?? $period[0]->dr}}">{{old('dr') ?? $period[0]->dr}}</option>
                                    @endif
                                    @foreach($drs as $item)
                                        <option
                                            value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('dr') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-form-label">
                                    کارشناس پرورش:
                                </label>
                                <select name="expert" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('expert'))
                                        <option value="{{old('expert') ?? $period[0]->expert}}">{{old('expert') ?? $period[0]->expert}}</option>
                                    @endif
                                    @foreach($experts as $item)
                                        <option
                                            value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('expert') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label class="col-lg-4 col-form-label">
                                    نوع بستر:
                                </label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control" value="{{ old('bed') ?? $period[0]->bed}}"
                                           name="bed">
                                    @error('bed') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="col-lg-4 col-form-label">
                                    تعداد جوجه ریزی: </label>
                                <div class="col-lg-8">
                                    <input type="number" required class="form-control" value="{{ old('t_joje') ?? $period[0]->t_joje}}"
                                           name="t_joje">
                                    @error('t_joje') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-lg-4 col-form-label">
                                    وزن جوجه اولیه: </label>
                                <div class="col-lg-8">
                                    <input type="number" required class="form-control" value="{{ old('v_joje') ?? $period[0]->v_joje }}"
                                           name="v_joje">
                                    @error('v_joje') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-lg-4 col-form-label">
                                    جوجه کشی: </label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control" value="{{ old('joje_keshi') ?? $period[0]->joje_keshi }}"
                                           name="joje_keshi">
                                    @error('joje_keshi') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">
                                    سویه:
                                </label>
                                <select name="soye" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('soye'))
                                        <option value="{{old('soye') ?? $period[0]->soye }}">{{old('soye') ?? $period[0]->soye }}</option>
                                    @else
                                        <option value="راس">راس</option>
                                        <option value="پلاس">پلاس</option>
                                        <option value="آرین">آرین</option>
                                        <option value="کاپ">کاپ</option>

                                    @endif
                                </select>
                                @error('soye') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-lg-4 col-form-label">
                                    مزرعه مرغ مادر: </label>
                                <div class="col-lg-8">
                                    <input type="text" required class="form-control" value="{{ old('farm_madar') ?? $period[0]->farm_madar }}"
                                           name="farm_madar">
                                    @error('farm_madar') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-lg-4 col-form-label">
                                    سن گله مادر: </label>
                                <div class="col-lg-8">
                                    <input type="number" required class="form-control"
                                           value="{{ old('sen_gale_madar') ?? $period[0]->sen_gale_madar }}"
                                           name="sen_gale_madar">
                                    @error('sen_gale_madar') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card mt-5 p-2">
                            <div class="card-header">
                                <h5 class="card-title">اطلاعات سالن ها</h5>
                            </div>
                            <div class="card-body">
                                <div class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 1:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number" required class="form-control" value="{{ old('t_joje_s1') ?? $period[0]->t_joje_s1}}"
                                                   name="t_joje_s1">
                                            @error('t_joje_s1') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s1" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s1') ?? $period[0]->sex_joje_s1)
                                                <option value="{{old('sex_joje_s1') ?? $period[0]->sex_joje_s1}}">{{old('sex_joje_s1') ?? $period[0]->sex_joje_s1}}</option>
                                            @else
                                                <option value=""></option>
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s1') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div id="2" hidden class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 2:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number" class="form-control" value="{{ old('t_joje_s2') ?? $period[0]->t_joje_s1}}"
                                                   name="t_joje_s2">
                                            @error('t_joje_s2') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s2" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s2') ?? $period[0]->sex_joje_s2)
                                                <option value="{{old('sex_joje_s2') ?? $period[0]->sex_joje_s2}}">{{old('sex_joje_s2') ?? $period[0]->sex_joje_s2}}</option>
                                            @else
                                                <option value=""></option>
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s2') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <div id="3" hidden class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 3:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number" class="form-control" value="{{ old('t_joje_s3') ?? $period[0]->t_joje_s3}}"
                                                   name="t_joje_s3">
                                            @error('t_joje_s3') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s3" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s3') ?? $period[0]->sex_joje_s3)
                                                <option value="{{old('sex_joje_s3') ?? $period[0]->sex_joje_s3}}">{{old('sex_joje_s3') ?? $period[0]->sex_joje_s3}}</option>
                                            @else
                                                <option value=""></option>
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s3') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <div id="4" hidden class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 4:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number"  class="form-control" value="{{ old('t_joje_s4') ?? $period[0]->t_joje_s4}}"
                                                   name="t_joje_s4">
                                            @error('t_joje_s4') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s4" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s4') ?? $period[0]->sex_joje_s4)
                                                <option value="{{old('sex_joje_s4') ?? $period[0]->sex_joje_s4}}">{{old('sex_joje_s4') ?? $period[0]->sex_joje_s4}}</option>
                                            @else
                                                <option value=""></option>
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s4') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div id="5" hidden class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 5:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number" class="form-control" value="{{ old('t_joje_s5') ?? $period[0]->t_joje_s5}}"
                                                   name="t_joje_s5">
                                            @error('t_joje_s5') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s5" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s5') ?? $period[0]->sex_joje_s5)
                                                <option value="{{old('sex_joje_s5') ?? $period[0]->sex_joje_s5}}">{{old('sex_joje_s5') ?? $period[0]->sex_joje_s5}}</option>
                                            @else
                                                <option value=""></option>
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s5') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <div id="6" hidden class="row col-md-12 ">
                                    <h5 class="title success m-auto">سالن شماره 6:</h5>
                                    <div class="form-group col-sm-5">
                                        <label class="col-lg-5 col-form-label">تعداد جوجه: </label>
                                        <div class="col-lg-5">
                                            <input type="number" class="form-control" value="{{ old('t_joje_s6') ?? $period[0]->t_joje_s6}}"
                                                   name="t_joje_s6">
                                            @error('t_joje_s6') <span class="text-danger"> {{ $message }}</span> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-sm-5">
                                        <label class="col-form-label">
                                            جنسیت جوجه:
                                        </label>
                                        <select name="sex_joje_s6" style="text-align: left; direction: ltr;"
                                                class="form-control">
                                            @if(old('sex_joje_s6') ?? $period[0]->sex_joje_s6)
                                                <option value="{{old('sex_joje_s6') ?? $period[0]->sex_joje_s6}}">{{old('sex_joje_s6') ?? $period[0]->sex_joje_s6}}</option>
                                            @else
                                                <option value="خروس">خروس</option>
                                                <option value="مرغ">مرغ</option>
                                            @endif
                                        </select>
                                        @error('sex_joje_s6') <span class="text-danger"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="add" type="button" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                    <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"></path>
                                </g>
                            </svg> افزودن سالن</button>

                        <div class="col-lg-12 mt-5">
                            <button type="submit" class="btn btn-primary">بروزرسانی</button>
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
        var i = 2;
        $("#add").click(function () {
            var sln = {{ \App\Models\Period::find($period[0]->id)->value('sln') }} ;
            if (i <= sln){
                document.getElementById(i).hidden = false;
                i ++;
            }
        });
    </script>
    <script src="{{ asset("assets/js/date-pick/persian-date.min.js") }}"></script>
    <script src="{{ asset("assets/js/date-pick/persian-datepicker.min.js") }}"></script>
@endsection
