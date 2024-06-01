@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH PHÒNG CHIẾU</h6>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-3">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Thêm Mới Phòng Chiếu</h6>
            </div>
            <div class="card-body">
                <label class="mb-2">Tên Phòng Chiếu</label>
                <input id="ten_phong" type="text" class="form-control mb-2" placeholder="Nhập vào tên phòng">
                <label class="mb-2">Loại Máy Chiếu</label>
                <input id="loai_may_chieu" type="text" class="form-control mb-2" placeholder="Nhập vào loại máy chiếu">
                <label class="mb-2">Hàng Ngang</label>
                <input id="hang_ngang" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng ngang">
                <label class="mb-2">Hàng Dọc</label>
                <input id="hang_doc" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng dọc">
                <label class="mb-2">Tình Trạng</label>
                <select class="form-control mb-2" id="tinh_trang">
                    <option value="1">Đang Hoạt Động</option>
                    <option value="0">Dừng Hoạt Động</option>
                </select>
                <label class="mb-2">Loại Phòng</label>
                <select class="form-control mb-2" id="loai_phong">
                    <option value="Phòng 2D">Phòng 2D</option>
                    <option value="Phòng 3D">Phòng 3D</option>
                    <option value="Phòng IMAX">Phòng IMAX</option>
                </select>
            </div>
            <div class="card-footer text-end">
                <button id="addPhong" class="btn btn-primary">Thêm Mới Phòng</button>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="card border-danger border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Danh Sách Phòng Chiếu</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="danhSachPhong">
                        <thead>
                            <tr>
                                <th class="text-center align-middle text-nowrap">#</th>
                                <th class="text-center align-middle text-nowrap">Tên Phòng</th>
                                <th class="text-center align-middle text-nowrap">Máy Chiếu</th>
                                <th class="text-center align-middle text-nowrap">Loại Phòng</th>
                                <th class="text-center align-middle text-nowrap">Tình Trạng</th>
                                <th class="text-center align-middle text-nowrap">Hàng Ngang</th>
                                <th class="text-center align-middle text-nowrap">Hàng Dọc</th>
                                <th class="text-center align-middle text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Tạo Ghế Cho Phòng</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
										</div>
										<div class="ms-3">
                                            <input type="hidden" >
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark text-wrap">
                                                Bạn có muốn tạo hàng dọc không?!</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button id="taoGhe" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Tạo Ghế</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phim</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_xoa">
                                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark text-wrap">Bạn có chắc chắn muốn xóa phòng <b id="phong_xoa" class="text-danger">ABC</b> này không!</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button id="aDel" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Xóa</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Phòng Chiếu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <input type="hidden" id="edit_id" placeholder="ID ở đây">
                                <div class="modal-body">
                                    <label class="mb-2">Tên Phòng Chiếu</label>
                                    <input id="edit_ten_phong" type="text" class="form-control mb-2" placeholder="Nhập vào tên phòng">
                                    <label class="mb-2">Loại Máy Chiếu</label>
                                    <input id="edit_loai_may_chieu" type="text" class="form-control mb-2" placeholder="Nhập vào loại máy chiếu">
                                    <label class="mb-2">Hàng Ngang</label>
                                    <input id="edit_hang_ngang" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng ngang">
                                    <label class="mb-2">Hàng Dọc</label>
                                    <input id="edit_hang_doc" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng dọc">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select class="form-control mb-2" id="edit_tinh_trang">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                    <label class="mb-2">Loại Phòng</label>
                                    <select class="form-control mb-2" id="edit_loai_phong">
                                        <option value="Phòng 2D">Phòng 2D</option>
                                        <option value="Phòng 3D">Phòng 3D</option>
                                        <option value="Phòng IMAX">Phòng IMAX</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="aUpdate">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        loadData();

        $("#addPhong").click(function() {
            // 1. Tạo ra 1 object mà nó chứa toàn bộ thông tin mà client cung cấp
            var phongChieu      =   {
                'ten_phong'         :   $("#ten_phong").val(),
                'loai_may_chieu'    :   $("#loai_may_chieu").val(),
                'hang_ngang'        :   $("#hang_ngang").val(),
                'hang_doc'          :   $("#hang_doc").val(),
                'tinh_trang'        :   $("#tinh_trang").val(),
                'loai_phong'        :   $("#loai_phong").val(),
            };
            axios
                .post('{{ Route("phongChieuStore") }}', phongChieu)
                .then((res) => {
                    if(res.data.status == true) {
                        toastr.success(res.data.message, "Thông Báo!");
                        loadData();
                    }
                });
        });

        function loadData() {
            axios
                .post('{{ Route("phongChieuData") }}')
                .then((res) => {
                    var data     = res.data.data;
                    var noi_dung =  '';

                    $.each(data, function(k, v) {
                        noi_dung += '<tr>';
                        noi_dung += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                        noi_dung += '<td class="align-middle text-nowrap">'+ v.ten_phong +'</td>';
                        noi_dung += '<td class="align-middle text-nowrap text-center">'+ v.loai_may_chieu +'</td>';
                        noi_dung += '<td class="align-middle text-nowrap">'+ v.loai_phong +'</td>';
                        noi_dung += '<td class="text-center align-middle text-nowrap">';
                        if(v.tinh_trang) {
                            noi_dung += '<button class="status btn btn-primary" data-id="'+ v.id +'">Đang Hoạt Động</button>';
                        } else {
                            noi_dung += '<button class="status btn btn-warning" data-id="'+ v.id +'">Dừng Hoạt Động</button>';
                        }
                        noi_dung += '</td>';
                        noi_dung += '<td class="align-middle text-center">'+ v.hang_ngang +'</td>';
                        noi_dung += '<td class="align-middle text-center">'+ v.hang_doc +'</td>';
                        noi_dung += '<td class="text-center align-middle text-nowrap">';
                        noi_dung += '<button class="edit btn btn-info m-1"  data-id="'+ v.id +'" data-bs-toggle="modal" data-bs-target="#editModal">Cập Nhật</button>';
                        noi_dung += '<button class="del btn btn-danger m-1" data-id="'+ v.id +'" data-bs-toggle="modal" data-bs-target="#delModal">Xóa Bỏ</button>';
                        noi_dung += '<button class="create btn btn-warning m-1" data-id="'+ v.id +'" data-bs-toggle="modal" data-bs-target="#createModal">Tạo Ghế</button>';
                        noi_dung += '<a href="/admin/ghe-chieu/'+ v.id +'" class="btn btn-info">Ghế Chiếu</a>';
                        noi_dung += '</td>';
                        noi_dung += '</tr>';
                    });

                    $("#danhSachPhong tbody").html(noi_dung);
                });
        }

        $("body").on('click', '.status', function() {
            var id  = $(this).data('id');
            var payload     =   {
                'id'    :   id,
            };
            axios
                .post('{{ Route("phongStatus") }}', payload)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message, 'Success');
                        loadData();
                    } else {
                        toastr.error(res.data.message, 'Error');
                    }
                });
        });

        $("body").on('click', '.create', function() {
            var id  = $(this).data('id');
            var payload     =   {
                'id'    :   id,
            };

            axios
                .post('{{ Route("phongInfo") }}', payload)
                .then((res) => {
                    if(res.data.status) {
                        $("#id_phong_can_tao_ghe").val(res.data.data.id);
                        var tong_ghe  = res.data.data.hang_ngang * res.data.data.hang_doc;
                        $("#tong_ghe").text(tong_ghe);
                        $("#hang_ngang_a").text(res.data.data.hang_ngang);
                        $("#hang_doc_a").text(res.data.data.hang_doc);
                    } else {
                        toastr.error(res.data.message, 'Error');
                        setTimeout(() => {
                            $('#delModal').modal('hide');
                        }, 500);
                    }
                });
        });

        $("body").on('click', '.del', function() {
            var id  = $(this).data('id');
            var payload     =   {
                'id'    :   id,
            };
            axios
                .post('{{ Route("phongInfo") }}', payload)
                .then((res) => {
                    if(res.data.status) {
                        $("#phong_xoa").text(res.data.data.ten_phong);
                        $("#id_xoa").val(res.data.data.id);
                    } else {
                        toastr.error(res.data.message, 'Error');
                        setTimeout(() => {
                            $('#delModal').modal('hide');
                        }, 500);
                    }
                });
        });

        $("body").on('click', '#aDel', function() {
            var id = $("#id_xoa").val();
            var payload     =   {
                'id'    :   id,
            };
            axios
                .post('{{ Route("phongDel") }}', payload)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message, 'Success');
                        loadData();
                    } else {
                        toastr.error(res.data.message, 'Error');
                    }
                });
        });

        $("#taoGhe").click(function() {
            var id = $("#id_phong_can_tao_ghe").val();
            var payload     =   {
                'id'    :   id,
            };

            axios
                .post('{{ Route("gheChieuStore") }}', payload)
                .then((res) => {

                });
        });

        $("body").on('click', '.edit', function() {
            var id = $(this).data('id');
            var payload = {
                'id' : id,
            };

            axios
                .post('{{ Route('phongInfo') }}', payload)
                .then( (res) => {
                    if(res.data.status) {
                        // console.log(res.data.data);
                        $("#edit_id").val(res.data.data.id);
                        $("#edit_ten_phong").val(res.data.data.ten_phong);
                        $("#edit_loai_may_chieu").val(res.data.data.loai_may_chieu);
                        $("#edit_hang_ngang").val(res.data.data.hang_ngang);
                        $("#edit_hang_doc").val(res.data.data.hang_doc);
                        $("#edit_tinh_trang").val(res.data.data.tinh_trang);
                        $("#edit_loai_phong").val(res.data.data.loai_phong);
                    } else {
                        toastr.error(res.data.message, 'Error');
                        setTimeout(() => {
                            $('#delModal').modal('hide');
                        }, 500);
                    }
                });
        });

        $("#aUpdate").click(function() {
            var update_phong = {
                'id'                :   $("#edit_id").val(),
                'ten_phong'         :   $("#edit_ten_phong").val(),
                'loai_may_chieu'    :   $("#edit_loai_may_chieu").val(),
                'hang_ngang'        :   $("#edit_hang_ngang").val(),
                'hang_doc'          :   $("#edit_hang_doc").val(),
                'tinh_trang'        :   $("#edit_tinh_trang").val(),
                'loai_phong'        :   $("#edit_loai_phong").val(),
            };
            axios
                .post('{{Route("phongUpdate")}}', update_phong)
                .then( (res) => {
                    if (res.data.status == 1) {
                        toastr.success(res.data.message, 'Success');
                        $('#editModal').modal('hide');
                        loadData();
                    } else {
                        toastr.error(res.data.message, 'Error');
                        $('#editModal').modal('hide');
                    }
                });
        });


    });
</script>
@endsection
