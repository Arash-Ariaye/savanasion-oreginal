@extends('layouts.app')

{{--styles code hear--}}
@section('css')
    @toastr_css

    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

{{--contents cods hear--}}
@section("content")

    <div class="row col-xl-auto mt-3">
        <div class="col-md-3">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
                                        <img src="{{ asset('assets/images/farm-house.png') }}" alt="">
                                    </span>
                        <div class="media-body">
                            <p class="mb-1">دوره جاری</p>
                            <h4 class="mb-0">{{ $periods->count() }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
										    <img src="{{ asset('assets/images/farm-house.png') }}" alt="">
                                    </span>
                        <div class="media-body">
                            <p class="mb-1">فارم</p>
                            <h4 class="mb-0">{{ $farms }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
										<img src="{{ asset('assets/images/doctor.png') }}" alt="">
                                    </span>
                        <div class="media-body">
                            <p class="mb-1">دکتر</p>
                            <h4 class="mb-0">{{ $drs }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
									<span class="mr-3">
										<!-- <i class="ti-user"></i> -->
										<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30"
                                             height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-user">
											<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
											<circle cx="12" cy="7" r="4"></circle>
										</svg>
                                    </span>
                        <div class="media-body">
                            <p class="mb-1">کارشناس</p>
                            <h4 class="mb-0">{{ $experts }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-lg-12 p-1">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">دوره های در حال پرورش</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                                <th>مرغدار</th>
                                <th>تاریخ جوجه ریزی</th>
                                <th>دامپزشک</th>
                                <th>کارشناس</th>
                                <th>سن گله(امروز)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods->limit(6)->get() as $item)
                                <tr>
                                    <td>{{ $item->breeder }}</td>
                                    <td>{{ $item->tarikh_start }}</td>
                                    <td>{{ $item->dr }}</td>
                                    <td>{{ $item->expert }}</td>
                                    <td>{{ $help->age($item->tarikh_start) }}</td>
                                    <td>
                                        <div class="dropdown mb-auto">
                                            <div class="btn-link" role="button" data-toggle="dropdown"
                                                 aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z"
                                                        fill="black"></path>
                                                    <path
                                                        d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z"
                                                        fill="black"></path>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                                 style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(24px, 24px, 0px);"
                                                 x-out-of-boundaries="">
                                                <a class="dropdown-item"
                                                   href="{{ route('report-period', [$item->tarikh_start, $item->breeder]) }}">نمایش گزارش</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('daily-reports', [$item->tarikh_start, $item->breeder]) }}">گزارشات این دوره</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('add-daily-report', $item->id) }}">ثبت گزارش</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('edit-start-period', $item->id) }}">ویرایش شروع
                                                    دوره</a>
                                                <form action="{{ route('destroy-period', $item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit"
                                                            onclick="alert('حذف شود ؟')">حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-md-5 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">آخرین گزارشات روزانه ثبت شده</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                                <th>گزارش فارم</th>
                                <th>تاریخ ثبت گزارش</th>
                                <th>سن گله(روز)</th>
                                <th>*</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dailyReport as $item)
                                <tr>
                                    <td>{{ $item->breeder }}</td>
                                    <td>{{ $item->tarikh }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-right">
                                            <div class="btn-link" data-toggle="dropdown">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24"
                                                     version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                       fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                        </circle>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                   href="{{ route('view-daily-report', $item->id ) }}">مشاهده</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('edit-daily-report', $item->id ) }}">ویرایش</a>
                                                <form action="{{ route('destroy-daily-report', $item->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit"
                                                            onclick="alert('حذف شود ؟')">حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


{{--js codes hear--}}
@section("js")

    @toastr_js
    @toastr_render
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

@endsection
