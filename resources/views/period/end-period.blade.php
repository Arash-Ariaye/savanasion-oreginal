@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset("assets/css/date-pick/persian-datepicker.min.css") }}">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4>ثبت گزارش پایان دوره</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">ثبت گزارش</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)"> پایان دوره</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">افزودن گزارش پایان دوره</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                    <form class="form-valide" action="{{ route('create-end-period') }}" method="post">
                        @csrf
                        @method('PUT')
                        @if($errors->any())
                            @foreach($errors as $error)
                                @error($error)<span class="text-danger"> {{ $message }}</span> @enderror
                            @endforeach
                        @endif
                        <div class="row col-lg-12 justify-content-lg-between">
                            <div class="col-md-4 p-2">
                                <label class="control-label">تاریخ تخله کامل</label>
                                <div class="input-group col-md-12">
                                    <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                    </div>
                                    <input name="tarikh_end"
                                           class="date-pick normal-example form-control pwt-datepicker-input-element"
                                           style="text-align: left; direction: ltr;">
                                </div>
                                @error('tarikh_end') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-4 p-2">
                                <label class="control-label">دسته بندی</label>
                                <select name="cat_end" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('cat_end'))
                                        <option value="{{old('cat_end')}}">{{old('cat_end')}}</option>
                                    @endif
                                    @foreach($categories as $item)
                                        <option
                                            value="{{$item->category}}">{{$item->category .'    '. $item->mah}}</option>
                                    @endforeach
                                </select>
                                @error('cat_end') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label">
                                    مرغدار:
                                </label>
                                <select name="period" style="text-align: left; direction: ltr;"
                                        class="form-control">
                                    @if(old('period'))
                                        <option value="{{old('period')}}">{{old('period')}}</option>
                                    @endif
                                    @foreach($period as $item)
                                        <option value="{{$item->id}}"> {{$item->breeder}}</option>
                                    @endforeach
                                </select>
                                @error('period') <span class="text-danger"> {{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="col-md-12 col-form-label">
                                    دان باقیمانده:
                                </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ old('dan_baghimande') }}"
                                           name="dan_baghimande">
                                    @error('dan_baghimande') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md-12 col-form-label">
                                    تعداد مرغ ته سالن:
                                </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ old('t_morgh_tah_salon') }}"
                                           name="t_morgh_tah_salon">
                                    @error('t_morgh_tah_salon') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md-12 col-form-label">
                                     وزن مرغ مرغ ته سالن:
                                </label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{ old('v_morgh_tah_salon') }}"
                                           name="v_morgh_tah_salon">
                                    @error('v_morgh_tah_salon') <span class="text-danger"> {{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 mt-5">
                            <button type="submit" class="btn btn-primary">ثبت پایان دوره</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <script src="{{ asset("assets/js/date-pick/persian-date.min.js") }}"></script>
    <script src="{{ asset("assets/js/date-pick/persian-datepicker.min.js") }}"></script>

    <script>
        $('.date-pick').persianDatepicker({
            observer: true,
            format: 'YYYY-MM-DD',
            altField: '.observer-example-alt',
            autoClose: true,
            calendar: {
                persian: {
                    locale: 'en'
                }
            }
        });
    </script>
@endsection
