@extends('layouts.app')

@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles p-3">
        <h4>مدیریت گزارش‌های روزانه</h4>
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت گزارشات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">گزارشات روزانه</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">مدیریت گزارش‌های روزانه</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display min-w850">
                            <thead>
                            <tr>
                                <th>گزارش فارم</th>
                                <th>ثبت کننده گزارش</th>
                                <th>تاریخ ثبت گزارش</th>
                                <th>سن گله(روز)</th>
                                <th>*</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dailyReport as $item)
                                <tr>
                                    <td>{{ $item->breeder }}</td>
                                    <td>{{ $item->expert }}</td>
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
                                                <a class="dropdown-item" href="{{ route('view-daily-report', $item->id ) }}">مشاهده</a>
                                                <a class="dropdown-item" href="{{ route('edit-daily-report', $item->id ) }}">ویرایش</a>
                                                <form action="{{ route('destroy-daily-report', $item->id) }}" method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit" onclick="alert('حذف شود ؟')">حذف</button>
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
