@extends('layouts.homeLayout')
@section('content')
<h2>Thêm mới đăng kiểm</h2>
<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Xe @if ($errors->has('xe_id'))<p class="text-error">*{{$errors->first('xe_id')}}</p>@endif</label>
                <select name="xe_id" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listXe as $item)
                        <option value="{{$item->id}}">{{$item->bienSo}} {{$item->dongXe}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-4">
        <label for="inputDescription">Mã số cấp @if ($errors->has('maSoCap'))<p class="text-error">*{{$errors->first('maSoCap')}}</p>@endif</label>
            <input type="text" name="maSoCap" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('maSoCap')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Ngày cấp @if ($errors->has('ngayCap'))<p class="text-error">*{{$errors->first('ngayCap')}}</p>@endif</label>
            <input type="date" name="ngayCap" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('ngayCap')}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Ngày hết hạn @if ($errors->has('ngayHetHan'))<p class="text-error">*{{$errors->first('ngayHetHan')}}</p>@endif</label>
            <input type="date" name="ngayHetHan" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{Request::old('ngayHetHan')}}">
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

        <a class="btn btn-secondary" href="{{route('dangkiem.list')}}">Trở về</a>
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
