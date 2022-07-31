<!-- <head>
	<title>Laporan Sales PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> -->
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 12pt;
		}
        @page {size: A4 potrait; margin-left: 25; margin-top: 5;}
  body {font-size: 12pt;}
  td {  width: 180px; height: 47.99; text-align: center; padding-bottom: 2.1; padding-top: 2; padding-left: 5;}
  img{text-align: left;}
	</style>
	<!-- <center>
		<h5>Laporan Data Sales</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5>
	</center> -->
 <br>
@foreach($sewa_paket_wisata as $spw)
@endforeach
<body>
<div class="row">
        <div class="col-md-12">

        <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <!-- <img src="{{ url('assets/media/image/logo/mdc.png') }}" alt="logo"> -->
                            <h3 class="text-xs-left m-b-0">#INV-{{$spw->ID_SEWA_PAKET}}</h3>
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
                                <b>{{$spw->NAMA_PENGGUNA}},</b><br>{{$spw->TGL_SEWA_PAKET}}   -   {{$spw->TGL_AKHIR_SEWA_PAKET}}
                                <br>{{$spw->JAM_SEWA_PAKET}}       -      {{$spw->JAM_AKHIR_SEWA_PAKET}}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-right">
                                    <b>Invoice to</b>
                                </p>
                                <p class="text-right"> {{$spw->NAMA_CUSTOMER}},<br> {{$spw->TELEPHONE}},<br> {{$spw->ALAMAT}}.
                                </p>
                            </div>
                        </div>
                        <hr class="m-t-b-50">
                        <!-- <div class="table-responsive"> -->
                            <table class="table my-4">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Harga (/Orang)</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody  align="center">
                                <tr  class="text-right" align="center">
                                    <td class="text-left" align="center">{{$spw->NAMA_PAKET}}</td>
                                    <td class="text-left">Rp. <?php echo number_format($spw->HARGA_PAKET,'0',',','.'); ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($spw->HARGA_JUAL,'0',',','.'); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="m-t-b-50">
                        <div class="text-right"  align="right">
                            <p>Total : Rp. <?php echo number_format($spw->HARGA_JUAL,'0',',','.'); ?></p>
                            <p>DP (25%) : Rp. <?php echo number_format($spw->DP_PAKET,'0',',','.'); ?></p>
                            <h4 class="font-weight-800">Sisa Bayar : Rp <?php echo number_format($spw->SISA_SEWA_PAKET,'0',',','.'); ?></h4>
                        </div>
                        
                        
                    </div>
                    
                <!-- </div> -->
            </div>
            <p class="text-danger">*Segera lakukkan konfirmasi pembayaran</p>
            <p class="text-danger">*Panduan pembayaran terdapat pada link di menu konfirmasi pembayaran</p>

        </div>
                        <h5 class="text-center small text-muted  m-t-50" align="right">
                            <span class="row">
                                <span class="col-md-6 offset-8">
                                    Invoice of PT. MDC Trans
                                </span>
                            </span>
                        </h5>
    </div>
</body>
</html>

