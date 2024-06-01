@extends('client.share.master')
@section('noi_dung')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="/phim-chieu/1"><i class="fa-solid fa-film"></i> Phim Đang Chiếu</a></li>
        <li class="breadcrumb-item active" aria-current="page"><i class="fa-sharp fa-solid fa-magnifying-glass"></i>Tìm Kiếm</li>
    </ol>
</nav>
<hr>
    <div>
        <H1> DANH SÁCH TÌM KIẾM</H1>
    </div>
    <hr>



    {{-- Hiển thị kết quả tìm kiếm --}}
    <div class="row">
        {{-- <div class="card-header">
            <h2>Tìm Kiếm: </h2>
        </div> --}}
        <div class="card-body">
            <div class="row">
                @if (isset($results) && count($results) > 0)
                    @foreach ($results as $result)
                        <div class="col-3">
                            <div class="card" style="width: 15rem;">
                                <div class="card-header">
                                    <a href="/film-detail/{{$result->id}}"><img
                                            src="{{ $result->hinh_anh }}" class="card-img-top" alt="..."></a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $result->ten_phim }}</h5>
                                    <p class="card-text text-center">{{ $result->dao_dien }}</p>
                                </div>
                                <div class="card-footer text-center ">
                                    <button type="button" class="btn btn-primary ">Like</button>
                                    <button type="button" class="btn btn-danger ">Mua Vé</button>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <H2>Không tìm thấy phim.</H2>
                    </div>
                @endif
            </div>

        </div>

    </div>
    <hr>
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
