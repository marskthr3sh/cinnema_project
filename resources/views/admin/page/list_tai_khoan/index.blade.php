@extends('admin.share.master')
@section('noi_dung')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase">DANH SÁCH TÀI KHOẢN</h6>
            </div>
            {{-- Nút Thêm Acc --}}
            {{-- <div class="ms-auto">
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
        </div> --}}
        </div>
        <hr />

        <div class="row">
            <div class="col">
                <div class="card border-primary border-bottom border-3 border-0">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Họ Và Tên</th>
                                            <th class="text-center align-middle">Email</th>
                                            <th class="text-center align-middle">Quyền</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $count = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            @csrf
                                            <tr class="align-middle">
                                                <th class="text-center align-middle">{{ $count++ }}</th>
                                                <td class="text-center align-middle"> {{ $user->name }} </td>
                                                <td class="text-center align-middle">{{ $user->email }}</td>

                                                <td class="text-center align-middle">
                                                    @if ($user->is_admin == 1)
                                                        Admin
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#editModal{{ $user->id }}"
                                                        type="button"class="btn btn-success"><i
                                                            class="fa-solid fa-user-shield"></i></button>
                                                    <button data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        type="button"class="btn btn-danger" style="margin-left: 10px"><i
                                                            class="fa-solid fa-user-lock"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                                    <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa <b>@{{ tt_xoa.ho_va_ten }}</b> này không?</div>
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
                            </div> --}}

                            @foreach ($users as $user)
                            <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-ms">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT QUYỀN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic radio toggle button group">
                                                    <select id="status-btn-{{ $user->id }}" name="is_admin"
                                                        class="form-control mb-2">
                                                        <option value="1"
                                                            {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin</option>
                                                        <option value="0"
                                                            {{ $user->is_admin == 0 ? 'selected' : '' }}>User</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
