<!doctype html>
<html lang="en">

<head>
	@include('admin.share.css')
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper" >
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						{{-- <div class="my-4 text-center">
							<img src="/assets_admin/images/logo-img.png" width="180" alt="" />
						</div> --}}
						<div class="card">
							<div class="card-body">
								<div class="border p-5 rounded">
									<div class="text-center">
										<h3 class="">Login Admin</h3>
									</div>
                                    <form method="POST" action="{{ route('admin.login.post') }}">
                                        @csrf
                                        <div class="form-body">
                                            <div class="col-12 mt-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" id="email" class="form-control" name="email" >
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" id="password" class="form-control" name="password" >
                                            </div>
                                            <div class="col-12 mt-3">
                                                <div class="d-grid">
                                                    <button type="submit"  class="btn btn-primary"><i class='bx bx-user'></i>Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	@include('admin.share.js')

</body>
<script>

    toastr.options = {
            "progressBar": true,
            "closeButton": true,
            "timeOut": "3000", // Thời gian thông báo tự động đóng (5000 ms = 5 giây)
            "positionClass": "toast-top-right", // Vị trí hiển thị thông báo
            "hideDuration": "5000", // Thời gian hiệu ứng ẩn (1000 ms)
        };

    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}", 'SUCCESS');
    @endif

    @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}", 'ERROR');
    @endif
</script>
