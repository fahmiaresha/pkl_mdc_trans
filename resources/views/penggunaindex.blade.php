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
        <h6 class="card-title mb-0">Table Pegawai</h6>
    </div>
    <div class="table-responsive">
        <center>
            <a href="createpengguna">
                <button type="button" class="btn btn-primary">
                    Tambah Data Pegawai
                </button>
            </a>
        </center>
        <!-- modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal1Label">Tambah Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="penggunastore" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama :</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username :</label>
                                <input type="text" class="form-control" id="username" name="username">
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
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password :</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="JOB_STATUS" class="col-form-label">Job Status :</label>
                                <select name="JOB_STATUS" class="form-control" id="JOB_STATUS">
                                    <option selected="selected">--Pilih Job Status--</option>
                                    <option>Admin</option>
                                    <!-- <option>Kasir</option> -->
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="berhasil">Add pengguna</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <!-- <th>Id Pegawai</th> -->
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>Email Pegawai</th>
                    <th>Telephone Pegawai</th>
                    <th>Alamat Pegawai</th>
                    <!-- <th>Password</th> -->
                    <th>Job Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($pengguna as $png)
                    <!-- <tr class="table-light"> -->
                    <!-- <td>{{ $png -> ID_PENGGUNA }}</td> -->
                    <td>{{ $png -> NAMA_PENGGUNA }}</td>
                    <td>{{ $png -> USERNAME }}</td>
                    <td>{{ $png -> EMAIL_PENGGUNA }}</td>
                    <td>{{ $png -> TELEPHONE_PENGGUNA }}</td>
                    <td>{{ $png -> ALAMAT_PENGGUNA }}</td>
                    <!-- <td>{{ $png -> PASSWORD }}</td> -->
                    <td>{{ $png -> JOB_STATUS }}</td>
                    <td>
                        <a href="{{ url('editpengguna', ['id'=>$png -> ID_PENGGUNA]) }}">
                            <button type="button" class="btn btn-outline-success btn-sm btn-floating" title="Edit">
                                <i class="ti-pencil"></i>
                            </button>
                        </a>

                        <!-- <a href="{{ url('profile', ['id'=>$png -> ID_PENGGUNA]) }}">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-floating" title="Profile">
                                        <i class="ti-user"></i>
                                    </button>
                                    </a> -->

                        <!-- modal -->
                        <div class="modal fade" id="exampleModal12{{$png -> ID_PENGGUNA}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModal12Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal12Label">Edit Data pengguna</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="ti-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="penggunaupdate" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $png->ID_PENGGUNA }}"> <br />
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label">Nama :</label>
                                                <input type="text" class="form-control" id="nama" name="nama"
                                                    value="{{ $png->NAMA_PENGGUNA }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-form-label">Username :</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="{{ $png->USERNAME }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-form-label">Email :</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $png->EMAIL_PENGGUNA }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone" class="col-form-label">Telephone :</label>
                                                <input type="telephone" class="form-control" id="telephone"
                                                    name="telephone" value="{{ $png->TELEPHONE_PENGGUNA }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="col-form-label">Alamat :</label>
                                                <input type="alamat" class="form-control" id="alamat" name="alamat"
                                                    value="{{ $png->ALAMAT_PENGGUNA }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-form-label">Password :</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" value="{{ $png->PASSWORD }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="JOB_STATUS" class="col-form-label">Job Status :</label>
                                                <select name="JOB_STATUS" class="form-control" id="JOB_STATUS"
                                                    value="{{ $png->JOB_STATUS }}">
                                                    <option selected="selected">{{ $png->JOB_STATUS }}</option>
                                                    <option>Admin</option>
                                                    <!-- <option>Kasir</option> -->
                                                </select>
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

                        <button type="button" class="btn btn-outline-danger btn-sm btn-floating ml-2" title="Delete"
                            data-toggle="modal" data-target="#exampleModal13{{$png -> ID_PENGGUNA}}">
                            <i class="ti-trash"></i>
                        </button>

                        <!-- modal -->
                        <div class="modal fade" id="exampleModal13{{$png -> ID_PENGGUNA}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModal13Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModal13Label">Delete Data Pegawai</h5>
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
                                        <a href="penggunadestroy/{{$png -> ID_PENGGUNA}}">
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
                    <!-- <th>Id Pegawai</th> -->
                    <th>Nama Pegawai</th>
                    <th>Username</th>
                    <th>Email Pegawai</th>
                    <th>Telephone Pegawai</th>
                    <th>Alamat Pegawai</th>
                    <!-- <th>Password</th> -->
                    <th>Job Status</th>
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

    function modal(id) {
        const y = document.getElementById(id);
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
    swal(berhasil, "Good job!", "You clicked the button!", "success");

</script>

@endsection
