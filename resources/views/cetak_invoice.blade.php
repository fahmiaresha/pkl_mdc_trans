@extends('layouts.app')

@section('content')
<!DOCTYPE html>  
 <html>   
 <head>   
  <title>Kuitansi Sederhana</title>   
 </head>   
 <body>   
 <style>
    /* @page { size: 15cm 22cm landscape; } */
</style>
<div class="page-header">
        <div class="page-title">
            <h3>Invoice</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            
                            <h3 class="text-xs-left m-b-0">#INV-{{$sewa_bus->ID_SEWA_BUS}}</h3>
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
                                <b>{{$pengguna->NAMA_PENGGUNA}},</b><br>{{$sewa_bus->TGL_SEWA_BUS}}   -   {{$sewa_bus->TGL_AKHIR_SEWA}}
                                <br>{{$sewa_bus->JAM_SEWA}}       -      {{$sewa_bus->JAM_AKHIR_SEWA}}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-right">
                                    <b>Invoice to</b>
                                </p>
                                <p class="text-right"> {{$customer->NAMA_CUSTOMER}},<br> {{$customer->TELEPHONE}},<br> {{$customer->ALAMAT}}.
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
                                @if($sbc->ID_SEWA_BUS == $sewa_bus->ID_SEWA_BUS)
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
                            <p>Total : Rp. <?php echo number_format($sewa_bus->total_payment,'0',',','.'); ?></p>
                            <p>DP (25%) : Rp. <?php echo number_format($sewa_bus->DP_BUS,'0',',','.'); ?></p>
                            <h4 class="font-weight-800">Sisa Bayar : Rp <?php echo number_format($sewa_bus->SISA_SEWA_BUS,'0',',','.'); ?></h4>
                        </div>
                        <p class="text-center small text-muted  m-t-50">
                            <span class="row">
                                <span class="col-md-6 offset-3">
                                    Invoice of PT. MDC Trans
                                </span>
                            </span>
                        </p>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</body>   
</html> 
@endsection