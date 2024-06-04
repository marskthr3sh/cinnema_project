@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH DỊCH VỤ</h6>
        </div>
    </div>
    <hr />
    <div id="app" class="row">
        <div class="col-4">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header mt-2">
                    <h6>Thêm Mới Dịch Vụ</h6>
                </div>
                <form action="{{ route('postService') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <label class="mb-2">Tên Dịch Vụ</label>
                        <input name="ten_dich_vu" type="text" class="form-control mb-2"
                            placeholder="Nhập vào tên dịch vụ" required>

                        <label class="mb-2">Mô Tả</label>
                        <textarea name="mo_ta" cols="30" rows="5" class="form-control mb-2" required></textarea>

                        <label class="mb-2">Giá Bán</label>
                        <input name="gia_ban" type="number" class="form-control mb-2" placeholder="Nhập vào giá bán"
                            required>

                        <label class="mb-2">Hình Ảnh</label>
                        <input name="hinh_anh" type="text" class="form-control mb-2"placeholder="Nhập vào hình ảnh"
                            required>

                        <select name="id_don_vi" class="form-control mb-2">
                            @foreach ($options as $option)
                                <option>{{ $option->ten_don_vi }}</option>
                            @endforeach
                        </select>

                        </select>
                        <label class="mb-2">Tình Trạng</label>
                        <select name="tinh_trang" class="form-control mb-2">
                            <option value="1">Còn Kinh Doanh</option>
                            <option value="0">Dừng Kinh Doanh</option>
                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Thêm Dịch Vụ</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="col-8">
            <div class="card border-danger border-bottom border-3 border-0">
                <div class="card-header mt-2">
                    <h6>Danh Sách Dịch Vụ</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Dịch Vụ</th>
                                    <th class="text-center">Hình Ảnh</th>
                                    <th class="text-center">Đơn Giá</th>
                                    <th class="text-center">Đơn Vị</th>
                                    <th class="text-center">Mô Tả</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp

                                @if ($message = Session::get('success'))
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
                                @endif
                                @foreach ($services as $service)
                                    <tr>
                                        <th class="text-center align-middle">{{ $count++ }}</th>
                                        <td class="text-center align-middle">{{ $service->ten_dich_vu }}</td>
                                        <td class="text-center align-middle">
                                            <img src="{{ $service->hinh_anh }}" class="rounded-circle p-1 border"
                                                width="90px" height="90px">
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ number_format($service->gia_ban, 0, ',', '.') }} đ
                                        </td>
                                        <td class="text-center align-middle">
                                            {{ $service->id_don_vi }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <i data-bs-toggle="modal" data-bs-target="#detailModal{{ $service->id }}"
                                                class="text-success fa-solid fa-circle-info fa-2x"></i>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if ($service->tinh_trang == 1)
                                                <button class="btn btn-primary">Đang Kinh Doanh</button>
                                            @else
                                                <button class="btn btn-warning">Dừng Kinh Doanh</button>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <button data-bs-toggle="modal" data-bs-target="#editModal{{ $service->id }}"
                                                class="btn btn-info m-1">
                                                <i style="margin-right: 0px !important"
                                                    class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger m-1">
                                                <i data-bs-toggle="modal" data-bs-target="#deleteModal{{ $service->id }}"
                                                    style="margin-right: 0px !important" class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                </template>
                            </tbody>
                        </table>
                        {{-- edit --}}
                        @foreach ($services as $service)
                            <form action="{{ route('service.update', ['id' => $service->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal fade" id="editModal{{ $service->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Dịch Vụ</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <label class="mb-2">Tên Dịch Vụ</label>
                                                <input name="ten_dich_vu" value="{{ $service->ten_dich_vu }}"
                                                    type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào tên dịch vụ">

                                                <label class="mb-2">Mô Tả</label>
                                                <textarea name="mo_ta" cols="30" rows="5" class="form-control mb-2">{!! strip_tags($service->mo_ta) !!}</textarea>

                                                <label class="mb-2">Giá Bán</label>
                                                <input name="gia_ban" value="{{ $service->gia_ban }}" type="number"
                                                    class="form-control mb-2" placeholder="Nhập vào giá bán">

                                                <label class="mb-2">Hình Ảnh</label>
                                                <input name="hinh_anh" value="{{ $service->hinh_anh }}" type="text"
                                                    class="form-control mb-2" placeholder="Nhập vào hình ảnh">

                                                <label class="mb-2">Đơn Vị</label>
                                                <select name="id_don_vi" value="{{ $service->id_don_vi }}"
                                                    class="form-control mb-2">
                                                    @foreach ($options as $option)
                                                        <option>{{ $option->ten_don_vi }}</option>
                                                    @endforeach
                                                </select>

                                                <label class="mb-2">Tình Trạng</label>
                                                <select id="status-btn-{{ $service->id }}" name="tinh_trang" class="form-control mb-2">
                                                    <option value="1" {{ $service->tinh_trang == 1 ? 'selected' : '' }}>Còn Kinh Doanh</option>
                                                    <option value="0" {{ $service->tinh_trang == 0 ? 'selected' : '' }}>Dừng Kinh Doanh</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                        {{-- delete --}}
                        @foreach ($services as $service)
                            <div class="modal fade" id="deleteModal{{ $service->id }}" tabindex="-1"
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
                                                        <div class="text-dark"> Bạn có chắc chắn muốn xóa <b
                                                                class="text-danger">{{ $service->ten_dich_vu }}</b> không!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('service.delete', $service->id) }}" method="POST"
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
                        {{-- detail --}}
                        @foreach ($services as $service)
                            <div class="modal fade" id="detailModal{{ $service->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả Dịch Vụ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-wrap">
                                                {{ $service->mo_ta }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

