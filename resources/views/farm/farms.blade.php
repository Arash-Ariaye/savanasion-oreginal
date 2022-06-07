@extends('layouts.app')
{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">


@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>لیست فارم ها</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">فارم گوشتی</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">شناسنامه فارم ها</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">شناسنامه فارم ها</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                                <th>مرغدار</th>
                                <th>تلفن</th>
                                <th> سوخت</th>
                                <th> تهویه</th>
                                <th> روشنایی</th>
                                <th>آبخوری</th>
                                <th>آب مصرفی</th>
                                <th>مخزن آب</th>
                                <th>تصفیه</th>
                                <th>لاشه سوز</th>
                                <th>چاه تلفات</th>
                                <th>سیستم دانخوری</th>
                                <th>انتقال دان</th>
                                <th>چاه سپتیک</th>
                                <th>محوطه مرغداری</th>
                                <th>خنک کننده</th>
                                <th>مولد برق</th>
                                <th>آلارم قطع برق</th>
                                <th>آلارم دما</th>
                                <th>دوربین مدار بسته</th>
                                <th>باسکول</th>
                                <th>قرنطینه ورودی</th>
                                <th>حصار مرغداری</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $item)
                                <tr>
                                    <td>{{$item->breeder}}</td>
                                    <td><a style="color: orangered"
                                           href="tel:{{$item->breeder_phone}}">{{$item->breeder_phone}}</a></td>
                                    <td>{{ $item->gas }}</td>
                                    <td>{{ $item->air_sys }}</td>
                                    <td>{{ $item->light_sys }}</td>
                                    <td>{{ $item->drink_sys }}</td>
                                    <td>{{ $item->water }}</td>
                                    <td>{{ $item->water_tank }}</td>
                                    <td>{{ $item->filtration !== '0' ? 'دارد' : 'ندارد' }}</td>
                                    <td>{{ $item->carcass  == 1 ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->losses_pit  == 1 ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->seeds }}</td>
                                    <td>{{ $item->seeds_transfer  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->septic_tank  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->form_area }}</td>
                                    <td>{{ $item->cooling_sys }}</td>
                                    <td>{{ $item->generator  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->power_alert  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->air_alert  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->cctv == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->weighbridge  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->input_quarantine  == '1' ? 'دارد': 'ندارد'}}</td>
                                    <td>{{ $item->fences }}</td>
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
                                                <a class="dropdown-item" href="{{ route('edit-farm', $item->id) }}">ویرایش</a>
                                                <form action="{{ route('destroy-farms', $item->id) }}" method="post">
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

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
@endsection
