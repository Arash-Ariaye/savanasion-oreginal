@extends('layouts.app')

{{--استایل ها و لینک های اضافی در این سکشن قرار گیرد--}}
@section('css')
    <!-- Datatable -->
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

{{--جزیات صفحه در این سکشن قرار گیرد--}}
@section('content')
    <div class="page-titles">
        <h4>لیست مرغدار ها</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">فارم گوشتی</a></li>
            <li class="breadcrumb-item "><a href="javascript:void(0)">مدیریت اطلاعات</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">لیست مرغدار ها</a></li>
        </ol>
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">اطلاعات مرغدار ها</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="display min-w850">
                            <thead>
                            <tr>
                                <th></th>
                                <th>نام مرغدار</th>
                                <th>پروانه</th>
                                <th>آدرس</th>
                                <th>همراه</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td></td>
                                    <td>{{ !is_null($item->name) ? $item->name : 'ثبت نشده' }}</td>
                                    <td>{{ !is_null($item->capacity) ? $item->capacity : 'ثبت نشده' }}</td>
                                    <td>{{ !is_null($item->address) ? $item->address : 'ثبت نشده' }}</td>
                                    <td>{{ !is_null($item->phone) ? $item->phone : 'ثبت نشده' }}</td>
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
                                                <a class="dropdown-item" href="#">گزارش گیری</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('edit-breeders', $item->id ) }}">ویرایش</a>
                                                <form action="{{ route('destroy-breeders', $item->id) }}" method="post">
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
