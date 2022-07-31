@extends('layouts.app')

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))
    <div class="page-header">
        <div class="page-title">
            <h3>Invoice</h3>
        </div>
    </div>
@foreach($sewa_paket_wisata as $spw)
@endforeach
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <img src="{{ url('assets/media/image/logo/mdc.png') }}" alt="logo">
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
                        <div class="table-responsive">
                            <table class="table my-4">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Harga (/Orang)</th>
                                    <th >Total Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-right">
                                    <td class="text-left">{{$spw->NAMA_PAKET}}</td>
                                    <td class="text-left">Rp. <?php echo number_format($spw->HARGA_PAKET,'0',',','.'); ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($spw->HARGA_JUAL,'0',',','.'); ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <p>Total : Rp. <?php echo number_format($spw->HARGA_JUAL,'0',',','.'); ?></p>
                            <p>DP (25%) : Rp. <?php echo number_format($spw->DP_PAKET,'0',',','.'); ?></p>
                            <h4 class="font-weight-800">Sisa Bayar : Rp <?php echo number_format($spw->SISA_SEWA_PAKET,'0',',','.'); ?></h4>
                        </div>
                        <p class="text-center small text-muted  m-t-50">
                            <span class="row">
                                <span class="col-md-6 offset-3">
                                    Invoice of PT. MDC Trans
                                </span>
                            </span>
                        </p>
                    </div>
                    <div class="text-right d-print-none">
                        <hr class="my-5">
                        <!-- <a href="#" class="btn btn-primary">Send Invoice</a> -->
                        <a href="javascript:window.print()" class="btn btn-success m-l-5">
                            <i class="ti-printer mr-2"></i> Print
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif
@endsection
