@extends('layouts.app')

@section('css')

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4>گزارش دوره</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">گزارش گیری</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">مشاهده گزارش </a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h1 class="card-title m-auto"> {{ $period[0]->breeder }} </h1>
                </div>
                <div class="card-body pb-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>تاریخ جوجه ریزی:</strong>
                            <span class="mb-0"> {{ $period[0]->tarikh_start }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>تاریخ تخلیه کامل:</strong>
                            <span
                                class="mb-0"> {{ is_null($period[0]->tarikh_end) ? 'جاری': $period[0]->tarikh_end }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>تعداد جوجه ریزی:</strong>
                            <span class="mb-0"> {{ $period[0]->t_joje }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>تعداد تلفات دوره:</strong>
                            <span class="mb-0"> {{ $tTalafat }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>درصد تلفات دوره:</strong>
                            <span class="mb-0"> {{ substr($tTalafat / $period[0]->t_joje * 100, 0, 4) }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>وزن تلفات دوره:</strong>
                            <span class="mb-0"> {{ $vTalafat }} </span>
                        </li>
                        <li class="list-group-item d-flex px-0 justify-content-between">
                            <strong>دان مصرفی دوره:</strong>
                            <span class="mb-0"> {{ $danMasrafi }}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer pt-0 pb-0 text-center">
                    <div class="row">
                        <div class="col-6 pt-3 pb-3 border-right">
                            <h5 class="mb-1 text-primary">{{ $period[0]->dr }}</h5>
                            <span>دکتر دامپزشک:</span>
                        </div>

                        <div class="col-6 pt-3 pb-3">
                            <h5 class="mb-1 text-primary">{{ $period[0]->expert }}</h5>
                            <span>کارشناس پرورش:</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        @if(!is_null($period[0]->t_joje_s1))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (1)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s1 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s1 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>
                                {{ $dailyReports->sum('t_talafat_s1') }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s1') / $period[0]->t_joje_s1 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s1') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s1') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
        @if(!is_null($period[0]->t_joje_s2))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (2)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s2 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s2 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>  {{ $dailyReports->sum('t_talafat_s2') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s2') / $period[0]->t_joje_s2 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s2') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s2') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
        @if(!is_null($period[0]->t_joje_s3))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (3)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s3 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s3 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>  {{ $dailyReports->sum('t_talafat_s3') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s3') / $period[0]->t_joje_s3 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s3') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s3') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
        @if(!is_null($period[0]->t_joje_s4))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (4)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s4 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s4 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>  {{ $dailyReports->sum('t_talafat_s4') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s4') / $period[0]->t_joje_s2 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s4') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s4') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
        @if(!is_null($period[0]->t_joje_s5))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (5)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s5 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s5 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>  {{ $dailyReports->sum('t_talafat_s5') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s5') / $period[0]->t_joje_s5 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s5') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s5') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
        @if(!is_null($period[0]->t_joje_s6))
            <div class="col-xl-4 col-lg-6 col-xxl-4 col-sm-6">
                <div class="card text-white bg-warning text-black">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"><span class="mb-0 size-2 m-auto">سالن یک (6)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد جوجه این سالن :</span><strong>
                                {{ $period[0]->t_joje_s6 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">جنسیت جوجه :</span><strong>
                                {{ $period[0]->sex_joje_s6 }} </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد تلفات :</span><strong>  {{ $dailyReports->sum('t_talafat_s6') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">درصد تلفات :</span><strong>  {{ substr($dailyReports->sum('t_talafat_s6') / $period[0]->t_joje_s6 * 100, 0, 4) }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">وزن تلفات:</span><strong>  {{ $dailyReports->sum('v_talafat_s6') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">دان مصرفی(کیلوگرم) :</span><strong>  {{ $dailyReports->sum('dan_masrafi_s6') }} </strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">تعداد ارسالی به کشتارگاه :</span><strong> /*/ </strong></li>
                        <li class="list-group-item d-flex justify-content-between"><span
                                class="mb-0">میانگین وزن :</span><strong> /*/ </strong></li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
    <div class="row p-2">
        <div class="card col-xl-12">
            <div class="card-header">
                <h3 class="card-title">نمودار تعداد تلفات روزانه</h3>
            </div>
            <div class="card-body">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chTalafat->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="card col-xl-12">
            <div class="card-header">
                <h3 class="card-title">نمودار وزن تلفات روزانه</h3>
            </div>
            <div class="card-body">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chvTalafat->container() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <script src="{{ asset('assets/chart/apexcharts.js') }}"></script>

    {{ $chTalafat->script() }}
    {{ $chvTalafat->script() }}
@endsection
