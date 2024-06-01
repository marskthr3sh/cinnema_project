@extends('admin.share.master')
@section('noi_dung')
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Cập Nhật Phim</h2>
        </div>
        <hr>
        <form action="{{ route('update', ['id' => $edit->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label class="mb-1">Tên Phim</label>
                        <input value="{{ $edit->ten_phim }}" name="ten_phim" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Slug Phim</label>
                        <input value="{{ $edit->slug_phim }}" name="slug_phim" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Hình Ảnh</label>
                        <input value="{{ $edit->hinh_anh }}" name="hinh_anh" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Tên Đạo Diễn</label>
                        <input value="{{ $edit->dao_dien }}" name="dao_dien" type="text" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="mb-1">Diễn Viên</label>
                        <input value="{{ $edit->dien_vien }}" name="dien_vien" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Thể Loại</label>
                        <input value="{{ $edit->the_loai }}" name="the_loai" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Thời Lượng Chiếu</label>
                        <input value="{{ $edit->thoi_luong }}" name="thoi_luong" type="number" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Ngôn Ngữ</label>
                        <input value="{{ $edit->ngon_ngu }}" name="ngon_ngu" type="text" class="form-control">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col">
                        <label class="mb-1">Rated</label>
                        <input value="{{ $edit->rated }}" name="rated" type="text" class="form-control"
                            placeholder="Nhập vào Rated">
                    </div>
                    <div class="col">
                        <label class="mb-1">Link youtube</label>
                        <input value="{{ $edit->trailer }}" name="trailer" type="text" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Thời Gian Bắt Đầu</label>
                        <input value="{{ $edit->bat_dau }}" name="bat_dau" type="date" class="form-control">
                    </div>
                    <div class="col">
                        <label class="mb-1">Thời Gian Kết Thúc</label>
                        <input value="{{ $edit->ket_thuc }}" name="ket_thuc" type="date" class="form-control">
                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label class="mb-3">Tình Trạng</label>
                        <select value="{{ $edit->trang_thai }}" name="trang_thai" class="form-control">
                            <option value="1">Hiển Thị Trang Chủ</option>
                            <option value="0">Không Hiển thị</option>
                        </select>
                    </div>
                    <div class="col-9">
                        <label class="mb-1">Mô Tả</label>
                        <textarea name="mo_ta" type="text" class="form-control" cols="30" rows="5">{!! strip_tags($edit->mo_ta) !!}</textarea>
                    </div>
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <a href="/admin/phim"> <button type="button" class="btn btn-secondary m-2">Trở lại</button> </a>
                <button type="submit" class="btn btn-primary">Cập Nhật Phim</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    {{-- <script>
    $(document).ready(function(){
        CKEDITOR.replace('mo_ta');
    });
</script> --}}
@endsection
