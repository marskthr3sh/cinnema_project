<!doctype html>
<html lang="en">

<head>
    @include('admin.share.css')
</head>

<body>
    <div class="wrapper">
        <div class="header-wrapper">
            @include('admin.share.header')
            @include('admin.share.menu')
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                @yield('noi_dung')
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        @include('admin.share.footer')
    </div>
    @include('admin.share.color')
    @include('admin.share.js')
    @yield('js')
</body>

</html>
