@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH PHÒNG CHIẾU</h6>
    </div>
</div>
<hr/>
<div class="row" id="app">
    <div class="col-3">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Thêm Mới Phòng Chiếu</h6>
            </div>
            <div class="card-body">
                <label class="mb-2">Tên Phòng Chiếu</label>
                <input v-model="them_moi.ten_phong" type="text" class="form-control mb-2" placeholder="Nhập vào tên phòng">
                <label class="mb-2">Loại Máy Chiếu</label>
                <input v-model="them_moi.loai_may_chieu" type="text" class="form-control mb-2" placeholder="Nhập vào loại máy chiếu">
                <label class="mb-2">Hàng Ngang</label>
                <input v-model="them_moi.hang_ngang" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng ngang">
                <label class="mb-2">Hàng Dọc</label>
                <input v-model="them_moi.hang_doc" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng dọc">
                <label class="mb-2">Tình Trạng</label>
                <select class="form-control mb-2" v-model="them_moi.tinh_trang">
                    <option value="1">Đang Hoạt Động</option>
                    <option value="0">Dừng Hoạt Động</option>
                </select>
                <label class="mb-2">Loại Phòng</label>
                <select class="form-control mb-2" v-model="them_moi.loai_phong">
                    <option value="Phòng 2D">Phòng 2D</option>
                    <option value="Phòng 3D">Phòng 3D</option>
                    <option value="Phòng IMAX">Phòng IMAX</option>
                </select>
            </div>
            <div class="card-footer text-end">
                <button v-on:click="themPhongChieu()" class="btn btn-primary">Thêm Mới Phòng</button>
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
                            <template v-for="(value, key) in list_phong_chieu">
                                <tr>
                                    <th class="text-center align-middle">@{{key + 1}}</th>
                                    <td class="align-middle text-nowrap">@{{value.ten_phong}}</td>
                                    <td class="align-middle text-nowrap text-center">@{{value.loai_may_chieu}}</td>
                                    <td class="align-middle text-nowrap">@{{value.loai_phong}}</td>
                                    <td class="text-center align-middle text-nowrap">
                                        <button v-on:click="status(value.id)" v-if="value.tinh_trang == 1" class="status btn btn-primary">Đang Hoạt Động</button>
                                        <button v-on:click="status(value.id)" v-else class="status btn btn-warning">Dừng Hoạt Động</button>
                                    </td>
                                    <td class="align-middle text-center">@{{value.hang_ngang}}</td>
                                    <td class="align-middle text-center">@{{value.hang_doc}}</td>
                                    <td class="text-center align-middle text-nowrap">
                                        <button class="edit btn btn-info m-1" v-on:click="edit = value"  data-bs-toggle="modal" data-bs-target="#editModal">Cập Nhật</button>
                                        <button class="del btn btn-danger m-1" v-on:click="del = value" data-bs-toggle="modal" data-bs-target="#delModal">Xóa Bỏ</button>
                                        <button class="create btn btn-warning m-1" v-on:click="create = value" data-bs-toggle="modal" data-bs-target="#createModal">Tạo Ghế</button>
                                        <a target="_blank" v-bind:href="'/admin/ghe-chieu/' + value.id" class="btn btn-info">Ghế Chiếu</a>
                                    </td>
                                </tr>
                            </template>
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
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark text-wrap">
                                                Bạn có muốn tạo <b class="text-danger">@{{create.hang_ngang * create.hang_doc}}</b> ghế. <br> Bao gồm <b class="text-danger">@{{create.hang_ngang}}</b> hàng ngang và <b class="text-danger">@{{create.hang_doc}}</b> hàng dọc không?!</div>
										</div>
									</div>
								</div>
                                <input type="text" class="form-control" v-model="gia_mac_dinh">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button v-on:click="taoGhe()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Tạo Ghế</button>
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
                                <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
									<div class="d-flex align-items-center">
										<div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
										</div>
										<div class="ms-3">
											<h6 class="mb-0 text-dark">Warning Alerts</h6>
											<div class="text-dark text-wrap">Bạn có chắc chắn muốn xóa phòng <b class="text-danger">@{{del.ten_phong}}</b> này không!</div>
										</div>
									</div>
								</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                              <button v-on:click="aDel()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận Xóa</button>
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
                                <div class="modal-body">
                                    <label class="mb-2">Tên Phòng Chiếu</label>
                                    <input v-model="edit.ten_phong" type="text" class="form-control mb-2" placeholder="Nhập vào tên phòng">
                                    <label class="mb-2">Loại Máy Chiếu</label>
                                    <input v-model="edit.loai_may_chieu" type="text" class="form-control mb-2" placeholder="Nhập vào loại máy chiếu">
                                    <label class="mb-2">Hàng Ngang</label>
                                    <input v-model="edit.hang_ngang" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng ngang">
                                    <label class="mb-2">Hàng Dọc</label>
                                    <input v-model="edit.hang_doc" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng dọc">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select class="form-control mb-2" v-model="edit.tinh_trang">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                    <label class="mb-2">Loại Phòng</label>
                                    <select class="form-control mb-2" v-model="edit.loai_phong">
                                        <option value="Phòng 2D">Phòng 2D</option>
                                        <option value="Phòng 3D">Phòng 3D</option>
                                        <option value="Phòng IMAX">Phòng IMAX</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" v-on:click="aUpdate()">Save changes</button>
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
                them_moi        : {'tinh_trang' : 1, 'loai_phong' : 'Phòng 2D'},
                list_phong_chieu: [],
                edit            : {},
                del             : {},
                create          : {},
                gia_mac_dinh    : 0,
            },
            created()   {
                this.loadData();
            },
            methods :   {
                themPhongChieu() {
                    axios
                        .post('{{ Route("phongChieuStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.them_moi = {'tinh_trang' : 1, 'loai_phong' : 'Phòng 2D'},
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                loadData() {
                    axios
                        .post('{{ Route("phongChieuData") }}')
                        .then((res) => {
                            this.list_phong_chieu   = res.data.data;
                        });
                },
                taoGhe() {
                    this.create.gia_mac_dinh    =   this.gia_mac_dinh;
                    axios
                        .post('{{ Route("gheChieuStore") }}', this.create)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                aDel() {
                    var payload     =   {
                        'id'    :   this.del.id,
                    };
                    axios
                        .post('{{ Route("phongDel") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                aUpdate() {
                    axios
                    .post('{{Route("phongUpdate")}}', this.edit)
                    .then( (res) => {
                        if (res.data.status == 1) {
                            toastr.success(res.data.message, 'Success');
                            $('#editModal').modal('hide');
                            this.loadData();
                        } else {
                            toastr.error(res.data.message, 'Error');
                            $('#editModal').modal('hide');
                        }
                    });
                },
                status(id) {
                    var payload     =   {
                        'id'    :   id,
                    };
                    axios
                        .post('{{ Route("phongStatus") }}', payload)
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
