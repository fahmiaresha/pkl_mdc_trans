@extends('layout/main')


@section('container')

@foreach($sewa_bus as $sb)
@endforeach
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span><span>Invoice</span></p>
            <h1 class="mb-0 bread">Invoice Armada</h1>
          </div>
        </div>
      </div>
	</div>
  </br>
  </br>

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Invoice Pemesanan Sewa Bus</h1>
              <hr>
            </div>
            <div class="col-md-12">
                      <!-- <img src="{{ url('asset/vegfoods/images/bismillah.jpg') }}" class="img img-thumbnail img-fluid" >   -->
                      <hr>
                        <p>Anda sudah melakukan pembayaran? Silahkan lakukan <a href="{{ url('konfirmasi_pembayaran') }}">Konfirmasi Pembayaran</a>.</p>
                      <hr>
                    </div>
<div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <img src="{{ url('asset/vegfoods/images/mdc.png') }}" alt="logo">
                            <h3 class="text-xs-left m-b-0">#INV-{{$sb->ID_SEWA_BUS}}</h3>
                        </div>
                        <hr class="m-t-b-50">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <b>PT. Medina Dzikra Cemerlang Trans</b><br>
                                    JL. Suwoko No. 43 A Lamongan - Jawa Timur<br>
                                    Telp : (0322) 3101285
                                </p>
                                <p>
                                <b>{{$sb->NAMA_PENGGUNA}},</b><br>{{$sb->TGL_SEWA_BUS}}   -   {{$sb->TGL_AKHIR_SEWA}}
                                <br>{{$sb->JAM_SEWA}}       -      {{$sb->JAM_AKHIR_SEWA}}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-right">
                                    <b>Invoice to</b>
                                </p>
                                <p class="text-right"> {{$sb->NAMA_CUSTOMER}},<br> {{$sb->TELEPHONE}},<br> {{$sb->ALAMAT}}.
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table my-4">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Unit Cost</th>
                                    <th class="text-right">Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sewa_bus_category as $sbc)
                                @if($sbc->ID_SEWA_BUS == $sb->ID_SEWA_BUS)
                                <tr class="text-right">
                                    <td class="text-left">{{$sbc -> NAMA_CATEGORY}} - 
                                    {{$sbc -> TUJUAN_SEWA}}
                                    </td>
                                    <td>{{$sbc -> QUANTITY}}</td>
                                  
                                    <td>Rp. <?php echo number_format($sbc->PRICELIST_SEWA,'0',',','.'); ?></td>
                                    <td>Rp. <?php echo number_format($sbc->TOTAL,'0',',','.'); ?></td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="text-right">
                            <p>Total : Rp. <?php echo number_format($sb->total_payment,'0',',','.'); ?></p>
                            <p>DP (25%) : Rp. <?php echo number_format($sb->DP_BUS,'0',',','.'); ?></p>
                            <!-- <h4 class="font-weight-800">Sisa Bayar : Rp <?php echo number_format($sb->SISA_SEWA_BUS,'0',',','.'); ?></h4> -->
                        </div>
                        <hr>
                        <!-- <p class="text-left text-muted  m-t-100">
                                Silahkan Melakukkan Transfer sebesar DP (25%) :
                                <h4 class="font-weight-800 color-red">[DP (25%)] : Rp <?php echo number_format($sb->DP_BUS,'0',',','.'); ?></h2>
                                <p class="text-left text-muted  m-t-50">Bank BTPN - 90260078897</p>
                                <p class="text-left text-muted  m-t-50">Atas Nama PT. MDC Trans</p>
                                
                                   
                               
                        </p> -->
                        <p class="text-left text-muted  m-t-100">
                                <h5>*Silahkan klik button print untuk panduan pembayaran yang harus dibayar</h5>
                                <!-- <h4 class="font-weight-800 color-red">[DP (25%)] : Rp <?php echo number_format($sb->DP_BUS,'0',',','.'); ?></h2>
                                <p class="text-left text-muted  m-t-50">Bank BTPN - 90260078897</p>
                                <p class="text-left text-muted  m-t-50">Atas Nama PT. MDC Trans</p> -->
                                
                                   
                               
                        </p>
                    </div>
                    <div class="text-right d-print-none">
                        <hr class="my-5">
                        <!-- Invoice of PT. MDC Trans -->
                        <!-- <a href="#" class="btn btn-primary">Send Invoice</a> -->
                       
                        <a href="cetak_bus" class="btn btn-success m-l-5" target="_blank">
                            <i class="ti-printer mr-2"></i> Print
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="ftco-section bg-light">

</section>

<script>

var c = 0; max_count = 10; logout = true;
        startTimer();

        function startTimer(){
            setTimeout(function(){
                logout = true;
                c = 0; 
                max_count = 10;
                $('#timer').html(max_count);
                $('#logout_popup').modal('show');
                startCount();

            }, 30*60*1000);//10 detik =10*1000, 30 menit=30*60*1000, 
         
        }

        function resetTimer(){
            logout = false;
            $('#logout_popup').modal('hide');
            startTimer();
        }

        function chooseOut(){
            logout = false;
            $('#logout_popup').modal('hide');
            // alert('Your time is expired');
            window.location='/';
            // startTimer();
        }

        function timedCount() {
            c = c + 1;
            if(c<=10){
            remaining_time = max_count - c;
                if( remaining_time == 0 && logout ){
                    $('#logout_popup').modal('hide');
                    //location.href = $('#logout_url').val();
                    chooseOut();
                }
                else{
                    $('#timer').html(remaining_time);
                    t = setTimeout(function(){timedCount()}, 1000);
                }
        }
            else{
                startTimer();
            }
        }

        function startCount() {
           timedCount();
        }

        function press(){
            $('#logout_popup').modal('hide');
            console.log('press');
            resetTimer();
        }


       

</script>

@endsection