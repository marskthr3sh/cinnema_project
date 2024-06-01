@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH SINH VIÊN</h6>
        </div>
    </div>
    <hr />
    <div class="row" id="app">
        <div class="col-4">
            <div class="card">
                <div class="card-header"> <br>
                    <H6>Thêm mới sinh viên</H6>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label>Tên Sinh Viên</label>
                        <input class="form-control" type="text" v-model="them_moi.ten_sv"
                            placeholder="Nhập vào tên sinh viên">
                    </div>
                    <div class="mb-2">
                        <label>Mã Sinh Viên</label>
                        <input class="form-control" type="number" v-model="them_moi.ma_sv"
                            placeholder="Nhập vào mã sinh viên">
                    </div>
                    <label class="mb-2">Giới Tính</label>
                    <select class="form-control mb-2" v-model="them_moi.gioi_tinh">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                    <div class="mb-2">
                        <label>Quê Quán</label>
                        <input class="form-control" type="text" v-model="them_moi.que_quan"
                            placeholder="Nhập vào quê quán">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" v-on:click="themMoi()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header"> <br>
                    <h6> Danh Sách Sinh Viên </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Sinh Viên</th>
                                    <th class="text-center">Mã Sinh Viên</th>
                                    <th class="text-center">Giới Tính</th>
                                    <th class="text-center">Quê Quán</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_sinh_vien">
                                    <tr>
                                        <td class="text-center align-middle">@{{ key + 1 }}</td>
                                        <td class="text-center align-middle">@{{ value.ten_sv }}</td>
                                        <td class="text-center align-middle">@{{ value.ma_sv }}</td>
                                        <td class="text-center align-middle">@{{ value.gioi_tinh }}</td>
                                        <td class="text-center align-middle">@{{ value.que_quan }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-info m-1" v-on:click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i v-on:click="edit = Object.assign({}, value)" data-bs-toggle="modal" data-bs-target="#editModal" style="margin-right: 0px !important" class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-danger m-1" v-on:click="del   = value" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i v-on:click="del   = value" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-right: 0px !important" class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa </h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-white border-0 bg-white alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark text-wrap">Bạn có chắc chắn muốn xóa  <b class="text-danger">@{{del.ten_sv}}</b> này không!</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Đóng</button>
                                <button v-on:click="delsv()" type="button" class="btn btn-primary"
                                    data-bs-dismiss="modal">Xác Nhận Xóa</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Sinh Viên</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label class="mb-2">Tên Sinh Viên</label>
                                    <input v-model="edit.ten_sv" type="text" class="form-control mb-2" >

                                    <label class="mb-2">Mã Sinh Viên</label>
                                    <input v-model="edit.ma_sv" type="text" class="form-control mb-2" >

                                    <label class="mb-2">Giới Tính</label>
                                    <select class="form-control mb-2" v-model="edit.gioi_tinh">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                    <label class="mb-2">Quê Quán</label>
                                    <input v-model="edit.que_quan" type="text" class="form-control mb-2" >
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" v-on:click="aUpdate()">Lưu</button>
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
                    list_sinh_vien: [],
                    edit: {},
                    del: {},
                },
                created() {
                    this.loadData();
                },


                methods: {
                    themMoi() {
                        axios
                            .post('{{ Route('sinhVienStore') }}', this.them_moi)
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
                            .post('{{ Route('sinhVienData') }}')
                            .then((res) => {
                                this.list_sinh_vien = res.data.bbb;
                            });
                    },
                    delsv() {
                        axios
                            .post('{{ Route("sinhVienDel") }}', this.del)
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
                    aUpdate() {
                        axios
                            .post('{{ Route("sinhVienUpdate") }}', this.edit)
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
