@extends('layouts.homeLayout')
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h3 align="center" style="text-shadow: 1px 1px 2px grey;">Danh sách đăng kiểm</h3>
                <a href="{{route('dangkiem.create')}}">
                    <button class="btn btn-primary" style="float: right;">Thêm mới</button>
                </a>
                <div class="form-group mt-4 row">
                    <div class="col-4">
                        {{-- <label for="optionStatus">Trạng thái</label> --}}
                        <select name="trangThai" id="select" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example" onchange="handleSelect()">
                            <option value="all" {{$option == 'all' ? 'selected' : ''}}>Tất cả</option>
                            <option value="indate" {{$option == 'indate' ? 'selected' : ''}}>Còn hạn</option>
                            <option value="nearly-outdate" {{$option == 'nearly-outdate' ? 'selected' : ''}}>Sắp hết hạn</option>
                            <option value="outdate" {{$option == 'outdate' ? 'selected' : ''}}>Hết hạn</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Chủ sở hữu</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Biển số</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Dòng xe</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Mã số cấp</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Ngày cấp</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Ngày hết hạn</b></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9 ps-2"><b>Trung tâm</b></th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"><b>Trạng thái</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listDangKiem as $item)
                            <tr class="tb-row" onclick="handleClickRow({{$item->id}})">
                                <td>
                                    <div class="px-2 py-1">
                                        <div class="flex-column justify-content-center">
                                            <h6 class="mb-0">{{$item->xe->tenChuXe}}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->xe->bienSo}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->xe->dongXe}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->maSoCap}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->ngayCap}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->ngayHetHan}}
                                    </p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">
                                        {{$item->trungtam->tenTrungTam}}
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
        var url = '{{ route("dangkiem.update", ":id") }}';
        url = url.replace(":id", id);
        location.replace(url);
    }

    function handleSelect() {
        var value = $('#select').val();
        var url = '{{route('dangkiem.list')}}' + '?option=' + value;
        location.replace(url);
    }
</script>
@endsection
