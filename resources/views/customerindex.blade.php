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
                    <h6 class="card-title mb-0">Table Customer</h6>
                </div>
                <div class="table-responsive">
                <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Tambah Data Customer
                    </button>
                    </center>
                        <!-- modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal1Label">Tambah Data Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <form action="customerstore" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama" class="col-form-label">Nama :</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email :</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                <div class="form-group">
                                    <label for="telephone" class="col-form-label">Telephone :</label>
                                    <input type="telephone" class="form-control" id="telephone" name="telephone">
                                    </div>
                                <div class="form-group">
                                    <label for="alamat" class="col-form-label">Alamat :</label>
                                    <input type="alamat" class="form-control" id="alamat" name="alamat">
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="berhasil">Add Customer</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id Customer</th>
                            <th>Nama Customer</th>
                            <th>Email Customer</th>
                            <th>Telephone Customer</th>
                            <th>Alamat Customer</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($customer as $cus)
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $cus -> ID_CUSTOMER }}</td>
                                    <td>{{ $cus -> NAMA_CUSTOMER }}</td>
                                    <td>{{ $cus -> EMAIL_CUSTOMER }}</td>
                                    <td>{{ $cus -> TELEPHONE }}</td>
                                    <td>{{ $cus -> ALAMAT }}</td>
                                    <td>
                                    @php $x=0; @endphp
                                        @foreach($sewa_bus as $sb)
                                        @foreach($sewa_paket_wisata as $spw)
                                            @if($cus->ID_CUSTOMER == $sb->ID_CUSTOMER or $cus->ID_CUSTOMER == $spw->ID_CUSTOMER)
                                    @php $x=1; @endphp
                                            @endif
                                        @endforeach
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

                                    <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12{{$cus -> ID_CUSTOMER}}">
                                        <i class="ti-pencil"></i>
                                    </button>

                                    <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#exampleModal13{{$cus -> ID_CUSTOMER}}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    
                                    <!-- modal -->
                                        <div class="modal fade" id="exampleModal12{{$cus -> ID_CUSTOMER}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModal12Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal12Label">Edit Data Customer</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <form action="customerupdate" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $cus->ID_CUSTOMER }}"> <br/>
                                                <div class="form-group">
                                                    <label for="nama" class="col-form-label">Nama :</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $cus->NAMA_CUSTOMER }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="col-form-label">Email :</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $cus->EMAIL_CUSTOMER }}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="telephone" class="col-form-label">Telephone :</label>
                                                    <input type="telephone" class="form-control" id="telephone" name="telephone" value="{{ $cus->TELEPHONE }}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="alamat" class="col-form-label">Alamat :</label>
                                                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="{{ $cus->ALAMAT }}">
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
                                    
                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal13{{$cus -> ID_CUSTOMER}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModal13Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal13Label">Delete Data Customer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <p>Are you sure to Delete this Data?</p>
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="customerdestroy/{{$cus -> ID_CUSTOMER}}">
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
                            <th>Id Customer</th>
                            <th>Nama Customer</th>
                            <th>Email Customer</th>
                            <th>Telephone Customer</th>
                            <th>Alamat Customer</th>
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

    function modal(id){
        const y=document.getElementById(id);
            $("#exampleModal12").modal();
        }

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
