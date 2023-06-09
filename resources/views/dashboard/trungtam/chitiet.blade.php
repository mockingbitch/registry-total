@extends('layouts.dashboardLayout')
@section('content')
<h2>Cập nhật trung tâm</h2>
<a href="{{route('trung-tam.list')}}" class="btn btn-secondary">Trở lại</a>

<div class="card mb-4">
    <form class="mx-4 pt-4" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="inputName">Tên trung tâm @if ($errors->has('tenTrungTam'))<p class="text-error">*{{$errors->first('tenTrungTam')}}</p>@endif</label>
            <input type="text" name="tenTrungTam" class="form-control" id="inputName" aria-describedby="nameHelp" value="{{$trungTam->tenTrungTam}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Tỉnh thành @if ($errors->has('tinhThanh'))<p class="text-error">*{{$errors->first('tinhThanh')}}</p>@endif</label>
            <input type="text" name="tinhThanh" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$trungTam->tinhThanh}}">
        </div>
        <div class="form-group mt-4">
            <label for="inputDescription">Địa chỉ @if ($errors->has('diaChi'))<p class="text-error">*{{$errors->first('diaChi')}}</p>@endif</label>
            <input type="text" name="diaChi" class="form-control" id="inputDescription" aria-describedby="nameHelp" value="{{$trungTam->diaChi}}">
        </div>
        <div class="form-group mt-4">
            <label for="optionStatus">Trạng thái @if ($errors->has('trangThai'))<p class="text-error">*{{$errors->first('trangThai')}}</p>@endif</label>
            <select name="trangThai" id="optionStatus" style="width: 50%; height: 50px;" class="select form-control mb-3" aria-label=".form-select-lg example">
                <option value="1" {{$trungTam->trangThai == 1 ? 'selected' : ''}}>Hiện</option>
                <option value="0" {{$trungTam->trangThai == 0 ? 'selected' : ''}}>Ẩn</option>
            </select>
        </div>
        <br>
        <a class="btn btn-danger"
            onclick="confirmDelete({{$trungTam->id}})">
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
                var url = '{{ route("trung-tam.delete", ":id") }}';
                url = url.replace(":id", id);

                $.get(url, function(data) {
                    swal({
                        title: 'Đã xoá!',
                        text: 'Xoá thành công mục này!',
                        icon: 'success'
                    }).then(function() {
                        setTimeout(() => {
                            location.replace('{{ route("trung-tam.list") }}')
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
