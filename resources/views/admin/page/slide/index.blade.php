@extends('admin.share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row mt-1">
                        <div class="col-10">
                            <h4>Danh Sách </h4>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#themMoiModal"
                                class="btn btn-primary">Thêm Mới</button>
                        </div>
                    </div>
                    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <label class="mb-2" >Slide</label>
                                            <input v-model="them_moi.hinh_anh" type="text" class="form-control" placeholder="thêm mới slide">
                                        </div>
                                        <div class="col">
                                            <label class="mb-2">Tình Trạng</label>
                                            <select v-model="them_moi.tinh_trang" class="form-control">
                                                <option value="1">Hiển Thị Trang Chủ</option>
                                                <option value="0">Không Hiển thị</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button v-on:click="themMoi()" type="button" class="btn btn-primary">Thêm Mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-nowrap align-middle text-center">#</th>
                                <th class="text-nowrap align-middle text-center">Hình Ảnh</th>
                                <th class="text-nowrap align-middle text-center">Tình Trạng</th>
                                <th class="text-nowrap align-middle text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list">
                                <tr>
                                    <th class="text-center align-middle">@{{key + 1}}</th>
                                    <td class="align-middle text-center">
                                        <img class="rounded-circle p-1 border" width="90px" height="90px" v-bind:src="value.hinh_anh"  alt="">
                                    </td>
                                    <td class="text-nowrap align-middle text-center">
                                        <button value="1" class="btn btn-primary">Hiển Thị</button>
                                        <button value="0" class="btn btn-warning">Tạm Tắt</button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center">
                                        <button  data-bs-toggle="modal"  class="btn btn-info">Cập Nhật</button>
                                        <button  data-bs-toggle="modal"  class="btn btn-danger">Hủy Bỏ</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                them_moi: {},
                list    : [],
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData(){
                    axios
                        .post('/api/admin/slide/data')
                        .then((res) => {
                            this.list = res.data.data;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                themMoi() {
                    axios
                        .post('/api/admin/slide/create', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.themMoi = {};
                                $("#themMoiModal").modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                }
            },
        });
    </script>
@endsection
