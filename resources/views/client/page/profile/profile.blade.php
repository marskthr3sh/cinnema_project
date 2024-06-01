@extends('client.share.master')
@section('noi_dung')

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h1 class="mb-0 text-uppercase">Hồ Sơ Cá Nhân</h1>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header"> <br>
                    <h4 class="text-center"> Hồ Sơ </h4>
                </div>
                <div class="card-body">
                    <aside class="sidebar">
                        <ul>
                            <li>
                                <a id="buttonA" href="#"><i class="fa-solid fa-address-card"></i> <b>Thông Tin Cá
                                        Nhân</b></a>
                            </li>
                            <li>
                                <a id="buttonB" href="#"><i class="fa-solid fa-key"></i> <b>Thay Đổi Mật
                                        Khẩu</b></a>
                            </li>
                            <li>
                                <a id="buttonC" href="#"><i class="fa-solid fa-cart-arrow-down"></i> <b>Lịch Sử Giao
                                        Dịch</b></a>
                            </li>

                        </ul>
                    </aside>
                </div>
            </div>

        </div>
        <div class="col-9">
            <div class="card">
                <div class="content">
                    <div id="infoA" style="display: none;" class="text-center">
                        <div class="card-header"> <br>
                            <h4 class="text-center mb-2"> Profile </h4>
                        </div><br>
                        <h6>Tên: {{ Auth::user()->name }}</h6><br>
                        <h6>Email: {{ Auth::user()->email }}</h6>
                    </div>
                    <div id="infoB" style="display: none;">
                        <div class="card-header"> <br>
                            <h4 class="text-center">Thay Đổi Mật Khẩu </h4>
                        </div>
                        <div class="card-body">
                            <div class="tab-pane" id="change_password">
                                <form class="form-horizontal" action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                                  <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Old Passord</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                                      <span class="text-danger error-text oldpassword_error"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                                      <span class="text-danger error-text newpassword_error"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                                      <span class="text-danger error-text cnewpassword_error"></span>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                      <button type="submit" class="btn btn-danger">Update Password</button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div id="infoC" style="display: none;">
                        <div class="card-header"> <br>
                            <h4 class="text-center "> Lịch Sử Giao Dịch </h4>
                        </div>
                        <div id="transaction-history">
                            @include('client.page.profile.profile_partial', ['data' => $data])
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
        // Thêm sự kiện click cho các liên kết phân trang
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            // Lấy URL của liên kết phân trang
            var page_url = $(this).attr('href');

            // Gửi yêu cầu AJAX đến URL phân trang
            $.ajax({
                url: page_url,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    // Cập nhật nội dung của phần hiển thị dữ liệu với dữ liệu mới từ máy chủ
                    $('#transaction-history').html(response.html);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        document.getElementById("buttonA").addEventListener("click", function() {
            document.getElementById("infoA").style.display = "block";
            document.getElementById("infoB").style.display = "none";
            document.getElementById("infoC").style.display = "none";
            // Remove class 'active' from all links
            document.getElementById("buttonA").classList.remove("active");
            document.getElementById("buttonB").classList.remove("active");
            document.getElementById("buttonC").classList.remove("active");
            // Add class 'active' to current link
            this.classList.add("active");
        });

        document.getElementById("buttonB").addEventListener("click", function() {
            document.getElementById("infoA").style.display = "none";
            document.getElementById("infoB").style.display = "block";
            document.getElementById("infoC").style.display = "none";
            // Remove class 'active' from all links
            document.getElementById("buttonA").classList.remove("active");
            document.getElementById("buttonB").classList.remove("active");
            document.getElementById("buttonC").classList.remove("active");
            // Add class 'active' to current link
            this.classList.add("active");
        });

        document.getElementById("buttonC").addEventListener("click", function() {
            document.getElementById("infoA").style.display = "none";
            document.getElementById("infoB").style.display = "none";
            document.getElementById("infoC").style.display = "block";
            // Remove class 'active' from all links
            document.getElementById("buttonA").classList.remove("active");
            document.getElementById("buttonB").classList.remove("active");
            document.getElementById("buttonC").classList.remove("active");
            // Add class 'active' to current link
            this.classList.add("active");
        });
    });
</script>
@endsection

<style>
body {
    font-family: Arial, sans-serif;
    display: flex;

}

.sidebar {
    text-align: center;
    width: 280px;
    background-color: #dfe5e5;
    padding: 20px;

}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: #000000;
    display: block;
    padding: 10px;
}

.sidebar ul li a.active,
.sidebar ul li a:hover {
    background-color: #086c5a;
    color: white;
    border-radius: 6px;

}

.main-content {
    flex: 1;
    padding: 20px;
}

.password-change-container {
    max-width: 600px;
    margin: 0 auto;
}

.password-change-container h2 {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

button {
    padding: 10px;
}
</style>
