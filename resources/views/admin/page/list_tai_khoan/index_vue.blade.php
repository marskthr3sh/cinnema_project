@extends('admin.share.master')
@section('noi_dung')
<div id="app">
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
                                    <input v-model="them_moi.email" type="email" class="form-control mb-2"
                                        placeholder="Nhập vào Email">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Mật Khẩu</label>
                                    <input v-model="them_moi.password" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào mật khẩu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Họ Và Tên</label>
                                    <input v-model="them_moi.ho_va_ten" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào họ và tên">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Số Điện Thoại</label>
                                    <input v-model="them_moi.so_dien_thoai" type="tel" class="form-control mb-2"
                                        placeholder="Nhập vào số điện thoại">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Ngày Sinh</label>
                                    <input v-model="them_moi.ngay_sinh" type="date" class="form-control mb-2"
                                        placeholder="Nhập vào ngày sinh">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Địa chỉ</label>
                                    <textarea v-model="them_moi.dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Is Block</label>
                                    <select class="form-control mb-2" v-model="them_moi.is_block">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select class="form-control mb-2" v-model="them_moi.tinh_trang">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" v-on:click="themTaiKhoan()">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
x`
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
                                    <template v-for="(value, key) in list_tai_khoan">
                                        <tr class="align-middle">
                                            <td class="text-center"> @{{key + 1}}</td>
                                            <td > @{{value.ho_va_ten}} </td>
                                            <td > @{{value.email}} </td>
                                            <td class="text-center"> @{{value.so_dien_thoai}} </td>
                                            <td class="text-center">
                                                <button v-on:click="doiTrangThaiBlock(value)" v-if="value.is_block == 0" class="block btn btn-warning" style="width: 150px">Chưa Kích Hoạt</button>
                                                <button v-on:click="doiTrangThaiBlock(value)" v-else class="block btn btn-primary" style="width: 150px">Đã Kích Hoạt</button>
                                            </td>
                                            <td class="text-center">
                                                <button v-on:click="doiTrangThai(value)" v-if="value.tinh_trang == 0" class="status btn btn-danger">Chưa Hoạt Động</button>
                                                <button v-on:click="doiTrangThai(value)" v-else class="status btn btn-primary">Đang Hoạt Động</button>
                                            </td>
                                            <td class="text-center">
                                                <button v-on:click="tt_cap_nhat = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal" type="button"class="edit btn btn-info">Cập Nhật</button>
                                                <button v-on:click="tt_xoa = value" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button"class="del btn btn-danger" style="margin-left: 10px">Xóa Bỏ</button>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
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
                                                    <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa <b>@{{tt_xoa.ho_va_ten}}</b> này không?</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button v-on:click="xoaTaiKhoan()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT TÀI KHOẢN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Email</label>
                                                <input v-model="tt_cap_nhat.email" type="email" class="form-control mb-2"
                                                    placeholder="Nhập vào Email">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Mật Khẩu</label>
                                                <input v-model="tt_cap_nhat.password" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào mật khẩu">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Họ Và Tên</label>
                                                <input v-model="tt_cap_nhat.ho_va_ten" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào họ và tên">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Số Điện Thoại</label>
                                                <input v-model="tt_cap_nhat.so_dien_thoai" type="tel" class="form-control mb-2"
                                                    placeholder="Nhập vào số điện thoại">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Ngày Sinh</label>
                                                <input v-model="tt_cap_nhat.ngay_sinh" type="date" class="form-control mb-2"
                                                    placeholder="Nhập vào ngày sinh">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Địa chỉ</label>
                                                <textarea v-model="tt_cap_nhat.dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Is Block</label>
                                                <select class="form-control mb-2" v-model="tt_cap_nhat.is_block">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select class="form-control mb-2" v-model="tt_cap_nhat.tinh_trang">
                                                    <option value="1">Đang Hoạt Động</option>
                                                    <option value="0">Dừng Hoạt Động</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatTaiKhoan()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
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
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        new Vue({
            el      :       '#app',
            data    :       {
                them_moi        :       {'is_block' : 1, 'tinh_trang' : 1},
                list_tai_khoan  :       [],
                tt_xoa          :       {},
                tt_cap_nhat     :       {},
            },
            created()       {
                this.loadData();
            },
            methods:        {
                themTaiKhoan() {
                    axios
                        .post('{{ Route("taiKhoanStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                $('#themAccModal').modal('hide');
                                this.them_moi   = {'is_block' : 1, 'tinh_trang' : 1},
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                loadData() {
                    axios
                        .post('{{ Route("taiKhoanData") }}')
                        .then((res) => {
                            this.list_tai_khoan   = res.data.xxx;
                        });
                },
                xoaTaiKhoan() {
                    axios
                        .post('{{ Route("taiKhoanDel") }}', this.tt_xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#deleteModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                capNhatTaiKhoan() {
                    axios
                        .post('{{ Route("taiKhoanUpdate") }}', this.tt_cap_nhat)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                                $('#editModal').modal('hide');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                doiTrangThaiBlock(payload) {
                    axios
                        .post('{{ Route("taiKhoanBlock") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('{{ Route("taiKhoanStatus") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
            },
        });
    });
</script>
@endsection
