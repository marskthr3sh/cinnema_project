<!-- resources/views/client/page/profile_partial.blade.php -->
<div class="card-body ">
    <div class="table-responsive ">
        <table class="table table-bordered table-striped">
            <thead >
                <tr >
                    <th class="text-center ">#</th>
                    <th class="text-center">Tên Phim</th>
                    <th class="text-center">Rạp</th>
                    <th class="text-center">Giờ Chiếu</th>
                    <th class="text-center">Phòng Chiếu</th>
                    <th class="text-center">Số Ghế</th>
                    <th class="text-center">Giá Tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp
                @if (isset($data))
                    @foreach ($data as $data_user)
                        <tr>
                            <th class="text-center align-middle">{{ $count++ }}</th>
                            <td class="text-center align-middle">{{ $data_user->ten_phim }}</td>
                            <td class="text-center align-middle">{{ $data_user->rap_chieu }}</td>
                            <td class="text-center align-middle">{{ $data_user->khung_gio_chieu }}</td>
                            <td class="text-center align-middle">{{ $data_user->phong_chieu }}</td>
                            <td class="text-center align-middle">{{ $data_user->so_ghe }}</td>
                            <td class="text-center align-middle">{{ $data_user->gia_tien }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div>
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

