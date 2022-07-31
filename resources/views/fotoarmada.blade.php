@extends('layouts.app')

@section('head')
    <!-- Slick css -->
    <link rel="stylesheet" href="{{ url('vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('vendors/slick/slick-theme.css') }}" type="text/css">
@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>Armada Detail</h3>
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
                                    <img src="{{ url('foto/'.$armada->avatar) }}" class="rounded" alt="image">
                                </div>
                            </div>
                           
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <p class="text-muted mb-0">Armada</p>
                                <span class="d-flex align-items-center">
                                <i class="fa fa-heart text-danger mr-2"></i>
                            </span>
                            </div>
                            <h2>{{$armada->PLAT_NOMOR}}</h2>
                            @if($armada -> STATUS_ARMADA == 1)
                            <p>
                                <span class="badge bg-success-bright text-success">Active</span>
                            </p>
                            @else 
                            <p>
                                <span class="badge bg-success-bright text-danger">Non - Active</span>
                            </p>
                            @endif
                            <ul class="list-unstyled">
                                <li><i class="fa fa-check mr-2 text-warning"></i>{{$armada->FASILITAS_ARMADA}}
                                </li>
                            </ul>
                                <div class="font-size-30 mb-2"> Kapasitas :
                            
                                {{$armada->KAPASITAS}} Penumpang
                            </div>
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
