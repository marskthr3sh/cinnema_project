@extends('client.share.master')
@section('noi_dung')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="/phim-chieu/1"><i class="fa-solid fa-film"></i> Phim Đang Chiếu</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-circle-info"></i>Chi tiết</li>
    </ol>
    <div>
        <section class="section-content pv12 bg-cover">
            <div class="container">
                <hr>
                <div class="row">
                    <div class="col-3">
                        <div class="card" style="width: 20rem; ">
                            <img src="{{ $phim->hinh_anh }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <br>
                    <div class="col-9">
                        <div class="card-header ">
                            <H2 class="text-center">{{ $phim->ten_phim }}</H2>
                        </div>
                        <hr>
                        <div class="card-body">
                            <div class="info-content">
                                <ul class="item-info">
                                    <div class="">- Đạo Diễn: <b class="text-dark ">{{ $phim->dao_dien }}</b>
                                    </div> <br>

                                    <div class="">- Diễn Viên: <b class="text-dark ">{{ $phim->dien_vien }}</b>
                                    </div> <br>

                                    <div class="">- Thể Loại: <b class="text-dark ">{{ $phim->the_loai }}</b>
                                    </div> <br>

                                    <div class="">- Ngày khởi chiếu: <b class="text-dark ">{{ $phim->bat_dau }}</b>
                                    </div><br>

                                    <div>- Thời gian chiếu: <b class="text-dark">
                                            @php
                                                $gio = intval($phim->thoi_luong / 60);
                                                $phut = $phim->thoi_luong - $gio * 60;
                                            @endphp
                                            {{ $gio }} giờ {{ $phut }} phút</b>
                                    </div><br>

                                    <div class="">- Ngôn Ngữ: <b class="text-dark ">{{ $phim->ngon_ngu }}</b>
                                    </div> <br>

                                    <div class="">- Rated: <b class="text-dark ">{{ $phim->rated }}</b>
                                    </div> <br>

                                    <div class="">- Nội Dung Phim: <b class="text-dark ">{!! $phim->mo_ta !!}</b>
                                    </div>
                                </ul>
                                <br>
                            </div>
                        </div>
                        <hr>

                        <div class="text-center">
                            <a class="video-player btn btn-outline-primary " href="{{ $phim->trailer }}"><i
                                    class="fa-solid fa-film"></i>Trailer</a>

                            @if ($phim->trang_thai == '1')
                                <a class="video-player btn btn-outline-danger " data-bs-toggle="modal"
                                    data-bs-target="#MuaVeModal"><i class="fa-solid fa-ticket"></i>Mua Vé</a>
                            @elseif($phim->trang_thai == '0')
                                <a class="video-player btn btn-outline-danger " href="{{ $phim->trailer }}"><i
                                        class="fa-solid fa-ticket"></i>Xem Chi Tiết</a>
                            @endif
                        </div>
                        <div class="modal fade" id="MuaVeModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel"aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="{{ route('profile') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel" class="text-center">Lịch
                                                Chiếu Phim <b>{{ $phim->ten_phim }}</b> </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="mb-2">Chọn Rạp</label>
                                                    <select name="rap_chieu" class="form-control mb-2">
                                                        <option>Đà Nẵng</option>
                                                        <option>Hà Nội</option>
                                                        <option>HCM</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="mb-2">Khung Giờ Chiếu</label>
                                                    <select name="khung_gio_chieu" class="form-control mb-2">
                                                        <option>13:00 PM</option>
                                                        <option>14:00 PM</option>
                                                        <option>15:00 PM</option>
                                                        <option>18:00 PM</option>
                                                        <option>19:00 PM</option>
                                                        <option>20:00 PM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="mb-2">Chọn Phòng Chiếu</label>
                                                    <select name="phong_chieu" class="form-control mb-2">
                                                        <option>2D </option>
                                                        <option>3D </option>
                                                        <option>IMAX </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 text-begin">
                                                    <div class="mb-2">
                                                        <div id="questionContainer">
                                                            <button type="button" name="so_ghe[]" onclick="tangGiaVe()"
                                                                class=" btn btn-outline-info">Chọn Ghế </button>
                                                            <hr>
                                                            Giá: <input name="gia_tien" id="price" readonly></input>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-begin">
                                                    <div class="mb-2">
                                                        {{-- <label class="mb-2">Dịch Vụ</label>
                                                        <select class="form-control mb-2" id="id_phim" name="id_phim[]" >
                                                            <option value="">Chọn</option>
                                                            @foreach ($dich_vu as $dich_vus)
                                                                <option value="{{ $dich_vus->id }}">{{ $dich_vus->ten_dich_vu }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <input name="id_phim"0 class="form-control" type="hidden"
                                                value="{{ $phim->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Đặt Vé</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<script>
    let soGhe = 1;
    var giaVe = 0;
    // Giá vé ban đầu

    function tangGiaVe() {
        giaVe += 50; // Tăng giá lên
        updateGiaVe();

        //them Ghế
        const themGhe = document.createElement('input');
        themGhe.value = `Ghế ${soGhe}`;
        themGhe.name = 'so_ghe[]';
        document.getElementById('questionContainer').appendChild(themGhe);
        soGhe++;

        // Nếu bạn không muốn submit form, hãy chắc chắn return false
        return false;
    }

    function updateGiaVe() {
        var priceElement = document.getElementById('price');
        priceElement.value = giaVe + 'k';
    }
</script>
<style>
    .breadcrumb-item {
        color: #333;
        font-weight: bold;
        font-size: 16px;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #007bff;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }

    .breadcrumb-item i {
        margin-right: 5px;
    }
</style>
