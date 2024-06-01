@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH GHẾ</h6>
    </div>
</div>
<hr/>
<div class="row" id="app">
    <div class="col-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th colspan="100%" class="bg-warning text-center align-middle">
                                <h5 class="mt-2 text-danger"><b>MÀN CHIẾU</b></h5>
                            </th>
                        </tr>
                        <tr style="height: 70px">
                            <td colspan="100%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @for($i = 0; $i < $phong->hang_doc; $i++)
                        <tr>
                            @for($j = 0; $j < $phong->hang_ngang; $j++)
                            <th class="text-center align-middle">
                                <i class="fa-solid fa-couch fa-2x"></i>
                                <br>
                                A01
                            </th>
                            @endfor
                        </tr>
                        @endfor
                        <tr style="height: 40px">
                            <td colspan="100%">PHÍA TRÊN LÀ COMPACT</td>
                        </tr> --}}
                        <template v-for="i in phong_chieu.hang_doc">
                            <tr>
                                <template v-for="j in phong_chieu.hang_ngang">
                                    <th class="text-center align-middle">
                                        <template v-for="(v, k) in list_ghe">
                                            <template v-if="k == ((i - 1) * phong_chieu.hang_ngang + j - 1)">
                                                <i v-on:click="doiTinhTrang(v)" v-if="v.tinh_trang == 1" class="fa-solid fa-couch fa-2x"></i>
                                                <i v-on:click="doiTinhTrang(v)" v-else class="text-danger fa-solid fa-couch fa-2x"></i>
                                                <br>
                                                <span v-on:click="edit = v" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                    @{{ v.ten_ghe }} / @{{ v.gia_mac_dinh }}
                                                </span>
                                            </template>
                                        </template>
                                    </th>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                                <div class="col">
                                    <label class="mb-2">Giá Mặc Định</label>
                                    <input v-model="edit.gia_mac_dinh" type="number" class="form-control">
                                </div>
                          </div>
                          <div class="row">
                            <div class="mt-3">
                                <div class="col">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select v-model="edit.tinh_trang" class="form-control">
                                        <option value="1">Hiển Thị</option>
                                        <option value="0">Tạm Tắt</option>
                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                          <button v-on:click="capNhapGheChieu()" type="button" class="btn btn-primary">Cập Nhật</button>
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
                id_phong    :   '',
                phong_chieu :   {'hang_ngang' : 2, 'hang_doc' : 10},
                list_ghe    :   [],
                edit        :   {},
            },
            created()   {
                this.getIdPhong();
            },
            methods :   {
                getIdPhong() {
                    var currentURL = window.location.href;
                    var parts = currentURL.split('/');
                    var number = parts[parts.length - 1];
                    if (!isNaN(number)) {
                        this.id_phong   = number;
                        this.loadData();
                    } else {
                        console.log('Không tìm thấy số');
                    }
                },
                loadData()  {
                    var payload = {
                        'id_phong'  : this.id_phong
                    };

                    axios
                        .post('{{ Route("infoPhongGhe") }}', payload)
                        .then((res) => {
                            this.phong_chieu    = res.data.phong_chieu;
                            this.list_ghe       = res.data.ds_ghe;
                        });
                },
                doiTinhTrang(payload) {
                    axios
                        .post('{{ Route("gheChieuStatus") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
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
                },
                capNhapGheChieu() {
                    axios
                        .post('{{Route("gheChieuUpdate")}}', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                                $("#updateModal").modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message);
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                }
            },
        });
    });
</script>
@endsection
