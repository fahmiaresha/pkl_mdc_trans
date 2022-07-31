@extends('layout/main')

@section('container')

    <div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>About us</span></p>
            <h1 class="mb-0 bread">About us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(asset/vegfoods/images/TES4.png);">
						<a href="https://www.youtube.com/watch?v=p4PeXzoYbwI" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Welcome to MDC Trans Website</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
	          	<p>Bus pariwisata MDC Trans merupakan PO bus pariwisata yang berasal dari Lamongan, Jawa Timur.</p>

              <p>Bus pariwisata ini melayani transportasi wisata di Indonesia, khususnya di Pulau Jawa, Bali, Lombok, dan sebagian Sumatera.</p>

              <p>Bus pariwisata MDC Trans Trans melayani antar jemput, drop bandara, trip wisata, wisata ziarah, kunjungan industri dan atau menyesuaikan kebutuhan pelanggan.</p>
							</br>
              <p><a href="/pemesanan_bus" class="btn btn-primary">Booking now</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <!-- <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
          <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span>
          </div>
          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div> -->
    </section>
		
		<!-- <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(asset/vegfoods/images/bismillah.jpg);">
    	<div class="container">
    		<div class="row justify-content-center py-5">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10000">0</strong>
		                <span>Happy Customers</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Branches</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="1000">0</strong>
		                <span>Partner</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Awards</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section> -->
		
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

    <section class="ftco-section bg-light">

		</section>

@endsection