@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h2 class="mb-0 text-uppercase">Lịch Khám</h2>
        </div>
    </div>
    <hr>
    <div class="row" id="app">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <H5>Thêm mới Lịch Khám</H5>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label>Họ và Tên</label>
                        <input class="form-control" type="text" v-model="them_moi.ho_ten" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-2">
                        <label>Ngày Sinh</label>
                        <input class="form-control" type="date" v-model="them_moi.ngay_sinh">
                    </div>
                    <label class="mb-2">Giới Tính</label>
                    <select class="form-control mb-2" v-model="them_moi.gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="LGBT">LGBT</option>
                    </select>

                    <div class="mb-2">
                        <label>CCCD/CMND</label>
                        <input class="form-control" type="number" v-model="them_moi.cccd" placeholder="Nhập CCCD/CMND">
                    </div>

                    <div class="mb-2">
                        <label>Địa Chỉ</label>
                        <input class="form-control" type="text" v-model="them_moi.dia_chi" placeholder="Nhập địa chỉ">
                    </div>

                    <div class="mb-2">
                        <label>Yêu Cầu Khám</label>
                        <input class="form-control" type="text" v-model="them_moi.yeu_cau_kham"
                            placeholder="Nhập yêu cầu khám">
                    </div>

                    <label class="mb-2">Khung Giờ Đăng Ký</label>
                    <select class="form-control mb-2" v-model="them_moi.khung_gio">
                        <option value="7:00">7:00</option>
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" v-on:click="themLichKham()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <H5 class="text-center">Danh Sách Lịch Khám</H5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ Và Tên</th>
                                    <th class="text-center">Ngày Sinh</th>
                                    <th class="text-center">Giới Tính</th>
                                    {{-- <th class="text-center">Số Điện Thoại</th> --}}
                                    <th class="text-center">CCCD/CMND</th>
                                    <th class="text-center">Địa Chỉ</th>
                                    <th class="text-center">Yêu Cầu Khám</th>
                                    <th class="text-center">Khung Giờ Đăng Ký</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_lich_kham">
                                    <tr>
                                        <td class="text-center align-middle">@{{ key + 1 }}</td>
                                        <td class="text-center align-middle">@{{ value.ho_ten }}</td>
                                        <td class="text-center align-middle">@{{ value.ngay_sinh }}</td>
                                        <td class="text-center align-middle">@{{ value.gioi_tinh }}</td>
                                        <td class="text-center align-middle">@{{ value.cccd }}</td>
                                        <td class="text-center align-middle">@{{ value.dia_chi }}</td>
                                        <td class="text-center align-middle">@{{ value.yeu_cau_kham }}</td>
                                        <td class="text-center align-middle">@{{ value.khung_gio }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info m-1"
                                                v-on:click="tt_cap_nhat = Object.assign({}, value)" data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                <i v-on:click="tt_cap_nhat = Object.assign({}, value)"
                                                    data-bs-toggle="modal" data-bs-target="#editModal"
                                                    style="margin-right: 0px !important"
                                                    class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger m-1" v-on:click="tt_xoa  = value"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i v-on:click="tt_xoa   = value" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" style="margin-right: 0px !important"
                                                    class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-white border-0 bg-white alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                    <div class="text-dark text-wrap">Bạn có chắc chắn muốn xóa <b
                                                            class="text-danger">@{{ tt_xoa.ho_ten }}</b> này không!
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button v-on:click="aDel()" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Lịch khám</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label class="mb-2">Họ và Tên</label>
                                        <input v-model="tt_cap_nhat.ho_ten" type="text" class="form-control mb-2">

                                        <label class="mb-2">Ngày Sinh</label>
                                        <input v-model="tt_cap_nhat.ngay_sinh" type="date" class="form-control mb-2">

                                        <label class="mb-2">Giới Tính</label>
                                        <select class="form-control mb-2" v-model="tt_cap_nhat.gioi_tinh">
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                            <option value="Khác">Khác</option>
                                        </select>

                                        <label class="mb-2">CCCD/CMND</label>
                                        <input v-model="tt_cap_nhat.cccd" type="text" class="form-control mb-2">

                                        <label class="mb-2">Địa Chỉ</label>
                                        <input v-model="tt_cap_nhat.dia_chi" type="text" class="form-control mb-2">

                                        <label class="mb-2">Yêu Cầu Khám</label>
                                        <input v-model="tt_cap_nhat.yeu_cau_kham" type="text"
                                            class="form-control mb-2">

                                        <label class="mb-2">Khung Giờ Đăng Ký</label>
                                        <select class="form-control mb-2" v-model="tt_cap_nhat.khung_gio">
                                            <option value="7:00">7:00</option>
                                            <option value="8:00">8:00</option>
                                            <option value="9:00">9:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                        </select>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary"
                                            v-on:click="aUpdate()">Lưu</button>
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
                el: '#app',
                data: {
                    them_moi: {},
                    list_lich_kham: [],
                    tt_xoa: {},
                    tt_cap_nhat: {},
                },
                created() {
                    this.loadData();
                },

                methods: {
                    themLichKham() {
                        axios
                            .post('{{ Route('lichKhamStore') }}', this.them_moi)
                            .then((res) => {
                                // console.log(res);
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.them_moi = {};
                                    this.loadData();
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            });
                    },


                    loadData() {
                        axios
                            .post('{{ Route('lichKhamData') }}')
                            .then((res) => {
                                this.list_lich_kham = res.data.bbb;
                            });
                    },

                    aDel() {
                        axios
                            .post('{{ Route('lichKhamDel') }}', this.tt_xoa)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.loadData();
                                    $('#deleteModal').modal('hide');
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            });
                    },
                    aUpdate() {
                        axios
                            .post('{{ Route('lichKhamUpdate') }}', this.tt_cap_nhat)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.loadData();
                                    $('#editModal').modal('hide');
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
