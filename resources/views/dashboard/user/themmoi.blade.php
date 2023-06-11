@extends('layouts.dashboardLayout')
@section('content')
<h2>Thêm mới tài khoản</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Tên tài khoản @if ($errors->has('name'))<p class="text-error">*{{$errors->first('name')}}</p>@endif</label>
            <input type="text" name="name" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{Request::old('name')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Email @if ($errors->has('email'))<p class="text-error">*{{$errors->first('email')}}</p>@endif</label>
            <input type="text" name="email" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('email')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Tỉnh thành @if ($errors->has('tinhThanh'))<p class="text-error">*{{$errors->first('tinhThanh')}}</p>@endif</label>
            <input type="text" name="tinhThanh" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('tinhThanh')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Thường trú @if ($errors->has('thuongTru'))<p class="text-error">*{{$errors->first('thuongTru')}}</p>@endif</label>
            <input type="text" name="thuongTru" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('thuongTru')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">CCCD @if ($errors->has('cccd'))<p class="text-error">*{{$errors->first('cccd')}}</p>@endif</label>
            <input type="text" name="cccd" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('cccd')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Mật khẩu @if ($errors->has('password'))<p class="text-error">*{{$errors->first('password')}}</p>@endif</label>
            <input type="password" name="password" class="form-control" id="inputDescription" aria-describedby="nameHelp">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Xác nhận mật khẩu @if ($errors->has('confirmPassword'))<p class="text-error">*{{$errors->first('cccconfirmPasswordd')}}</p>@endif</label>
            <input type="password" name="confirmPassword" class="form-control" id="inputDescription" aria-describedby="nameHelp">
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Trung tâm @if ($errors->has('trungtam_id'))<p class="text-error">*{{$errors->first('trungtam_id')}}</p>@endif</label>
                <select name="trungtam_id" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listTrungTam as $i)
                        <option value="{{$i->id}}">{{$i->tenTrungTam}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Vai trò @if ($errors->has('role'))<p class="text-error">*{{$errors->first('role')}}</p>@endif</label>
                <select name="role" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="admin">Admin</option>
                    <option value="nhanvien">Nhân viên trung tâm</option>
                </select>
            </div>
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
                <select name="trangThai" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
        </div>
        
        <a class="btn btn-secondary" href="{{route('user.list')}}">Trở về</a>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
    </form>
</div>
@if (Session::has('msg'))
    <script>
        swal({title: "Thành công",text: "{{Session::get('msg')}}", icon: "success", button: "Đóng"});
    </script>
@endif
@if (Session::has('errMsg'))
    <script>
        swal({title: "Thất bại",text: "{{Session::get('errMsg')}}", icon: "warning", button: "Đóng"});
    </script>
@endif
@endsection
