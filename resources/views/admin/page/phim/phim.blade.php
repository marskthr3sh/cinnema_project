@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH PHIM</h6>
        </div>
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themPhimModal" type="button" class="btn btn-primary">Thêm Mới
                Phim</button>
            <div class="modal fade" id="themPhimModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title">Thêm Mới Phim</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('phim') }}" method="POST">
                            @csrf
                            <div class="was-validated">
                                <div class="modal-body">

                                    <div class="row mb-2 ">
                                        <div class="col">
                                            <label class="mb-2">Tên Phim</label>
                                            <input name="ten_phim" type="text" class="form-control"
                                                placeholder="Nhập vào tên phim" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Slug Phim</label>
                                            <input name="slug_phim" type="text" class="form-control"
                                                placeholder="Nhập vào slug phim" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Hình Ảnh</label>
                                            <input name="hinh_anh" type="text" class="form-control"
                                                placeholder="Nhập vào ảnh đại diện" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Tên Đạo Diễn</label>
                                            <input name="dao_dien" type="text" class="form-control"
                                                placeholder="Nhập vào danh sách đạo diễn" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="mb-2">Diễn Viên</label>
                                            <input name="dien_vien" type="text" class="form-control"
                                                placeholder="Nhập vào danh sách diễn viên" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thể Loại</label>
                                            <input name="the_loai" type="text" class="form-control"
                                                placeholder="Nhập vào thể loại" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Lượng Chiếu</label>
                                            <input name="thoi_luong" type="number" class="form-control"
                                                placeholder="Nhập vào số phút chiếu" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Ngôn Ngữ</label>
                                            <input name="ngon_ngu" type="text" class="form-control"
                                                placeholder="Nhập vào ngôn ngữ" required="">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="mb-2">Rated</label>
                                            <input name="rated" type="text" class="form-control"
                                                placeholder="Nhập vào Rated" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Link youtube</label>
                                            <input name="trailer" type="text" class="form-control"
                                                placeholder="Nhập vào link youtube" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Gian Bắt Đầu</label>
                                            <input name="bat_dau" type="date" class="form-control"
                                                placeholder="Nhập vào số phút chiếu" required="">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Thời Gian Kết Thúc</label>
                                            <input name="ket_thuc" type="date" class="form-control"
                                                placeholder="Nhập vào ngôn ngữ" required="">
                                        </div>

                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            <label class="mb-3">Tình Trạng</label>
                                            <select name="trang_thai" class="form-control">
                                                <option value="1">Hiển Thị Trang Chủ</option>
                                                <option value="0">Không Hiển thị</option>
                                            </select>
                                        </div>
                                        <div class="col-9">
                                            <label class="mb-2">Mô Tả</label>
                                            <textarea name="mo_ta" class="form-control" cols="30" rows="5" placeholder="Nhập vào mô tả phim"
                                                required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="showToastrBtn" class="btn btn-primary">Thêm Phim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tên Phim</th>
                                        <th class="text-center">Thể Loại</th>
                                        <th class="text-center">Hình Ảnh</th>
                                        <th class="text-center">Thời Gian Chiếu</th>
                                        <th class="text-center">Tình Trạng</th>
                                        <th class="text-center">Hiển Thị</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    {{-- @if ($message = Session::get('success'))
                                        <div id="success-alert" class="text-center alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert"><i
                                                    class="fa-solid fa-check"></i></button>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        <script>
                                            setTimeout(function() {
                                                $('#success-alert').fadeOut('slow');
                                            }, 3000);
                                        </script>
                                    @endif

                                    @if ($message = Session::get('error'))
                                        <div id="success-alert" class="text-center alert alert-danger alert-block">
                                            <button type="button" class="close" data-dismiss="alert"><i
                                                    class="fa-solid fa-check"></i></button>
                                            <strong>{{ $message }}</strong>
                                        </div>

                                        <script>
                                            setTimeout(function() {
                                                $('#success-alert').fadeOut('slow');
                                            }, 3000);
                                        </script>
                                    @endif --}}

                                    @php
                                        $count = 1;
                                    @endphp

                                    @foreach ($data_phim as $data_phims)
                                        <tr>
                                            <th class="text-center align-middle ">{{ $count++ }}</th>
                                            <td class="align-middle">{{ $data_phims->ten_phim }}</td>
                                            <td class="align-middle">{{ $data_phims->the_loai }}</td>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" src="{{ $data_phims->hinh_anh }}"
                                                    width="90px" height="90px" alt="">
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                {{ $data_phims->thoi_luong }}
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button class="btn btn-primary">Phim Đang Chiếu</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                {{-- <button class="btn btn-primary">Hiển Thị</button> --}}
                                                <button class="btn btn-warning">Tạm Tắt</button>
                                            </td>
                                            <td class="text-center align-middle">
                                                {{-- edit --}}
                                                <div class="d-inline">
                                                    <a href="/admin/phim/edit/{{ $data_phims->id }}">
                                                        <button class="btn btn-info"><i
                                                                class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>
                                                    {{-- delete --}}
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $data_phims->id }}" type="submit"
                                                        class="btn btn-danger"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @foreach ($data_phim as $data_phims)
                            <div class="modal fade" id="deleteModal{{ $data_phims->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phim</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                        <input type="hidden">
                                                        <div class="text-dark">Bạn có chắc chắn muốn xóa phim <b
                                                                class="text-danger">{{ $data_phims->ten_phim }}</b> không!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('phim.delete', $data_phims->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Cập Nhật Phim</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('edit', ['id' => $data_phims->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <label class="mb-2">Tên Phim</label>
                                                    <input value="{{ $data_phims->ten_phim }}" name="ten_phim"
                                                        type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Slug Phim</label>
                                                    <input name="slug_phim" type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Hình Ảnh</label>
                                                    <input name="hinh_anh" type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Tên Đạo Diễn</label>
                                                    <input name="dao_dien" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <label class="mb-2">Diễn Viên</label>
                                                    <input name="dien_vien" type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Thể Loại</label>
                                                    <input name="the_loai" type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Thời Lượng Chiếu</label>
                                                    <input name="thoi_luong" type="number" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Ngôn Ngữ</label>
                                                    <input name="ngon_ngu" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <label class="mb-2">Rated</label>
                                                    <input name="rated" type="text" class="form-control"
                                                        placeholder="Nhập vào Rated">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Link youtube</label>
                                                    <input name="trailer" type="text" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Thời Gian Bắt Đầu</label>
                                                    <input name="bat_dau" type="date" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">Thời Gian Kết Thúc</label>
                                                    <input name="ket_thuc" type="date" class="form-control">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-3">
                                                    <label class="mb-3">Tình Trạng</label>
                                                    <select name="trang_thai" class="form-control">
                                                        <option value="1">Hiển Thị Trang Chủ</option>
                                                        <option value="0">Không Hiển thị</option>
                                                    </select>
                                                </div>
                                                <div class="col-9">
                                                    <label class="mb-2">Mô Tả</label>
                                                    <textarea name="mo_ta" class="form-control" cols="30" rows="5" placeholder="Nhập vào mô tả phim"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatPhim()" type="button" class="btn btn-primary">Cập
                                            Nhật Phim</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
@section('js')
    <script>
        toastr.options ={
            "progressBar": true,
            "closeButton": true,
        }

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'SUCCESS');
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", 'Cập Nhật');
        @endif
    </script>
@endsection
