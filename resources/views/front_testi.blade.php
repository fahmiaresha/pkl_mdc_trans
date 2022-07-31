@extends('layout/main')

@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span><span>Testimony</span></p>
            <h1 class="mb-0 bread">Testimony</h1>
          </div>
        </div>
      </div>
	</div>

 <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            <p>Pelayanan super nyaman, harga terjangkau dengan kualitas terbaik.</p>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
              @foreach($testimony as $tes)
              <div class="item">
                <div class="testimony-wrap p-4 pb-5">
                  <!-- <div class="user-img mb-5" style="background-image: url(asset/vegfoods/images/tes2.png)"> -->
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  <!-- </div> -->
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line">{{$tes->TESTIMONY}}</p>
                    <p class="name">{{$tes->NAMA_TESTI}}</p>
                    <!-- <span class="position">Interface Designer</span> -->
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>

 <section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Formulir Testimony</h1>
              <hr>
              <p class="alert alert-info">
              * Silahkan tulis testimony bersama dengan MDC Trans.
              </p>
              <hr>
            </div>

                <div class="col-md-12 text-left">

                    <form action="testimony_store" method="post" class="bg-white p-5 contact-form">
                    @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" id="NAMA_TESTI" name="NAMA_TESTI">
                      </div>
                      <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Phone">
                      </div> -->
                      <!-- <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject">
                      </div> -->
                      <div class="form-group">
                        <textarea cols="30" rows="7" class="form-control" placeholder="Message" id="TESTIMONY" name="TESTIMONY"></textarea>
                      </div>
                      </br>
                      <div class="form-group">
                        <input type="submit" value="Send Testimony" class="btn btn-info py-3 px-5">
                      </div>
                    </form>
                  
                </div>

                  <div class="col-md-6 d-flex">
                    <!-- <div id="map" class="bg-white"></div> -->
                    <div class="bg-white" style="background-image: url(asset/vegfoods/images/ai.jpg);"></div>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="ftco-section bg-light">

</section>

@endsection