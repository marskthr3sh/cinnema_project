<!doctype html>
<html lang="en">

<head>
    @include('client.share.css')
</head>

<body>
    <div class="wrapper">
        <div class="header-wrapper">
            @include('client.share.header')
            @include('client.share.menu')
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                @yield('noi_dung')
            </div>
        </div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        @include('client.share.footer')
    </div>
    @include('client.share.color')
    @include('client.share.js')
    @yield('js')
</body>

</html>
