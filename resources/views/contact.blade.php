@extends('layout/main')

@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span><span>Contact Us</span></p>
            <h1 class="mb-0 bread">Contact Us</h1>
          </div>
        </div>
      </div>
	</div>

  <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Contact Us</span>
            <h2 class="mb-4">Our Office in Lamongan</h2>
            <p>Pelayanan super nyaman, harga terjangkau dengan kualitas terbaik.</p>
            <hr>
            </br>
            <div class="col-md-12 col-lg-12 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/logomdc.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    				</div>
    			</div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">

</section>

<section class="ftco-section">
      <div class="container">
      	<div class="row d-flex mb-5 contact-info">
        
          <div class="w-100"></div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-light p-4">
	            <p><span>Address : </span>Jl. Soewoko No.43 A, RT.2/RW.2, Jetis, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62211</p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-light p-4">
	            <p><span>Phone :</span> <a href="tel://1234567920">(0322) 3101285</a></p>
	            <p><span>Whatsapp :</span> <a href="tel://082363306033">0823-6330-6033</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-light p-4">
	            <p><span>Email:</span> <a href="mailto:groupmdc@gmail.com">groupmdc@gmail.com</a></p>
	          </div>
          </div>
          <div class="col-md-3 d-flex">
          	<div class="info bg-light p-4">
	            <p><span>Website</span> <a href="{{ url('home') }}">mdctrans.com</a></p>
	          </div>
          </div>
        </div>

        

          <div class="col-md-6 d-flex">
          	<!-- <div id="map" class="bg-light"></div> -->
            <div class="bg-light" style="background-image: url(asset/vegfoods/images/ai.jpg);"></div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">

</section>

@endsection