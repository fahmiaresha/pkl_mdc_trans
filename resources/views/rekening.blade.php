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
                    <h6 class="card-title mb-0">Table Rekening</h6>
                </div>
                <div class="table-responsive">
                <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Tambah Data Rekening
                    </button>
                    </center>
                        <!-- modal -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModal1Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal1Label">Tambah Data Rekening</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="ti-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="rekeningstore" method="post">
                                    @csrf
                                    <div class="form-group">
                                                <label for="namabank" class="col-form-label">Nama Bank :</label>
                                                    <input type="text" class="form-control" id="namabank" name="namabank">
                                            </div>
                                            <div class="form-group">
                                                <label for="norek" class="col-form-label">No. Rekening :</label>
                                                    <input type="text" class="form-control" id="norek" name="norek">
                                            </div>
                                            <div class="form-group">
                                                <label for="atasnama" class="col-form-label">Atas Nama :</label>
                                                    <input type="text" class="form-control" id="atasnama" name="atasnama">
                                            </div>
                                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="berhasil">Add</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                        </div>
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id Rekening</th>
                            <th>Nama Bank</th>
                            <th>No. Rekening</th>
                            <th>Atas Nama</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($rekening as $c)
                                    <!-- <tr class="table-light"> -->
                                    <td>{{ $c -> ID_REKENING }}</td>
                                    <td>{{ $c -> NAMA_BANK }}</td>
                                    <td>{{ $c -> NOMOR_REKENING }}</td>
                                    <td>{{ $c -> ATAS_NAMA }}</td>
                                    <td>
                                    
                                    <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12{{$c -> ID_REKENING}}">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    
                                    <!-- modal -->
                                        <div class="modal fade" id="exampleModal12{{$c -> ID_REKENING}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModal12Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal12Label">Edit Data Rekening</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i class="ti-close"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <form action="rekeningupdate" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $c->ID_REKENING }}"> <br/>
                                                <div class="form-group">
                                                        <label for="namabank" class="col-form-label">Nama Bank :</label>
                                                            <input type="text" class="form-control" id="namabank" name="namabank" value="{{ $c -> NAMA_BANK }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="norek" class="col-form-label">No. Rekening :</label>
                                                            <input type="text" class="form-control" id="norek" name="norek" value="{{ $c -> NOMOR_REKENING }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="atasnama" class="col-form-label">Atas Nama :</label>
                                                            <input type="text" class="form-control" id="atasnama" name="atasnama" value="{{ $c -> ATAS_NAMA }}">
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
                                    
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete" data-toggle="modal" data-target="#exampleModal13{{$c -> ID_REKENING}}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    
                                        <!-- modal -->
                                            <div class="modal fade" id="exampleModal13{{$c -> ID_REKENING}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModal13Label" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModal13Label">Delete Rekening</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="ti-close"></i>
                                                            </button>
                                                        </div>
                                                        
                                                        <div class="modal-body">
                                                            <p>Are you sure to Delete this Data?</p>
                                                        </div>
                                                        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="rekeningdestroy/{{$c -> ID_REKENING}}">
                                                        <button type="button" class="btn btn-primary" id="delete">Delete</button>
                                                        </a>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                    <!-- </tr> -->
                                    </tbody>
                                    <tfoot>
                        <tr>
                            <th>Id Rekening</th>
                            <th>Nama Bank</th>
                            <th>No. Rekening</th>
                            <th>Atas Nama</th>
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
