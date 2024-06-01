@extends('client.share.master')

@section('noi_dung')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a ><i class="fa-solid fa-film"></i> Phim Đang Chiếu</a></li>
    </ol>
</nav>

    <hr>
    <div class="row mb-3">

            <div class="card-header">
                <div class="col-8">
                    @if ($loaiPhim == '1')
                        <h1>PHIM ĐANG CHIẾU</h1>
                    @elseif($loaiPhim == '0')
                        <h1>PHIM SẮP CHIẾU</h1>
                    @endif
                </div>
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('search') }}" method="GET" class="d-flex" role="search">
                            <input class="form-control me-2" name="timkiemthongtin" type="search" placeholder="Tìm Kiếm.." aria-label="Search">
                            {{-- <input class="form-control me-2" name="timkiemngay" type="date" placeholder="Nhập Ngày.." aria-label="date"> --}}
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>

                    <div class="col-4"></div>
                </div>
                <hr>
            </div>
            <div class="car-body">
                <div class="row">
                    @if (isset ($listphim))
                        @foreach ($listphim as $phim)
                            <div class="col-3">
                                <div class="card" style="width: 15rem; ">
                                    <a href="/film-detail/{{$phim->id}}"><img src="{{ $phim->hinh_anh }}"
                                        class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <h4 class="card-title text-center"> {{ $phim->ten_phim }} </h4>
                                        <p class="card-text text-center">{{ $phim->the_loai }}</p>
                                    </div>
                                    <div class="card-footer text-center ">

                                        <button type="button" class="btn btn-primary ">Like</button>
                                        @if ($loaiPhim == '1')
                                        <button type="button" class="btn btn-danger ">Mua Vé</button>
                                        @elseif ($loaiPhim == '0')
                                        <a type="button" class="btn btn-danger " href="/film-detail/{{$phim->id}}">Xem Chi Tiết</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection
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
