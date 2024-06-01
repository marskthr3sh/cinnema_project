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
                <div class="card-body">
                    <label class="mb-2">Tên Dịch Vụ</label>
                    <input v-model="them_moi.ten_dich_vu" type="text" class="form-control mb-2"
                        placeholder="Nhập vào tên dịch vụ">
                    <label class="mb-2">Mô Tả</label>
                    <textarea v-model="them_moi.mo_ta" cols="30" rows="5" class="form-control mb-2"></textarea>
                    <label class="mb-2">Giá Bán</label>
                    <input v-model="them_moi.gia_ban" type="number" class="form-control mb-2"
                        placeholder="Nhập vào giá bán">
                    <label class="mb-2">Hình Ảnh</label>
                    <input v-model="them_moi.hinh_anh" type="text" class="form-control mb-2"
                        placeholder="Nhập vào hình ảnh">
                    <label class="mb-2">Đơn Vị</label>
                    <select v-model="them_moi.id_don_vi" class="form-control mb-2">
                        @foreach ($don_vi as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->ten_don_vi }}</option>
                        @endforeach
                    </select>
                    <label class="mb-2">Tình Trạng</label>
                    <select v-model="them_moi.tinh_trang" class="form-control mb-2">
                        <option value="1">Còn Kinh Doanh</option>
                        <option value="0">Dừng Kinh Doanh</option>
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="themDichVu()" class="btn btn-primary">Thêm Dịch Vụ</button>
                </div>
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
                                <template v-for="(v, k) in list_dich_vu">
                                    <tr>
                                        <th class="text-center align-middle">@{{ k + 1 }}</th>
                                        <td class="align-middle">@{{ v.ten_dich_vu }}</td>
                                        <td class="align-middle text-center">
                                            <img v-bind:src="v.hinh_anh" class="rounded-circle p-1 border" width="90px"
                                                height="90px">
                                        </td>
                                        <td class="align-middle text-end">
                                            @{{ format(v.gia_ban) }}
                                        </td>
                                        <td class="align-middle text-end">
                                            @{{ v.id_don_vi }}
                                        </td>
                                        <td class="text-center align-middle">
                                            <i v-on:click="tt_xoa = v" data-bs-toggle="modal" data-bs-target="#detailModal"
                                                class="text-success fa-solid fa-circle-info fa-2x"></i>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button v-on:click="doiTrangThai(v)" v-if="v.tinh_trang"
                                                class="btn btn-primary">Đang Kinh Doanh</button>
                                            <button v-on:click="doiTrangThai(v)" v-else class="btn btn-warning">Dừng Kinh
                                                Doanh</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            {{-- tt_cap_nhat = v     => Object.assign({}, v) --}}
                                            <button v-on:click="tt_cap_nhat = Object.assign({}, v)" data-bs-toggle="modal"
                                                data-bs-target="#editModal" class="btn btn-info m-1">
                                                <i style="margin-right: 0px !important"
                                                    class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button v-on:click="tt_xoa = v" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" class="btn btn-danger m-1">
                                                <i data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    style="margin-right: 0px !important" class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Dịch Vụ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input v-model="tt_cap_nhat.id" type="hidden" class="form-control mb-2">
                                        <label class="mb-2">Tên Dịch Vụ</label>
                                        <input v-model="tt_cap_nhat.ten_dich_vu" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào tên dịch vụ">
                                        <label class="mb-2">Mô Tả</label>
                                        <textarea v-model="tt_cap_nhat.mo_ta" cols="30" rows="5" class="form-control mb-2"></textarea>
                                        <label class="mb-2">Giá Bán</label>
                                        <input v-model="tt_cap_nhat.gia_ban" type="number" class="form-control mb-2"
                                            placeholder="Nhập vào giá bán">
                                        <label class="mb-2">Hình Ảnh</label>
                                        <input v-model="tt_cap_nhat.hinh_anh" type="text" class="form-control mb-2"
                                            placeholder="Nhập vào hình ảnh">
                                        <label class="mb-2">Đơn Vị</label>
                                        <select v-model="tt_cap_nhat.id_don_vi" class="form-control mb-2">
                                            @foreach ($don_vi as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->ten_don_vi }}</option>
                                            @endforeach
                                        </select>
                                        <label class="mb-2">Tình Trạng</label>
                                        <select v-model="tt_cap_nhat.tinh_trang" class="form-control mb-2">
                                            <option value="1">Còn Kinh Doanh</option>
                                            <option value="0">Dừng Kinh Doanh</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="capNhatDichVu()" type="button" class="btn btn-primary">Cập
                                            Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Dịch Vụ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div
                                            class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-warning"><i class='bx bx-info-circle'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-warning">Cảnh Báo</h6>
                                                    <p class="text-wrap">Bạn có chắc muốn xóa dịch vụ
                                                        <span class="text-danger"><b>"@{{ tt_xoa.ten_dich_vu }}"</b></span>
                                                        với giá
                                                        <span class="text-danger"><b>"@{{ format(tt_xoa.gia_ban) }}" này
                                                                không?!</b></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button v-on:click="xoaDichVu()" type="button" class="btn btn-danger">Xóa Dịch
                                            Vụ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả Dịch Vụ</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-wrap">
                                            @{{ tt_xoa.mo_ta }}
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
                    list_dich_vu: [],
                    tt_xoa: {},
                    tt_cap_nhat: {},
                },
                created() {
                    this.loadData();
                },
                methods: {
                    themDichVu() {
                        axios
                            .post('{{ Route('dichVuStore') }}', this.them_moi)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.loadData();
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            });
                    },
                    loadData() {
                        axios
                            .post('{{ Route('dichVuData') }}')
                            .then((res) => {
                                this.list_dich_vu = res.data.data;
                            });
                    },
                    format(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    xoaDichVu() {
                        axios
                            .post('{{ Route('dichVuDel') }}', this.tt_xoa)
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
                    capNhatDichVu() {
                        axios
                            .post('{{ Route('dichVuUpdate') }}', this.tt_cap_nhat)
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
                    doiTrangThai(payload) {
                        axios
                            .post('{{ Route('dichVuStatus') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
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
