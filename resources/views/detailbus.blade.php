@extends('layout/main')


@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Bus</a></span> <span>Detail Bus</span></p>
            <h1 class="mb-0 bread">Detail Bus</h1>
            <p><a href="{{ url('pemesanan_bus') }}" class="btn btn-danger">Booking Bus</a></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="asset/vegfoods/images/baground2.jpeg" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Bus Besar</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2">5.0</a> -->
								<!-- <a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a> -->
							</p>
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a> -->
							</p>
							<!-- <p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p> -->
					</div>
                            <p class="price"><span>61 Seats</span></p>
                            <p>Berikut daftar fasilitas Big Bus pariwisata yang perlu Anda ketahui :</p>
                                <p>• RECLINING SEAT 2-2 (KAPASITAS 50 ORANG) REQUEST</p>
                                <p>• RECLINING SEAT 2-3 (KAPASITAS 61 ORANG)</p>
                                <p>• TV</p>
                                <p>• DVD PLAYER</p>
                                <p>• KARAOKE</p>
                                <p>• RUNING TEXT</p>
                                <p>• LAMPU DISKO</p>
                                <p>• COOL BOX</p>
                                <p>• BANTAL SELIMUT</p>
                                <p>• FULL AIR CONDITIONER AC</p>
                                <p>• LAMPU TIDUR</p>
                                <p>• STOP KONTAK</p>
                                <p>• LUBANG USB</p>
                                <p>• WIFI</p>
                            <!-- <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex">
                            <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">Small</option>
                                <option value="">Medium</option>
                                <option value="">Large</option>
                                <option value="">Extra Large</option>
                            </select>
                            </div>
                            </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="ion-ios-remove"></i>
                                </button>
                                </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">600 kg available</p>
                        </div>
                    </div>
                    <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                        </div>
                    </div> -->
    	</div>
    </section>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="asset/vegfoods/images/bismillah.jpg" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Bus Sedang</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2">5.0</a> -->
								<!-- <a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a> -->
							</p>
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a> -->
							</p>
							<!-- <p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p> -->
					</div>
                            <p class="price"><span>35 Seats</span></p>
                            <p>Berikut daftar fasilitas Medium Bus pariwisata yang perlu Anda ketahui :</p>
                                <p>• RECLINING SEAT 2-2</p>
                                <p>• KAPASITAS 35 ORANG</p>
                                <p>• TV</p>
                                <p>• DVD Player</p>
                                <p>• KARAOKE</p>
                                <p>• COOL BOX</p>
                                <p>• BANTAL SELIMUT</p>
                                <p>• FULL AIR CONDITIONER AC</p>
                                <p>• LAMPU TIDUR</p>
                                <p>• STOP KONTAK</p>
                            <!-- <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex">
                            <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">Small</option>
                                <option value="">Medium</option>
                                <option value="">Large</option>
                                <option value="">Extra Large</option>
                            </select>
                            </div>
                            </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="ion-ios-remove"></i>
                                </button>
                                </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">600 kg available</p>
                        </div>
                    </div>
                    <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                        </div>
                    </div> -->
    	</div>
    </section>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="asset/vegfoods/images/baground3.jpeg" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>Elf (Mini Bus)</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2">5.0</a> -->
								<!-- <a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a> -->
							</p>
							<p class="text-left mr-4">
								<!-- <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a> -->
							</p>
							<!-- <p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p> -->
					</div>
                            <p class="price"><span>19 Seats</span></p>
                            <p>Berikut daftar fasilitas Elf Bus pariwisata yang perlu Anda ketahui :</p>
                                <p>• KAPASITAS 19 ORANG</p>
                                <p>• TV</p>
                                <p>• DVD Player</p>
                                <p>• KARAOKE</p>
                                <p>• FULL AIR CONDITIONER AC</p>
                                <p>• LAMPU TIDUR</p>
                                <p>• STOP KONTAK</p>
                            <!-- <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex">
                            <div class="select-wrap">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">Small</option>
                                <option value="">Medium</option>
                                <option value="">Large</option>
                                <option value="">Extra Large</option>
                            </select>
                            </div>
                            </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                            <i class="ion-ios-remove"></i>
                                </button>
                                </span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">600 kg available</p>
                        </div>
                    </div>
                    <p><a href="cart.html" class="btn btn-black py-3 px-5">Add to Cart</a></p>
                        </div>
                    </div> -->
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<!-- <span class="subheading">Bus</span> -->
            <h2 class="mb-4">Our Bus</h2>
            <p>You are satisfied, pride for us</p>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/busgede.jpg" alt="Colorlib Template">
    						<!-- <span class="status">30%</span> -->
    						<div class="overlay"></div>
    					</a>
    					<!-- <div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Bell Pepper</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					
    					</div> -->
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/hi.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<!-- <div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Strawberry</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						
    					</div> -->
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/ibu.jpeg" alt="Colorlib Template">
	    					<div class="overlay"></div>
	    				</a>
    					<!-- <div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Green Beans</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						
    					</div> -->
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="asset/vegfoods/images/baground1.jpeg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<!-- <div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Purple Cabbage</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						
    					</div> -->
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

<section class="ftco-section bg-light">

</section>

@endsection