@extends('layouts.app')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))

<div class="page-header">
        <div class="page-title">
            <h3>E-commerce Dashboard</h3>
            <div>
                <!-- <div id="ecommerce-dashboard-daterangepicker" class="btn btn-outline-light">
                    <i class="ti-calendar mr-2 text-muted"></i>
                    <span></span>
                </div>
                <a href="#" class="btn btn-primary ml-2" data-toggle="dropdown">
                    <i class="ti-download"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item">Download</a>
                    <a href="#" class="dropdown-item">Print</a>
                </div> -->
            </div>
        </div>
    </div>

    <div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Payments Bus</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
        <thead>
                        <tr>
                            <th>Status Pengecekan</th>
                            <th>Id Pembayaran</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama Customer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pembayaran as $c)
                        @if($c->STATUS_BAYAR == 1)
                                    <!-- <tr class="table-light"> -->
                                    <td>
                                        <form class="post0" method="post" action="pembayaranupdateswitch">
                                        @csrf
                                            <input type="hidden" name="update1" value="{{$c->id}}">
                                            @if($c -> STATUS_BAYAR == 1)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked id="switch{{$c->id}}">
                                                <label class="custom-control-label" for="switch{{$c->id}}">New</label>
                                            </div>
                                            @else 
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch{{$c->id}}">
                                                <label class="custom-control-label" for="switch{{$c->id}}">Done</label>
                                            </div>
                                            @endif
                                        </form>
                                    </td>
                                    <td>KonfPemb00{{ $c -> id }}</td>
                                    <td>{{ $c -> ID_SEWA_BUS }}</td>
                                    <td>{{ $c -> NAMA_CUSTOMER }}</td>
                                    <td>
                                    
                                    <a href="{{ url('detailbayarbus', ['id'=>$c -> id]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>
                                    
                                    <a href="{{ url('printbayarbus', ['id'=>$c -> id]) }}">
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>

                                    </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Status Pengecekan</th>
                            <th>Id Pembayaran</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama Customer</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
            </table>
        </div>
    </div>

    <div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Payments Packages</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
        <thead>
                        <tr>
                            <th>Status Pengecekan</th>
                            <th>Id Pembayaran</th>
                            <th>Id Sewa Paket</th>
                            <th>Nama Customer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pembayaran_paket as $p)
                        @if($p -> STATUS_BAYAR == 1)
                                    <!-- <tr class="table-light"> -->
                                    <td>
                                        <form class="post0" method="post" action="pembayaran_paketupdateswitch">
                                        @csrf
                                            <input type="hidden" name="update1" value="{{$p->id_paket}}">
                                            @if($p -> STATUS_BAYAR == 1)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked id="switch{{$p->id_paket}}">
                                                <label class="custom-control-label" for="switch{{$p->id_paket}}">New</label>
                                            </div>
                                            @else 
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch{{$p->id_paket}}">
                                                <label class="custom-control-label" for="switch{{$p->id_paket}}">Done</label>
                                            </div>
                                            @endif
                                        </form>
                                    </td>
                                    <td>KonfPemb00{{ $p -> id_paket }}</td>
                                    <td>{{ $p -> ID_SEWA_PAKET }}</td>
                                    <td>{{ $p -> NAMA_CUSTOMER }}</td>
                                    <td>
                                    
                                    <a href="{{ url('detailbayarpaket', ['id_paket'=>$p -> id_paket]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>

                                    <a href="{{ url('printbayarpaket', ['id_paket'=>$p -> id_paket]) }}">
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>
                                    
                                    </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Status Pengecekan</th>
                            <th>Id Pembayaran</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama Customer</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
            </table>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Orders Bus</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Status Sewa</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama User</th>
                            <th>Nama Customer</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($sewa_bus as $sb)
                            @if($sb->STATUS_SEWA == 'Booking')
                                    @if($sb -> STATUS_SEWA == 'Booking')
                                    <td><span class="badge bg-success-bright text-secondary">{{ $sb -> STATUS_SEWA}}</span></td>
                                    @endif
                                    @if($sb -> STATUS_SEWA == 'Lunas')
                                    <td><span class="badge bg-success-bright text-success">{{ $sb -> STATUS_SEWA}}</span></td>
                                    @endif
                                    @if($sb -> STATUS_SEWA == 'On Schedule')
                                    <td><span class="badge bg-success-bright text-danger">{{ $sb -> STATUS_SEWA}}</span></td>
                                    @endif
                                    <td>{{ $sb -> ID_SEWA_BUS }}</td>
                                    <td>{{ $sb -> NAMA_PENGGUNA }}</td>
                                    <td>{{ $sb -> NAMA_CUSTOMER }}</td>
                                    <td>{{ $sb -> TGL_SEWA_BUS }}</td>
                                    <td>{{ $sb -> JAM_SEWA }}</td>
                                    <td>{{ $sb -> TGL_AKHIR_SEWA }}</td>
                                    <td>{{ $sb -> JAM_AKHIR_SEWA }}</td>
                                    <td>
                                    <a href="{{ url('datatable', ['id'=>$sb -> ID_SEWA_BUS]) }}">
                                    <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#exampleModal13">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <a href="invoice/{{$sb -> ID_SEWA_BUS}}">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-floating ml-2" title="Print Invoice" data-toggle="modal" data-target="#exampleModal14">
                                        <i class="ti-printer"></i>
                                    </button>
                                    </a>

                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModal13Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal13Label">Delete Data Sewa Bus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <p>Are you sure to Delete this Data?</p>
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="sewa_busdestroy/{{$sb -> ID_SEWA_BUS}}">
                                                        <button type="button" class="btn btn-primary" id="delete">Delete</button>
                                                        </a>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Status Sewa</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama User</th>
                            <th>Nama Customer</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>Action</th>
                            </tr>
                        </tfoot>
            </table>
        </div>
    </div>

