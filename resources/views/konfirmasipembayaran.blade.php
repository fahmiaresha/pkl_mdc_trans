@extends('layouts.app')

@section('head')
    <!-- Slick -->
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/vendors/slick/slick-theme.css') }}" type="text/css">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- Css -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- Prism -->
    <link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))  

<div class="page-header">
        <div class="page-title">
            <h3>Laporan Pembayaran</h3>
            <div>
                <!-- <div id="ecommerce-dashboard-daterangepicker" class="btn btn-outline-light">
                    <i class="ti-calendar mr-2 text-muted"></i>
                    <span></span>
                </div> -->
                 
                    <form action="input_tgl" method="post">
                        {{ csrf_field() }}
                        <div class="form-row mr-3">
                            <div class="col-md-5 mb-3">
                                <label for="tgl_awal">Start Date :</label>
                                    <input type="date" class="form-control" id="tgl_awal1" name="tgl_awal">
                            </div>
                                            
                            <div class="col-md-5 mb-3">
                                <label for="tgl_akhir">End Date :</label>
                                    <input type="date" class="form-control" id="tgl_akhir1" name="tgl_akhir">
                            </div>
                            <div class="col-md-2 mb-3">
                                <button type="submit" class="btn btn-primary" id="berhasil" style="margin-top:30px;">Submit</button>
                            </div>
                        </div>
                    </form>

                <!-- <a href="#" class="btn btn-primary ml-2" data-toggle="dropdown">
                    <i class="ti-download"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="/export_sewa_bus" class="dropdown-item">Excel</a>
                    <a href="/pdf_sewa_bus" class="dropdown-item">PDF</a>
                </div> -->
            </div>
        </div>
        @if (session('laporan'))
            @php $x=session('laporan_pembayaran'); @endphp
            @php $tgl_awal=session('tgl_awal'); @endphp
            @php $tgl_akhir=session('tgl_akhir'); @endphp
            <div>
                    <center>
                    <a href="/pdf_sewa_bus/{{$tgl_awal}}/{{$tgl_akhir}}" target="_blank">
                        <div class="btn btn-outline-primary">
                            <i class="ti-download text-muted" title="Print" ></i>
                         </div>
                    </a>
                    </center>
            </div>
        <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($x as $lc)
                                    <!-- <tr class="table-light"> -->
                                    <td>
                                        <form class="post0" method="post" action="pembayaranupdateswitch">
                                        @csrf
                                            <input type="hidden" name="update1" value="{{ $lc->id}}">
                                            @if($lc -> STATUS_BAYAR == 1)
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked id="switch{{ $lc->id}}">
                                                <label class="custom-control-label" for="switch{{ $lc->id}}">New</label>
                                            </div>
                                            @else 
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="switch{{ $lc->id}}">
                                                <label class="custom-control-label" for="switch{{ $lc->id}}">Done</label>
                                            </div>
                                            @endif
                                        </form>
                                    </td>
                                    <td class="text-center">
                                    @if($lc-> ID_JENIS == '1')
                                    <span class="text-danger"><h5>DP (25%)</h5></span>
                                    @endif
                                    @if($lc-> ID_JENIS == '2')
                                    <span class="text-success"><h5>Lunas</h5></span>
                                    @endif
                                    </td>
                                    <!-- <td>KonfPemb00{{ $lc -> id }}</td> -->
                                    <td class="text-center">{{ $lc -> ID_SEWA_BUS }}</td>
                                    <td class="text-center">{{ $lc -> NAMA_CUSTOMER }}</td>
                                    <td class="text-center">
                                    
                                    <a href="{{ url('detailbayarbus', ['id'=> $lc -> id]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>
                                    
                                    <a href="{{ url('printbayarbus', ['id'=> $lc -> id]) }}" target="_blank">
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>

                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
    @endif
    </div>

<div class="card" id="data_pembayaran">
                <div class="card-body">
                    <h6 class="card-title mb-0">Table Pembayaran</h6>
                </div>
                <div class="table-responsive">
                
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($pembayaran as $c)
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
                                    <td class="text-center">
                                    @if($c-> ID_JENIS == '1')
                                    <span class="text-danger"><h5>DP (25%)</h5></span>
                                    @endif
                                    @if($c-> ID_JENIS == '2')
                                    <span class="text-success"><h5>Lunas</h5></span>
                                    @endif
                                    </td>
                                    <!-- <td>KonfPemb00{{ $c -> id }}</td> -->
                                    <td class="text-center">{{ $c -> ID_SEWA_BUS }}</td>
                                    <td class="text-center">{{ $c -> NAMA_CUSTOMER }}</td>
                                    <td class="text-center">
                                    
                                    <a href="{{ url('detailbayarbus', ['id'=>$c -> id]) }}">
                                    <button type="button" class="btn btn-outline-success">
                                        <i class="ti-money mr-2"></i>Detail
                                    </button>
                                    </a>
                                    
                                    <a href="{{ url('printbayarbus', ['id'=>$c -> id]) }}" target="_blank"> 
                                    <button type="button" class="btn btn-outline-warning">
                                        <i class="ti-printer mr-2"></i>Print
                                    </button>
                                    </a>

                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th class="text-center">Status Pengechekan</th>
                            <th class="text-center">Pembayaran</th>
                            <!-- <th>Id Pembayaran</th> -->
                            <th class="text-center">Id Sewa Bus</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    </table>
                </div>
                
        <!-- </div> -->

        

    </div>
    </div>
   
@endif
@endsection

@section('script')
<script>
    $(document).ready(function (){
    $('#myTable').DataTable();
});
const x = document.getElementsByClassName('post0');
            for(let i=0;i<x.length;i++){
                x[i].addEventListener('click',function(){
                    x[i].submit();
                });
            }
</script>
    <!-- Sweet alert -->
    <script src="{{ url('assets/js/examples/sweet-alert.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>

     <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/datatable.js') }}"></script>

    <!-- Daterangepicker -->
    <script src="{{ url('vendors/datepicker/daterangepicker.js') }}"></script>

    <!-- Javascript -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

    <!-- Dashboard scripts -->
    <script src="{{ url('assets/js/examples/pages/ecommerce-dashboard.js') }}"></script>

    <script>  
    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

toastr.success('Successfully completed');
    </script>
@if (session('laporan'))
    <script>
        $('#data_pembayaran').hide();
    </script>
@endif

@endsection
