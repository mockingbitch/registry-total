@extends('layouts.dashboardLayout')
@section('content')
<h2>Thêm mới trung tâm</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Tên trung tâm @if ($errors->has('tenTrungTam'))<p class="text-error">*{{$errors->first('tenTrungTam')}}</p>@endif</label>
            <input type="text" name="tenTrungTam" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{Request::old('tenTrungTam')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Tỉnh thành @if ($errors->has('tinhThanh'))<p class="text-error">*{{$errors->first('tinhThanh')}}</p>@endif</label>
            <input type="text" name="tinhThanh" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('tinhThanh')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Địa chỉ @if ($errors->has('diaChi'))<p class="text-error">*{{$errors->first('diaChi')}}</p>@endif</label>
            <input type="text" name="diaChi" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('diaChi')}}">
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

        <a class="btn btn-secondary" href="{{route('trung-tam.list')}}">Trở về</a>
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
