<!-- <head>
	<title>Laporan Sales PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> -->
<head>
	<title>Laporan Pembayaran Paket Wisata PDF</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css"> -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>
<body>
<!-- <style type="text/css">
		table, th, td {
  border: 1px solid black;
}
	</style> -->
    <style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        background: #FFDEAD;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
	<!-- <center>
		<h5>Laporan Data Sales</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/"></a></h5>
	</center> -->
 <br>
<body>
<div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <!-- <img src="{{ url('asset/vegfoods/images/mdc.png') }}" alt="logo"> -->
                            <h3 class="text-xs-left m-b-0" align="center">Laporan Pembayaran</h3>
                            </br>
                            <h3 class="text-xs-left m-b-0" align="center">({{$tgl_awal}}) - ({{$tgl_akhir}})</h3>
                            </br>
                            <h3 class="text-xs-left m-b-0" align="center">PT. MDC Trans Lamongan</h3>
                        </div>
                        <br/>
                        <br/>
                        <!-- <div class="table-responsive"> -->
                        <table class="table my-4" align="center">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Tanggal Sewa</th>
                                <th>Nama Paket</th>
                                <th>DP</th>
                                <th>Harga (/orang)</th>
                                <th>Total Biaya</th>
                                <th>Ket</th>
                                <th>Jumlah Bayar</th>
                                </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($laporan_pembayaran as $spw)
                            <tr>
                                    <td class="text-center">{{ $spw -> ID_SEWA_PAKET }}</td>
                                    <td class="text-center">{{ $spw -> TGL_SEWA_PAKET }}</td>
                                    <td class="text-center">{{ $spw -> NAMA_PAKET }}</td>
                                    <td>Rp. <?php echo number_format($spw->DP_PAKET,'0',',','.'); ?></td>
                                    <td>Rp. <?php echo number_format($spw->HARGA_PAKET,'0',',','.'); ?></td>
                                    <td>Rp. <?php echo number_format($spw->HARGA_JUAL,'0',',','.'); ?></td>
                                    <td class="text-center">{{ $spw -> JENIS_BAYAR }}</td>
                                    <td>Rp. <?php echo number_format($spw->JUMLAH_BAYAR,'0',',','.'); ?></td>
                            @endforeach
                                    </tbody>
                            </table>
                        </div>
                        
                        </br>
                        @php $sum=0; @endphp
                            @foreach($laporan_pembayaran as $l)
                                @php
                                    $sum=$sum+($l->JUMLAH_BAYAR);
                                @endphp
                            @endforeach
                        
                        <h3 class="text-xs-left m-b-0" align="left">Total Pendapatan = Rp. @php echo number_format($sum,'0',',','.'); @endphp</h3>
                        <h5 class="text-xs-left m-b-0" align="left">*Total Pendapatan diambil dari total jumlah bayar</h5>
                        
                        
                    </div>
                    
                <!-- </div> -->
            </div>

        </div>
    </div>
</body>
</html>

