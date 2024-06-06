@extends('client.share.master')
@section('noi_dung')

<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="1.png" class="d-block w-100" style="width:500px;height:500px;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="2.png" class="d-block w-100" style="width:500px;height:500px;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="3.png" class="d-block w-100" style="width:500px;height:500px;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="4.png" class="d-block w-100" style="width:500px;height:500px;" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<hr>
@endsection
@section('js')
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