<div class="card">
    <div class="card-body">
        <h6 class="card-title mb-0">Recent Orders Packages</h6>
    </div>
        <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Status Sewa</th>
                            <th>Id Sewa Paket Wisata</th>
                            <th>Nama User</th>
                            <th>Nama Customer</th>
                            <th>Nama Paket</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($sewa_paket_wisata as $spw)
                            @if($spw->STATUS_PAKET_WISATA == 'Booking')
                                    @if($spw -> STATUS_PAKET_WISATA == 'Booking')
                                    <td><span class="badge bg-success-bright text-secondary">{{ $spw -> STATUS_PAKET_WISATA}}</span></td>
                                    @endif
                                    @if($spw -> STATUS_PAKET_WISATA == 'Lunas')
                                    <td><span class="badge bg-success-bright text-success">{{ $spw -> STATUS_PAKET_WISATA}}</span></td>
                                    @endif
                                    @if($spw -> STATUS_PAKET_WISATA == 'On Schedule')
                                    <td><span class="badge bg-success-bright text-danger">{{ $spw -> STATUS_PAKET_WISATA}}</span></td>
                                    @endif
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $spw -> ID_SEWA_PAKET }}</td>
                                    <td>{{ $spw -> NAMA_PENGGUNA }}</td>
                                    <td>{{ $spw -> NAMA_CUSTOMER }}</td>
                                    <td>{{ $spw -> NAMA_PAKET }}</td>
                                    <td>{{ $spw -> TGL_SEWA_PAKET }}</td>
                                    <td>{{ $spw -> JAM_SEWA_PAKET }}</td>
                                    <td>{{ $spw -> TGL_AKHIR_SEWA_PAKET }}</td>
                                    <td>{{ $spw -> JAM_AKHIR_SEWA_PAKET }}</td>
                                    <td>
                                    <a href="sewa_paket_detail/{{$spw -> ID_SEWA_PAKET}}">
                                    <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#exampleModal13">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <a href="{{ url('invoicepaket', ['ID_SEWA_PAKET'=>$spw -> ID_SEWA_PAKET]) }}">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-floating ml-2" title="Print Invoice" data-toggle="modal" data-target="#exampleModal14">
                                        <i class="ti-printer"></i>
                                    </button>
                                    </a>
                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal13" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModal13Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal13Label">Delete Data Sewa Paket Wisata</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <p>Are you sure to Delete this Data?</p>
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="sewa_paketdestroy/{{$spw -> ID_SEWA_PAKET}}">
                                                        <button type="button" class="btn btn-primary" id="delete">Delete</button>
                                                        </a>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Status Sewa</th>
                            <th>Id Sewa Bus</th>
                            <th>Nama User</th>
                            <th>Nama Customer</th>
                            <th>Nama Paket</th>
                            <th>Start Date</th>
                            <th>Start Time</th>
                            <th>End Date</th>
                            <th>End Time</th>
                            <!-- <th>DP Sewa</th>
                            <th>Harga Sewa</th> -->
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        
            </table>
        </div>
    </div>


    <!-- <div class="row">
        <div class="col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex justify-content-between">
                        <h6 class="card-title">Revenue by Country</h6>
                        <div>
                            <a href="#" class="btn btn-outline-light btn-sm btn-floating mr-2">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown"
                                   class="btn btn-outline-light btn-sm btn-floating"
                                   aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Total Revenue</p>
                    <h2 class="mb-4">$469,453</h2>
                    <div class="progress mb-3" style="height: 10px">
                        <div class="progress-bar bg-secondary" style="width: 30%" role="progressbar"></div>
                        <div class="progress-bar bg-info" style="width: 12%" role="progressbar"></div>
                        <div class="progress-bar bg-warning" style="width: 20%" role="progressbar"></div>
                        <div class="progress-bar bg-success" style="width: 18%" role="progressbar"></div>
                        <div class="progress-bar bg-danger" style="width: 20%" role="progressbar"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                Russia
                            </p>
                            <h5 class="mt-2 mb-0">30%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-info mr-1"></span>
                                Australia
                            </p>
                            <h5 class="mt-2 mb-0">12%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-warning mr-1"></span>
                                China
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-success mr-1"></span>
                                Tunisia
                            </p>
                            <h5 class="mt-2 mb-0">18%</h5>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <p class="mb-0">
                                <span class="fa fa-circle text-danger mr-1"></span>
                                Spain
                            </p>
                            <h5 class="mt-2 mb-0">20%</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="card border-0 bg-info-bright">
                <div class="card-body">
                    <div class="text-center">
                        <p>Total sales this month</p>
                        <h2>$158,000</h2>
                        <p>This chart shows total sales. You can use the button below for details of this
                            month's sales.</p>
                        <div class="mt-4">
                            <a href="#" class="btn btn-info">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Reviews</h6>
                    <div class="card-scroll">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar1.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar2.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(3.5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar3.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-half-o text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(4.5)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                            <li class="list-group-item d-flex px-0 py-4">
                                <a href="#" class="flex-shrink-0">
                                    <figure class="avatar mr-3">
                                        <img src="{{ url('assets/media/image/user/man_avatar4.jpg') }}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                </a>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <a href="#">
                                            <h6>Valentine Maton</h6>
                                            <ul class="list-inline mb-1">
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star text-warning"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li class="list-inline-item mb-0">(4)</li>
                                            </ul>
                                        </a>
                                        <div class="ml-auto">
                                            <div class="dropdown">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn btn-outline-light btn-sm btn-floating"
                                                   aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item">View</a>
                                                    <a href="#" class="dropdown-item">Send Message</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio, tempora.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="#" class="btn btn-outline-light">
                            View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h6 class="card-title mb-0">Best Sellers of the Week</h6>
                        <a href="#">All Sales</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-right">Total Sales</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a href="#">Flowerpot</a>
                            </td>
                            <td class="text-right">21</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Vase <span class="badge badge-danger ml-1">New</span></a>
                            </td>
                            <td class="text-right">52</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Night light</a>
                            </td>
                            <td class="text-right">74</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Desk</a>
                            </td>
                            <td class="text-right">25</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Glasses</a>
                            </td>
                            <td class="text-right">11</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Wall Clock</a>
                            </td>
                            <td class="text-right">8</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Armchair</a>
                            </td>
                            <td class="text-right">5</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Shoe</a>
                            </td>
                            <td class="text-right">5</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body text-center pt-0">
                    <a href="#" class="btn btn-outline-light">
                        View All
                    </a>
                </div>
            </div>
        </div>
    </div> -->

@endif
@endsection

@section('script')
<script>
const x = document.getElementsByClassName('post0');
            for(let i=0;i<x.length;i++){
                x[i].addEventListener('click',function(){
                    x[i].submit();
                });
            }
</script>
<!-- Apex chart -->
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="{{ url('/vendors/charts/apex/apexcharts.min.js') }}"></script>

<!-- Daterangepicker -->
<script src="{{ url('vendors/datepicker/daterangepicker.js') }}"></script>

<!-- DataTable -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

<!-- Dashboard scripts -->
<script src="{{ url('assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>
@endsection