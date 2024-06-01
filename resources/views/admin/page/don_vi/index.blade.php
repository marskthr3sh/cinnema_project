@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH ĐƠN VỊ</h6>
    </div>
</div>
<hr/>
<div class="row" id="app">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Thêm mới đơn vị
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label>Tên đơn vị</label>
                    <input class="form-control" type="text" v-model="them_moi.ten_don_vi">
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" v-on:click="themDonVi()">Thêm Mới</button>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Danh Sách Đơn Vị
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Đơn Vị</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_don_vi">
                                <tr>
                                    <td class="text-center align-middle">@{{key + 1}}</td>
                                    <td class="align-middle">@{{value.ten_don_vi}}</th>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info m-1" v-on:click="tt_cap_nhat = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i v-on:click="tt_cap_nhat = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal" style="margin-right: 0px !important" class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-danger m-1" v-on:click="tt_xoa = value" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i v-on:click="tt_xoa = value" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-right: 0px !important" class="fa-solid fa-trash"></i>
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
                                                <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa <b>@{{tt_xoa.ten_don_vi}}</b> này không?</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button v-on:click="xoaDonVi()" type="button" class="btn btn-primary"
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
                                        <div class="mb-2">
                                            <label class="mb-2">Tên đơn vị</label>
                                            <input class="form-control" type="text" v-model="tt_cap_nhat.ten_don_vi" mb-2>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button v-on:click="capNhatDonVi()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
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
        $(document).ready(function() {
            new Vue({
                el      :   '#app',
                data    :   {
                    them_moi    : {},
                    list_don_vi : [],
                    tt_xoa      : {},
                    tt_cap_nhat : {},
                },
                created()   {
                    this.loadData();
                },
                methods :   {
                    themDonVi() {
                        axios
                            .post('{{ Route("donViStore") }}', this.them_moi)
                            .then((res) => {
                                if(res.data.status) {
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
                            .post('{{ Route("donViData") }}')
                            .then((res) => {
                                this.list_don_vi   = res.data.data;
                            });
                    },
                    xoaDonVi() {
                        axios
                            .post('{{ Route("donViDel") }}', this.tt_xoa)
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
                    capNhatDonVi() {
                        axios
                            .post('{{ Route("donViUpdate") }}', this.tt_cap_nhat)
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
                },
            });
        });
    </script>
@endsection
