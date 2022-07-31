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
        table th{
            color: black;
        }
        h2 {
  color: green;
}
        h3 {
  color: red;
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
@foreach($sewa_bus as $sb)
@endforeach
<body>
<div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <!-- <img src="{{ url('asset/vegfoods/images/mdc.png') }}" alt="logo"> -->
                            <h1 class="text-xs-left m-b-0">#INV-{{$sb->ID_SEWA_BUS}}</h1>
                            <h4 class="text-xs-right m-b-0">Batas Konfirmasi Pembayaran : {{$sb->bataswaktu}}</h4>
                        </div>
                        <hr class="m-t-b-50">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <p>
                                    <b>PT. Medina Dzikra Cemerlang Trans</b><br>
                                    JL. Suwoko No. 43 A Lamongan - Jawa Timur<br>
                                    Telp : (0322) 3101285
                                </p>
                                <p>
                                <b>{{$sb->NAMA_PENGGUNA}},</b><br>{{$sb->TGL_SEWA_BUS}}   -   {{$sb->TGL_AKHIR_SEWA}}
                                <br>{{$sb->JAM_SEWA}}       -      {{$sb->JAM_AKHIR_SEWA}}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="text-right"></p>
                                    <b>Invoice to</b><br>{{$sb->NAMA_CUSTOMER}},</b><br> {{$sb->TELEPHONE}},<br> {{$sb->ALAMAT}}.
                                </p>
                            </div>
                        </div>
                        <br>
                        <hr class="m-t-b-50">
                        <!-- <div class="table-responsive"> -->
                        <table class="table my-4">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($sewa_bus_category as $sbc)
                                @if($sbc->ID_SEWA_BUS == $sb->ID_SEWA_BUS)
                                <tr class="text-right" align="center">
                                    <td class="text-left" align="center">{{$sbc -> NAMA_CATEGORY}} - 
                                    {{$sbc -> TUJUAN_SEWA}}
                                    </td>
                                    <td class="text-right" >{{$sbc -> QUANTITY}}</td>
                                    <td class="text-right" >Rp. <?php echo number_format($sbc->PRICELIST_SEWA,'0',',','.'); ?></td>
                                    <td class="text-right" >Rp. <?php echo number_format($sbc->TOTAL,'0',',','.'); ?></td>
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr class="m-t-b-50">
                        <div class="text-right" align="right">
                            <p>Total Payment : Rp. <?php echo number_format($sb->total_payment,'0',',','.'); ?></p>
                            <h4 class="font-weight-800">DP (25%) : Rp. <?php echo number_format($sb->DP_BUS,'0',',','.'); ?></h4>
                            <!-- <p>Sisa Bayar : Rp <?php echo number_format($sb->SISA_SEWA_BUS,'0',',','.'); ?></p> -->
                        </div>
                        
                        
                    </div>
                    
                <!-- </div> -->
            </div>
            <br>
            <!-- <p class="text-danger">*Segera lakukkan konfirmasi pembayaran</p> -->
            <p class="text-left text-muted  m-t-100">
                                Silahkan Melakukkan Transfer sebesar DP (25%) :</p>
                                <h2 class="font-weight-800 color-red">[DP (25%)] : Rp <?php echo number_format($sb->DP_BUS,'0',',','.'); ?></h2>
                                <!-- <p class="text-left text-muted  m-t-100">Pada Bank : </p> -->
                                <h4 class="font-weight-800">Bank BTPN - 90260078897</h4>
                                <h4 class="font-weight-800">Atas Nama PT. MDC Trans</h4>
            <!-- <p class="text-danger">*Panduan pembayaran terdapat pada link di menu konfirmasi pembayaran</p> -->
            </p>
            <h5 class="text-center small text-muted  m-t-50" align="center">
                            <span class="row">
                                <span class="col-md-6 offset-8">
                                    <h3>*Note</h3>
                                    <h3 class="font-weight-800">Jika sudah transfer, silahkan melakukkan konfirmasi pembayaran</h3>
                                </span>
                            </span>
                        </h5>
        </div>
        
                        <h5 class="text-center small text-muted  m-t-50" align="center">
                            <span class="row">
                                <span class="col-md-6 offset-8">
                                    Invoice of PT. MDC Trans
                                </span>
                            </span>
                        </h5>
    </div>
</body>
</html>

