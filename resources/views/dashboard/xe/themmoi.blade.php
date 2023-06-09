@extends('layouts.dashboardLayout')
@section('content')
<h2>Thêm mới xe</h2>
<div class="card mb-4">
    <form action="{{route('xe.import')}}">
        <input type="file" name="file">
        <button type="submit" class="btn btn-primary">Nhập Excel</button>
    </form>
    <form class="mx-4 pt-4" action="{{route('xe.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Chủ xe @if ($errors->has('tenChuXe'))<p class="text-error">*{{$errors->first('tenChuXe')}}</p>@endif</label>
            <input type="tenChuXe" name="tenTrungTam" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{Request::old('tenChuXe')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Giấy chứng nhận @if ($errors->has('giayChungNhan'))<p class="text-error">*{{$errors->first('giayChungNhan')}}</p>@endif</label>
            <input type="text" name="giayChungNhan" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('giayChungNhan')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Biển số @if ($errors->has('bienSo'))<p class="text-error">*{{$errors->first('bienSo')}}</p>@endif</label>
            <input type="text" name="bienSo" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('bienSo')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Nơi đăng ký @if ($errors->has('noiDangKy'))<p class="text-error">*{{$errors->first('noiDangKy')}}</p>@endif</label>
            <input type="text" name="noiDangKy" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('noiDangKy')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Hãng sản xuất @if ($errors->has('hangSX'))<p class="text-error">*{{$errors->first('hangSX')}}</p>@endif</label>
            <input type="text" name="hangSX" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('hangSX')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Dòng xe @if ($errors->has('dongXe'))<p class="text-error">*{{$errors->first('dongXe')}}</p>@endif</label>
            <input type="text" name="dongXe" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('dongXe')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Mục đích sử dụng @if ($errors->has('mucDichSuDung'))<p class="text-error">*{{$errors->first('mucDichSuDung')}}</p>@endif</label>
            <input type="text" name="mucDichSuDung" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('mucDichSuDung')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
            <input type="text" name="trangThai" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('trangThai')}}">
        </div>
        <a class="btn btn-secondary" href="{{route('xe.list')}}">Trở về</a>
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
