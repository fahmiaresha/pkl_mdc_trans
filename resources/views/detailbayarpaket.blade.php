@extends('layouts.app')

@section('head')
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>Pembayaran Detail</h3>
            <!-- <div class="dropdown">
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-settings mr-2"></i> Actions
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div> -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
   
            <div class="card">
                <div class="card-body">
                    <div class="gallery-container row">
                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="slider-for">
                                <div class="slick-slide-item">
                                    <img src="{{ url('buktiTF_Paket/'.$pembayaran_paket->BUKTI_TF) }}" class="rounded" alt="image">
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">Pembayaran</p>
                                <span class="d-flex align-items-center">
                                <i class="fa fa-heart text-danger mr-2"></i>
                            </span>
                            </div>
                            <h2>{{$pembayaran_paket->ID_SEWA_PAKET}}</h2>
                            <h2><span class="badge bg-success-bright text-primary">{{$customer->NAMA_CUSTOMER}}</span></h2>
                            <div><label>&nbsp;</label></div>
                            <div><label>&nbsp;</label></div>
                            <ul class="list-unstyled">
                                <li>
                                    Transfer ke Rekening : <span class="badge bg-success-bright text-success">{{$rekening->NAMA_BANK}} - {{$rekening->NOMOR_REKENING}}</span>
                                </li>
                                <li>
                                    Pembayaran Via : <span class="badge bg-warning-bright text-warning">{{$pembayaran_paket->CARA_BAYAR}}</span>
                                <li>
                                    Tanggal Bayar : <span class="badge bg-success-bright text-success">{{$pembayaran_paket->TGL_BAYAR}}</span>
                                <li>
                                    Jumlah Bayar : <span class="badge bg-warning-bright text-warning">Rp. <?php echo number_format($pembayaran_paket->JUMLAH_BAYAR,'0',',','.'); ?></span>
                                <li>
                                    Bank Pengirim : <span class="badge bg-success-bright text-success">{{$pembayaran_paket->NAMA_BANK_PENGIRIM}}</span>
                                <li>
                                    Norek Pengirim : <span class="badge bg-warning-bright text-warning">{{$pembayaran_paket->NOREK_PENGIRIM}}</span>
                                <li>
                                    Atas Nama : <span class="badge bg-success-bright text-success">{{$pembayaran_paket->ATAS_NAMA}}</span>
                                <li>
                                    Keterangan : <span class="badge bg-warning-bright text-warning">{{$pembayaran_paket->KETERANGAN}}</span>
                            </ul>
                            <div><label>&nbsp;</label></div>
                            <div><label>&nbsp;</label></div>
                            <h2>PT. Medina Dzikra Cemerlang Trans</h2>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check mr-2 text-primary"></i>JL. Suwoko No. 43 A Lamongan - Jawa Timur.
                                </li>
                                <li><i class="fa fa-check mr-2 text-primary"></i>Telp : (0322) 3101285.
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
            </div>

            
                            

        </div>
    </div>

@endsection

@section('script')
    <!-- Slick js -->
    <script src="{{ url('vendors/slick/slick.min.js') }}"></script>

    <script src="{{ url('assets/js/examples/pages/product-detail.js') }}"></script>
@endsection
