@extends('layouts.dashboardLayout')
@section('content')
<h2>Cập nhật xe</h2>
<a href="{{route('xe.list')}}" class="btn btn-secondary">Trở lại</a>

<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Chủ xe @if ($errors->has('tenChuXe'))<p class="text-error">*{{$errors->first('tenChuXe')}}</p>@endif</label>
            <input type="text" name="tenChuXe" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{$xe->tenChuXe}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Giấy chứng nhận @if ($errors->has('giayChungNhan'))<p class="text-error">*{{$errors->first('giayChungNhan')}}</p>@endif</label>
            <input type="text" name="giayChungNhan" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->giayChungNhan}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Biển số @if ($errors->has('bienSo'))<p class="text-error">*{{$errors->first('bienSo')}}</p>@endif</label>
            <input type="text" name="bienSo" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->bienSo}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Nơi đăng ký @if ($errors->has('noiDangKy'))<p class="text-error">*{{$errors->first('noiDangKy')}}</p>@endif</label>
            <input type="text" name="noiDangKy" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->noiDangKy}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Hãng sản xuất @if ($errors->has('hangSX'))<p class="text-error">*{{$errors->first('hangSX')}}</p>@endif</label>
            <input type="text" name="hangSX" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->hangSX}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Dòng xe @if ($errors->has('dongXe'))<p class="text-error">*{{$errors->first('dongXe')}}</p>@endif</label>
            <input type="text" name="dongXe" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->dongXe}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Mục đích sử dụng @if ($errors->has('mucDichSuDung'))<p class="text-error">*{{$errors->first('mucDichSuDung')}}</p>@endif</label>
            <input type="text" name="mucDichSuDung" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->mucDichSuDung}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
            <input type="text" name="trangThai" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$xe->trangThai}}">
        </div>
        <a class="btn btn-danger"
            onclick="confirmDelete({{$xe->id}})">
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
