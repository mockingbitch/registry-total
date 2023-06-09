@php
use App\Constants\RouteConstant;
@endphp

@extends('layouts.dashboardLayout')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách trung tâm</h3>
                <a href="{{route('xe.create')}}">
                    <button class="btn btn-primary" style="float: right;">Thêm mới</button>
                </a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Tên chủ xe</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Giấy chứng nhận</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Biển số</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Nơi đăng ký</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Hãng sản xuất</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Dòng xe</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Mục đích sử dụng</b></th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Trạng thái</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listXe as $item)
                            <tr class="tb-row" onclick="handleClickRow({{$item->id}})">
                                <td>
                                    <div class="px-2 py-1">
                                        <div class="flex-column justify-content-center">
                                            <h6 class="mb-0">{{$item->tenChuXe}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->giayChungNhan}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->bienSo}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->noiDangKy}}
                                    </p>
                                </td><td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->hangSX}}
                                    </p>
                                </td><td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->dongXe}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->mucDichSuDung}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->trangThai}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        var url = '{{ route("xe.update", ":id") }}';
        url = url.replace(":id", id);
        location.replace(url);
    }
</script>
@endsection
