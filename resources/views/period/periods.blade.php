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
            <li class="breadcrumb-item"><a href="javascript:void(0)">مدیریت گزارشات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">شروع دوره</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات جوجه ریزی</h4>
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
                                <th>نوع بستر</th>
                                <th>جوجه کشی</th>
                                <th>فارم مادر</th>
                                <th>سن گله مادر</th>
                                <th>سویه</th>
                                <th>تعداد جوجه ریزی</th>
                                <th>وزن جوجه اولیه</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $item)
                                <tr>
                                    <td>{{ $item->breeder }}</td>
                                    <td>{{ $item->tarikh_start }}</td>
                                    <td>{{ $item->dr }}</td>
                                    <td>{{ $item->expert }}</td>
                                    <td>{{ $item->bed }}</td>
                                    <td>{{ $item->joje_keshi }}</td>
                                    <td>{{ $item->farm_madar }}</td>
                                    <td>{{ $item->sen_gale_madar }}</td>
                                    <td>{{ $item->soye }}</td>
                                    <td>{{ $item->t_joje }}</td>
                                    <td>{{ $item->v_joje }}</td>
                                    <td>
                                        <div class="dropdown mb-auto">
                                            <div class="btn-link" role="button" data-toggle="dropdown" aria-expanded="false">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"></path>
                                                    <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"></path>
                                                    <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"></path>
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(24px, 24px, 0px);" x-out-of-boundaries="">
                                                <a class="dropdown-item" href="{{ route('edit-start-period', $item->id) }}">ویرایش شروع دوره</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('report-period', [$item->tarikh_start, $item->breeder]) }}">نمایش گزارش</a>

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

    </div>
@endsection

{{--جاوا اسکریپت های اضافی در این قسمت قرار گیرد--}}
@section('js')
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
@endsection
