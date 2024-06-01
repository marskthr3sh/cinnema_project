@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH TÀI KHOẢN</h6>
        </div>
        {{-- Nút Thêm Acc --}}
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themAccModal" type="button" class="btn btn-primary">Tài Khoản
                Mới</button>
            <div class="modal fade" id="themAccModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản Mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Email</label>
                                    <input id="email" type="email" class="form-control mb-2"
                                        placeholder="Nhập vào Email">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Mật Khẩu</label>
                                    <input id="password" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào mật khẩu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Họ Và Tên</label>
                                    <input id="ho_va_ten" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào họ và tên">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Số Điện Thoại</label>
                                    <input id="so_dien_thoai" type="tel" class="form-control mb-2"
                                        placeholder="Nhập vào số điện thoại">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Ngày Sinh</label>
                                    <input id="ngay_sinh" type="date" class="form-control mb-2"
                                        placeholder="Nhập vào ngày sinh">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Địa chỉ</label>
                                    <textarea id="dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Is Block</label>
                                    <select class="form-control mb-2" id="is_block">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select class="form-control mb-2" id="tinh_trang">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="themTaiKhoan">Save changes</button>
                        </div>
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
                            <table id="tableA" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Họ Và Tên</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Số Điện Thoại</th>
                                        <th class="text-center">Is Block</th>
                                        <th class="text-center">Tình Trạng</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="delAccModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id_xoa">
                                        <div
                                            class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                    <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa <b
                                                            id="tk_xoa">XXX</b> này không?</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button id="aDel" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editAccModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT TÀI KHOẢN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <input id="e_id" type="hidden" class="form-control mb-2">
                                            <div class="col">
                                                <label class="mb-2">Email</label>
                                                <input id="e_email" type="email" class="form-control mb-2"
                                                    placeholder="Nhập vào Email">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Mật Khẩu</label>
                                                <input id="e_password" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào mật khẩu">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Họ Và Tên</label>
                                                <input id="e_ho_va_ten" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào họ và tên">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Số Điện Thoại</label>
                                                <input id="e_so_dien_thoai" type="tel" class="form-control mb-2"
                                                    placeholder="Nhập vào số điện thoại">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Ngày Sinh</label>
                                                <input id="e_ngay_sinh" type="date" class="form-control mb-2"
                                                    placeholder="Nhập vào ngày sinh">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Địa chỉ</label>
                                                <textarea id="e_dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Is Block</label>
                                                <select class="form-control mb-2" id="e_is_block">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select class="form-control mb-2" id="e_tinh_trang">
                                                    <option value="1">Đang Hoạt Động</option>
                                                    <option value="0">Dừng Hoạt Động</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button id="aUpdate" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                                            changes</button>
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
    $("#themTaiKhoan").click(function() {
        var tai_khoan    =   {
            'email'         : $("#email").val(),
            'password'      : $("#password").val(),
            'so_dien_thoai' : $("#so_dien_thoai").val(),
            'ngay_sinh'     : $("#ngay_sinh").val(),
            'dia_chi'       : $("#dia_chi").val(),
            'ho_va_ten'     : $("#ho_va_ten").val(),
            'is_block'      : $("#is_block").val(),
            'tinh_trang'    : $("#tinh_trang").val(),
        };
        // axios => chỉ gửi được object
        axios
            .post("{{ Route('taiKhoanStore') }}", tai_khoan)
            .then((res) => {
                if(res.data.status == true) {
                    toastr.success(res.data.message);
                    $('#themAccModal').modal('hide');
                    loadData();
                }
            });
    });

    loadData();

    function loadData()
    {
        axios
            .post('{{ Route("taiKhoanData") }}')
            .then((res) => {
                var data = res.data.xxx;
                var noi_dung = '';
                $.each(data, function(k, v) {
                    noi_dung +='<tr class="align-middle">';
                    noi_dung +='<td class="text-center">'+ (k + 1) +'</td>';
                    noi_dung +='<td >'+ v.ho_va_ten +'</td>';
                    noi_dung +='<td >'+ v.email +'</td>';
                    noi_dung +='<td class="text-center">'+ v.so_dien_thoai +'</td>';
                    noi_dung +='<td class="text-center">';
                    if (v.is_block == 0) {
                        noi_dung +='<button  data-id="'+ v.id +'" class="block btn btn-warning" style="width: 150px">Chưa Kích Hoạt</button>';
                    } else {
                        noi_dung +='<button  data-id="'+ v.id +'" class="block btn btn-primary" style="width: 150px">Đã Kích Hoạt</button>';
                    }
                    noi_dung +='</td>';
                    noi_dung +='<td class="text-center">';
                    if (v.tinh_trang == 0) {
                        noi_dung +='<button  data-id="'+ v.id +'" class="status btn btn-danger">Chưa Hoạt Động</button>';
                    } else {
                        noi_dung +='<button  data-id="'+ v.id +'" class="status btn btn-primary">Đang Hoạt Động</button>';
                    }
                    noi_dung +='</td>';
                    noi_dung +='<td class="text-center">';
                    noi_dung +='<button data-id="'+ v.id +'" data-bs-toggle="modal" data-bs-target="#editAccModal" type="button"class="edit btn btn-info">Cập Nhật</button>';
                    noi_dung +='<button data-id="'+ v.id +'" data-bs-toggle="modal" data-bs-target="#delAccModal" type="button"class="del btn btn-danger" style="margin-left: 10px">Xóa Bỏ</button>';
                    noi_dung +='</td>';
                });
                $("#tableA tbody").html(noi_dung);
            });
    }

    $("body").on('click', '.status', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("taiKhoanStatus") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    toastr.success(res.data.message, 'Success');
                    loadData();
                } else {
                    toastr.error(res.data.message, 'Error');
                }
            });
    });

    $("body").on('click', '.block', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("taiKhoanBlock") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    toastr.success(res.data.message, 'Success');
                    loadData();
                } else {
                    toastr.error(res.data.message, 'Error');
                }
            });
    });

    $("body").on('click', '.del', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("taiKhoanInfo") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    $("#tk_xoa").text(res.data.data.ho_va_ten);
                    $("#id_xoa").val(res.data.data.id);
                } else {
                    toastr.error(res.data.message, 'Error');
                    setTimeout(() => {
                        $('#delModal').modal('hide');
                    }, 500);
                }
            });
    });

    $("body").on('click', '.edit', function() {
        var id  = $(this).data('id');
        var payload     =   {
            'id'    :   id,
        };
        axios
            .post('{{ Route("taiKhoanInfo") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    $("#e_id").val(res.data.data.id);
                    $('#e_email').val(res.data.data.email);
                    $('#e_password').val(res.data.data.password);
                    $('#e_so_dien_thoai').val(res.data.data.so_dien_thoai);
                    $('#e_ngay_sinh').val(res.data.data.ngay_sinh);
                    $('#e_dia_chi').val(res.data.data.dia_chi);
                    $('#e_ho_va_ten').val(res.data.data.ho_va_ten);
                    $('#e_is_block').val(res.data.data.is_block);
                    $('#e_tinh_trang').val(res.data.data.tinh_trang);
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
            .post('{{ Route("taiKhoanDel") }}', payload)
            .then((res) => {
                if(res.data.status) {
                    toastr.success(res.data.message, 'Success');
                    loadData();
                } else {
                    toastr.error(res.data.message, 'Error');
                }
            });
    });

    $("#aUpdate").click(function() {
        var new_phim    =   {
            'id'            : $("#e_id").val(),
            'email'         : $("#e_email").val(),
            'password'      : $("#e_password").val(),
            'so_dien_thoai' : $("#e_so_dien_thoai").val(),
            'ngay_sinh'     : $("#e_ngay_sinh").val(),
            'dia_chi'       : $("#e_dia_chi").val(),
            'ho_va_ten'     : $("#e_ho_va_ten").val(),
            'is_block'      : $("#e_is_block").val(),
            'tinh_trang'    : $("#e_tinh_trang").val(),
        };
        // axios => chỉ gửi được object
        axios
            .post("{{ Route('taiKhoanUpdate') }}", new_phim)
            .then((res) => {
                if(res.data.status == true) {
                    toastr.success(res.data.message);
                    $('#editAccModal').modal('hide');
                    loadData();
                } else {
                    toastr.error(res.data.message);
                }
            });
    });
</script>
@endsection
