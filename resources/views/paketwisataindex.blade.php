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
<div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-0">Table Paket Wisata</h6>
                </div>
                <div class="table-responsive">
                <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Tambah Data Paket Wisata
                    </button>
                    </center>
                        <!-- modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal1Label">Tambah Data Paket Wisata</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="paketwisatastore" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="namapaket" class="col-form-label">Nama Paket Wisata :</label>
                                    <input type="namapaket" class="form-control" id="namapaket" name="namapaket">
                                    </div>
                           
                                <div class="form-group">
                                    <label for="hargapaket" class="col-form-label">Harga Paket :</label>
                                    <input type="hargapaket" class="form-control" id="hargapaket" name="hargapaket">
                                    </div>
                                <div class="form-group">
                                    <label for="hargajual" class="col-form-label">Harga Jual :</label>
                                    <input type="hargajual" class="form-control" id="hargajual" name="hargajual">
                                    </div>
                                <div class="form-group">
                                    <label for="tempatkunjung" class="col-form-label">Tempat Kunjung :</label>
                                    <textarea type="text" class="form-control" id="tempatkunjung" name="tempatkunjung"></textarea>
                                    </div>
                                <div class="form-group">
                                    <label for="fasilitas" class="col-form-label">Fasilitas :</label>
                                    <textarea type="text" class="form-control" id="fasilitas" name="fasilitas"></textarea>
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="berhasil">Add Paket</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id Paket</th>
                            <th>Nama Paket Wisata</th>
                            <!-- <th>Tipe Paket</th> -->
                            <th>Harga (1 Orang)</th>
                            <th>Harga Paket (Full)</th>
                            <!-- <th>Tempat Kunjung</th> -->
                            <th>Detail</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($paket_wisata as $pw)
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $pw -> ID_PAKET }}</td>
                                    <td>{{ $pw -> NAMA_PAKET }}</td>
                                    <!-- <td>{{ $pw -> TIPE_PAKET }}</td> -->
                                    <td>
                                    Rp <?php echo number_format($pw->HARGA_PAKET,'0',',','.'); ?>
                                    </td>
                                    <td>
                                    Rp <?php echo number_format($pw->HARGA_JUAL,'0',',','.'); ?>
                                    </td>
                                    <!-- <td>{{ $pw -> TEMPAT_KUNJUNG }}</td>
                                    <td>{{ $pw -> FASILITAS_PAKET }}</td> -->
                                    <td>
                                    <a href="{{ url('detailindexpaket', ['id'=>$pw -> ID_PAKET]) }}">
                                    <button type="button" class="btn btn-outline-secondary">
                                        <i class="ti-calendar mr-2"></i>Detail
                                    </button>
                                    </a>
                                    </td>
                                    <td>
                                    @php $x=0; @endphp
                                        @foreach($sewa_paket_wisata as $sbc)
                                            @if($pw->ID_PAKET == $sbc->ID_PAKET)
                                    @php $x=1; @endphp
                                            @endif
                                        @endforeach

                                    @if($x==1)
                                            <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#tampil">
                                                <i class="ti-pencil"></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#tampil">
                                                <i class="ti-trash"></i>
                                            </button>

                                            <div class="modal" id="tampil" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content border">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Sorry, data sedang digunakan</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @else
                                    <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12{{$pw -> ID_PAKET}}">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    
                                    <!-- modal -->
                                        <div class="modal fade" id="exampleModal12{{$pw -> ID_PAKET}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModal12Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal12Label">Edit Data Paket</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <form action="paketwisataupdate" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $pw->ID_PAKET }}"> <br/>
                                                <div class="form-group">
                                                    <label for="namapaket" class="col-form-label">Nama Paket Wisata :</label>
                                                        <input type="namapaket" class="form-control" id="namapaket" name="namapaket" value="{{ $pw->NAMA_PAKET }}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="hargapaket" class="col-form-label">Harga Paket :</label>
                                                        <input type="hargapaket" class="form-control" id="hargapaket" name="hargapaket" value="{{ $pw->HARGA_PAKET }}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="hargajual" class="col-form-label">Harga Jual :</label>
                                                        <input type="hargajual" class="form-control" id="" name="hargajual" value="{{ $pw->HARGA_JUAL }}">
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="tempatkunjung" class="col-form-label">Tempat Kunjung :</label>
                                                        <textarea type="tempatkunjung" class="form-control" id="tempatkunjung" name="tempatkunjung">{{$pw->TEMPAT_KUNJUNG}}</textarea>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="fasilitas" class="col-form-label">Fasilitas :</label>
                                                        <textarea type="fasilitas" class="form-control" id="fasilitas" name="fasilitas">{{$pw->FASILITAS_PAKET}}</textarea>
                                                        </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="edit">Save Changes</button>
                                            </div>
                                            </form>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#exampleModal13{{$pw -> ID_PAKET}}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    
                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal13{{$pw -> ID_PAKET}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModal13Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal13Label">Delete Data Paket</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <p>Are you sure to Delete this Data?</p>
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="paketwisatadestroy/{{$pw -> ID_PAKET}}">
                                                        <button type="button" class="btn btn-primary" id="delete">Delete</button>
                                                        </a>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Id Paket</th>
                            <th>Nama Paket Wisata</th>
                            <!-- <th>Tipe Paket</th> -->
                            <th>Harga (1 Orang)</th>
                            <th>Harga Paket (Full)</th>
                            <th>Detail</th>
                            <!-- <th>Fasilitas</th> -->
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    </table>
                </div>
                
        </div>
    </div>

@endif
@endsection

@section('script')
<script>
    $(document).ready(function (){
    $('#myTable').DataTable();

});


</script>
    <!-- Sweet alert -->
    <script src="{{ url('assets/js/examples/sweet-alert.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>

     <!-- DataTable -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <script src="{{ url('assets/js/examples/datatable.js') }}"></script>

    <!-- Javascript -->
    <script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>

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

<script> 
swal(berhasil,"Good job!", "You clicked the button!", "success");
</script>

@endsection
