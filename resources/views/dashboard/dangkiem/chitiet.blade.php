@extends('layouts.homeLayout')
@section('content')
<h2>Cập nhật đăng kiểm</h2>
<a href="{{route('dangkiem.list')}}" class="btn btn-secondary">Trở lại</a>

<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Xe @if ($errors->has('xe_id'))<p class="text-error">*{{$errors->first('xe_id')}}</p>@endif</label>
                <select name="xe_id" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    @foreach ($listXe as $item)
                        <option value="{{$item->id}}" {{$item->id === $dangKiem->xe_id ? 'selected' : ''}}>{{$item->bienSo}} {{$item->dongXe}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group mt-4">
        <label for="inputDescription">Mã số cấp @if ($errors->has('maSoCap'))<p class="text-error">*{{$errors->first('maSoCap')}}</p>@endif</label>
            <input type="text" name="maSoCap" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$dangKiem->maSoCap}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Ngày cấp @if ($errors->has('ngayCap'))<p class="text-error">*{{$errors->first('ngayCap')}}</p>@endif</label>
            <input type="date" name="ngayCap" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$dangKiem->ngayCap}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Ngày hết hạn @if ($errors->has('ngayHetHan'))<p class="text-error">*{{$errors->first('ngayHetHan')}}</p>@endif</label>
            <input type="date" name="ngayHetHan" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$dangKiem->ngayHetHan}}">
        </div>
        <div class="form-group mt-4 row">
            <div class="col-4">
                <label for="optionStatus">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
                <select name="trangThai" class="select form-control form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option value="1" {{$dangKiem->trangThai == 1 ? 'selected' : ''}}>Hiện</option>
                    <option value="0" {{$dangKiem->trangThai == 0 ? 'selected' : ''}}>Ẩn</option>
                </select>
            </div>
        </div>

        <a class="btn btn-danger"
            onclick="confirmDelete({{$dangKiem->id}})">
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
                var url = '{{ route("dangkiem.delete", ":id") }}';
                url = url.replace(":id", id);

                $.get(url, function(data) {
                    swal({
                        title: 'Đã xoá!',
                        text: 'Xoá thành công mục này!',
                        icon: 'success'
                    }).then(function() {
                        setTimeout(() => {
                            location.replace('{{ route("dangkiem.list") }}')
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
