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
        <h6 class="card-title mb-0">Table Testimony</h6>
    </div>
    <div class="table-responsive">
        <center>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Tambah Data Testimony
            </button>
        </center>
        <!-- modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal1Label">Tambah Data Testimony</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="testimony_store" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="NAMA_TESTI" class="col-form-label">Nama Tester :</label>
                                <input type="text" class="form-control" id="NAMA_TESTI" name="NAMA_TESTI">
                            </div>
                            <div class="form-group">
                                <label for="TESTIMONY" class="col-form-label">Testimony :</label>
                                <textarea type="text" class="form-control" id="TESTIMONY" name="TESTIMONY"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="berhasil">Add Testimony</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Status</th>
                    <!-- <th>Id Testimony</th> -->
                    <th>Nama Tester</th>
                    <th>Testimony</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($testimony as $tes)

                    <!-- <tr class="table-light"> -->
                    <td>
                        <form class="post0" method="post" action="testimony_updateswitch">
                            @csrf
                            <input type="hidden" name="testi" value="{{$tes -> ID_TESTI}}">
                            @if($tes -> STATUS == 1)
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked
                                    id="switch{{$tes -> ID_TESTI}}">
                                <label class="custom-control-label" for="switch{{$tes -> ID_TESTI}}">Show</label>
                            </div>
                            @else
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="switch{{$tes -> ID_TESTI}}">
                                <label class="custom-control-label" for="switch{{$tes -> ID_TESTI}}">Not</label>
                            </div>
                            @endif
                        </form>
                    </td>
                    <!-- <td>{{ $tes -> ID_TESTI }}</td> -->
                    <td>{{ $tes -> NAMA_TESTI }}</td>
                    <td>{{ $tes -> TESTIMONY }}</td>
                    <td>
                        <!-- <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit" data-toggle="modal" data-target="#exampleModal12{{$tes -> ID_TESTI}}">
                                                <i class="ti-pencil"></i>
                                            </button> -->

                        <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete"
                            data-toggle="modal" data-target="#exampleModal13{{$tes -> ID_TESTI}}">
                            <i class="ti-trash"></i>
                        </button>

                        <!-- modal -->
                        <div class="modal fade" id="exampleModal12{{$tes -> ID_TESTI}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModal12Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal12Label">Edit Data Testimony</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="ti-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="testimonyupdate" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $tes->ID_TESTI }}"> <br />
                                            <div class="form-group">
                                                <label for="NAMA_TESTI" class="col-form-label">Nama Tester :</label>
                                                <input type="text" class="form-control" id="NAMA_TESTI"
                                                    name="NAMA_TESTI" value="{{ $tes->NAMA_TESTI }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="TESTIMONY" class="col-form-label">Testimony :</label>
                                                <textarea type="text" class="form-control" id="TESTIMONY"
                                                    name="TESTIMONY">{{ $tes->TESTIMONY }}</textarea>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="edit">Save Changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- modal -->
                        <div class="modal fade" id="exampleModal13{{$tes ->ID_TESTI}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModal13Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal13Label">Delete Testimony</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="ti-close"></i>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <p>Are you sure to Delete this Data?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <a href="testimony_destroy/{{$tes -> ID_TESTI}}">
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
                    <th>Status</th>
                    <!-- <th>Id Testimony</th> -->
                    <th>Nama Tester</th>
                    <th>Testimony</th>
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
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

    const x = document.getElementsByClassName('post0');
    for (let i = 0; i < x.length; i++) {
        x[i].addEventListener('click', function () {
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
    swal(berhasil, "Good job!", "You clicked the button!", "success");

</script>

@endsection
