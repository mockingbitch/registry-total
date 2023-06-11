@php
use App\Constants\RouteConstant;
@endphp

@extends('layouts.dashboardLayout')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách tài khoản</h3>
                <a href="{{route('user.create')}}">
                    <button class="btn btn-primary" style="float: right;">Thêm mới</button>
                </a>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Tên</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Email</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Tỉnh thành</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Thường trú</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>CCCD</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Trung tâm</b></th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Trạng thái</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listUser as $item)
                            <tr class="tb-row" onclick="handleClickRow({{$item->id}})">
                                <td>
                                    <div class="px-2 py-1">
                                        <div class="flex-column justify-content-center">
                                            <h6 class="mb-0">{{$item->name}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->email}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->tinhThanh}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->thuongTru}}
                                    </p>
                                </td><td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->cccd}}
                                    </p>
                                </td><td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->trungTam->tenTrungTam}}
                                    </p>
                                </td>
                                <td style="text-align: center">
                                    @if ($item->trangThai == 1)
                                        <i class="far fa-thumbs-up" style="color:green"></i>
                                    @else
                                        <i class="far fa-thumbs-down" style="color:red"></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('msg'))
        <script>
            swal({title:"Thành công", text:"{{Session::get('msg')}}", icon:"success", button:"Đóng",});
        </script>
    @endif
    @if (Session::has('errMsg'))
        <script>
            swal({title:"Thất bại", text:"{{Session::get('errMsg')}}", icon:"warning", button:"Đóng",});
        </script>
    @endif
    {{-- {!! $products->links("pagination::bootstrap-4") !!} --}}
</div>
<script>
    function handleClickRow(id) {
        var url = '{{ route("user.update", ":id") }}';
        url = url.replace(":id", id);
        location.replace(url);
    }
</script>
@endsection
