@extends('layout/main')

@section('container')

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(asset/vegfoods/images/baground2.jpeg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Special Bus &amp; Tour Packages</h1>
	              <h2 class="subheading mb-4">We ready all your question</h2>
	              <p><a href="{{ url('pemesanan_bus') }}" class="btn btn-danger">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(asset/vegfoods/images/baground1.jpeg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">You are satisfied, pride for us</h1>
	              <h2 class="subheading mb-4">We ready all your question</h2>
	              <p><a href="{{ url('pemesanan_bus') }}" class="btn btn-danger">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">

        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(asset/vegfoods/images/logoc.jpg);">
									<div class="text text-center">
										<h2>MDC Trans</h2>
										<p>Protect during your journey</p>
										<p><a href="{{ url('pemesanan_bus') }}" class="btn btn-danger">Tour now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(asset/vegfoods/images/ai.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Tour Unisla</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(asset/vegfoods/images/ibu2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="#">Tour Wali Songo</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(asset/vegfoods/images/garasigede.jpeg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Our Garage</a></h2>
							</div>		
						</div>
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(asset/vegfoods/images/bapak2.jpeg);">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Tour Bromo</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Bus</span>
                    <h2 class="mb-4">Our Bus</h2>
                    <p>With a comportable and safe service!</p>
                </div>
            </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/baground3.jpeg" alt="Colorlib Template">
    						
    						<div class="overlay"></div>
    					</a>
    					
	    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/baground1.jpeg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/baground2.jpeg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/bismillah.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					
    				</div>
    			</div>
            </div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Featured Tour Packages</span>
                    <h2 class="mb-4">Our Packages</h2>
                    <p>With low prices safe and comfortable service!</p>
                </div>
            </div>   		
        </div>
        
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/candi.jpg" alt="Colorlib Template">
    						
    						<div class="overlay"></div>
    					</a>
    					
	    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/bedugul.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/1.jpg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/malang.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					
    				</div>
    			</div>
            </div>
    	</div>
    </section>

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
