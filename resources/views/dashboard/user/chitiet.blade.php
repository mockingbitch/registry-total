@extends('layouts.dashboardLayout')
@section('content')
<h2>Cập nhật tài khoản</h2>
<a href="{{route('user.list')}}" class="btn btn-secondary">Trở lại</a>

<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Tên tài khoản @if ($errors->has('name'))<p class="text-error">*{{$errors->first('name')}}</p>@endif</label>
            <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{$user->name}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Email @if ($errors->has('email'))<p class="text-error">*{{$errors->first('email')}}</p>@endif</label>
            <input type="text" name="email" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$user->email}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Tỉnh thành @if ($errors->has('tinhThanh'))<p class="text-error">*{{$errors->first('tinhThanh')}}</p>@endif</label>
            <input type="text" name="tinhThanh" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$user->tinhThanh}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Thường trú @if ($errors->has('thuongTru'))<p class="text-error">*{{$errors->first('thuongTru')}}</p>@endif</label>
            <input type="text" name="thuongTru" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$user->thuongTru}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">CCCD @if ($errors->has('cccd'))<p class="text-error">*{{$errors->first('cccd')}}</p>@endif</label>
            <input type="text" name="cccd" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$user->cccd}}">
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Trung tâm @if ($errors->has('trungtam_id'))<p class="text-error">*{{$errors->first('trungtam_id')}}</p>@endif</label>
                <select name="trungtam_id" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listTrungTam as $i)
                        <option value="{{$i->id}}" {{$i->id === $user->trungtam_id ? 'selected' : ''}}>{{$i->tenTrungTam}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Vai trò @if ($errors->has('role'))<p class="text-error">*{{$errors->first('role')}}</p>@endif</label>
                <select name="role" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="admin" {{$user->role === 'admin' ? 'selected' : ''}}>Admin</option>
                    <option value="nhanvien" {{$user->role === 'nhanvien' ? 'selected' : ''}}>Nhân viên trung tâm</option>
                </select>
            </div>
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
                <select name="trangThai" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="1" {{$user->trangThai == 1 ? 'selected' : ''}}>Hiện</option>
                    <option value="0" {{$user->trangThai == 0 ? 'selected' : ''}}>Ẩn</option>
                </select>
            </div>
        </div>
        <a class="btn btn-danger"
            onclick="confirmDelete({{$user->id}})">
            <i class="far fa-trash-alt"></i>
        </a>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
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
<script>
    function confirmDelete(id) {
        swal({
            title: "Bạn có muốn xoá mục này?",
            text: "Dữ liệu xoá sẽ không thể khôi phục!",
            icon: "warning",
            buttons: [
                'Huỷ',
                'Xoá'
            ],
            dangerMode: true,
        }).then(function(isConfirm) {
            if (isConfirm) {
                var url = '{{ route("xe.delete", ":id") }}';
                url = url.replace(":id", id);

                $.get(url, function(data) {
                    swal({
                        title: 'Đã xoá!',
                        text: 'Xoá thành công mục này!',
                        icon: 'success'
                    }).then(function() {
                        setTimeout(() => {
                            location.replace('{{ route("xe.list") }}')
                        }, 500);
                    });
                });
            } else {
                swal("Huỷ", "Dữ liệu của bạn vẫn an toàn :)", "error");
            }
        })
    }
</script>
@endsection
