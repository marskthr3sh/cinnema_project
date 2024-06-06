@extends('admin.share.master')
@section('noi_dung')
    <div id="ajax-results">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase">Thống Kê</h6>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header"> <br>
                        <h6>Thống kê</h6>
                    </div>
                    <form action="{{ route('ajaxthongKe') }}" method="POST" id="thongke_form">
                        @csrf
                        <div class="card-body">
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label class="form-label">Thời Gian Bắt Đầu</label>
                                    <input type="date" name="gio_bat_dau" class="form-control">
                                </div>
                            </div>
                            <div class="mb-2">
                                <div class="mb-3">
                                    <label class="form-label">Thời Gian Kết Thúc</label>
                                    <input type="date" name="gio_ket_thuc" class="form-control">
                                </div>
                            </div>
                            <label class="mb-2">Phim</label>
                            <select class="form-control mb-2" id="id_phim" name="id_phim[]" multiple>
                                <option value="">Chọn</option>
                                @foreach ($options as $option)
                                    <option value="{{ $option->id }}">{{ $option->ten_phim }}</option>
                                @endforeach
                            </select>
                            <label class="mb-2">Rạp</label>
                            <select class="form-control mb-2" name="khu_vuc">
                                <option value="">Tất Cả</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="HCM">HCM</option>
                            </select>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" id="submit_btn" class="btn btn-primary">Tìm Kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header"> <br>
                        <h6> Danh Sách Thống Kê </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tên Phim</th>
                                        <th class="text-center">Rạp Chiếu</th>
                                        <th class="text-center">Thời Gian</th>
                                        <th class="text-center">Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="result_body">
                                    @php
                                        $count = 1;
                                    @endphp
                                    @foreach ($results as $result)
                                        <tr>
                                            <th class="text-center align-middle">{{ $count++ }}</th>
                                            <td class="text-center align-middle">{{ $result->ten_phim }}</td>
                                            <td class="text-center align-middle">{{ $result->rap_chieu }}</td>
                                            <td class="text-center align-middle thoi_gian">{{ $gio_bat_dau }} -
                                                {{ $gio_ket_thuc }}</td>
                                            <td class="text-center align-middle">{{ $result->tong_gia_tien }}k</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('#submit_btn').click(function(e) {

                e.preventDefault();
                var formData = $('#thongke_form').serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('ajaxthongKe') }}',
                    data: formData,
                    success: function(response) {

                        $('#result_body').empty();

                        if (response.results.length > 0) {
                            $.each(response.results, function(index, result) {
                                var count = index + 1;
                                var nbd = response.gio_bat_dau  ? new Date(response.gio_bat_dau).toLocaleDateString() : '';
                                var nkt = response.gio_ket_thuc ? new Date(response.gio_ket_thuc).toLocaleDateString() : '';

                                if (nbd == null) {
                                    nbd = '';
                                    nkt = '';
                                }
                                var newRow =
                                    "<tr>" +
                                    "<th class='text-center align-middle'>" + count +"</th>" +
                                    "<td class='text-center align-middle'>" + result.ten_phim + "</td>" +
                                    "<td class='text-center align-middle'>" + result.rap_chieu + "</td>" +
                                    "<td class='text-center align-middle thoi_gian'>" +nbd + " - " + nkt + "</td>" +
                                    "<td class='text-center align-middle'>" + result.tong_gia_tien + "k</td>" +"</tr>";
                                $('#result_body').append(newRow);
                            });
                                toastr.success('Tìm kiếm thành công!', 'Thông báo');

                        } else {
                            $('#result_body').append("<tr><td colspan='5' class='text-center'>Không có phim</td></tr>");
                        }
                    },

                    // error: function(xhr, status, error) {
                    //     toastr.error("Có lỗi xảy ra khi gửi yêu cầu!", "Lỗi");
                    // }

                });
            });
        });

    </script>
       <script>
        toastr.options ={
            "progressBar": true,
            "closeButton": true,
        }

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'SUCCESS');
        @endif

    </script>
@endsection
