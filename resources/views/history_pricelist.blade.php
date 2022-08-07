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
        <h6 class="card-title mb-0">Table History Pricelist Sewa Bus</h6>
    </div>
    <div class="table-responsive">
        <!-- <center>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                Tambah Pricelist
                    </button>
                    </center> -->
        <!-- modal -->
        <!-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal1Label">Tambah Pricelist Sewa Bus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="pricelistsewaarmadastore" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Category Bus :</label>
                                <select name="ID_CATEGORY" class="form-control" id="ID_CATEGORY">
                                    @foreach($category_armada as $c)

                                    <option value="{{$c->ID_CATEGORY}}">{{$c->NAMA_CATEGORY}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tujuansewa" class="col-form-label">Tujuan Sewa :</label>
                                <input type="text" class="form-control" id="tujuansewa" name="tujuansewa">
                            </div>
                            <div class="form-group">
                                <label for="hargasewa" class="col-form-label">Harga Sewa Bus :</label>
                                <input type="text" class="form-control" id="hargasewa" name="hargasewa">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="berhasil">Add Category</button>
                    </div>
                    </form>
                </div>
            </div>
        </div> -->
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <!-- <th>Id Pricelist</th> -->
                    <th>Category Bus</th>
                    <th>Tujuan Sewa</th>
                    <th>Pricelist Sewa</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($history_pricelist as $pr)
                    <!-- <tr class="table-light"> -->
                    <td>{{ $loop->iteration }}</td>
                    <!-- <td>{{ $pr   -> ID_PRICELIST }}</td> -->
                    @if($pr -> NAMA_CATEGORY == 'Bus Besar')
                    <td><span class="badge bg-success-bright text-secondary">{{ $pr -> NAMA_CATEGORY }}</span></td>
                    @endif
                    @if($pr -> NAMA_CATEGORY == 'Bus Sedang')
                    <td><span class="badge bg-success-bright text-warning">{{ $pr -> NAMA_CATEGORY }}</span></td>
                    @endif
                    @if($pr -> NAMA_CATEGORY == 'Elf Bus (Mini Bus)')
                    <td><span class="badge bg-success-bright text-success">{{ $pr -> NAMA_CATEGORY }}</span></td>
                    @endif
                    <td>{{ $pr   -> TUJUAN_SEWA }}</td>
                    <td>
                        Rp <?php echo number_format($pr->PRICELIST_SEWA,'0',',','.'); ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm btn-floating ml-2" title="Detail"
                            data-toggle="modal" data-target="#tampil{{$loop->iteration}}">
                            <i class="ti-receipt"></i>
                        </button>

                        <div class="modal" id="tampil{{$loop->iteration}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content border">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail History</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="ti-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table ">
                                            @foreach($history_lama_pricelist as $pr1)
                                            @if($pr1->id == $pr->id)
                                            <tbody>
                                                <tr>
                                                    <td> <strong>ID<strong></td>
                                                    <td>{{ $pr1->ID_PRICELIST }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Category Bus</strong></td>
                                                    <td>
                                                        @if($pr1 -> NAMA_CATEGORY == 'Bus Besar')
                                                        <span
                                                            class="badge bg-success-bright text-secondary">{{ $pr1 -> NAMA_CATEGORY }}</span>
                                                        @endif
                                                        @if($pr1 -> NAMA_CATEGORY == 'Bus Sedang')
                                                        <span
                                                            class="badge bg-success-bright text-warning">{{ $pr1 -> NAMA_CATEGORY }}</span>
                                                        @endif
                                                        @if($pr1 -> NAMA_CATEGORY == 'Elf Bus (Mini Bus)')
                                                        <span
                                                            class="badge bg-success-bright text-success">{{ $pr1 -> NAMA_CATEGORY }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tujuan Sewa<strong></td>
                                                    <td>{{ $pr1->TUJUAN_SEWA }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Harga Lama<strong></td>
                                                    <td><span class="text-danger">
                                                            <h5>Rp
                                                                <?php echo number_format($pr1->PRICELIST_SEWA,'0',',','.'); ?>
                                                            </h5>
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Harga Baru<strong></td>
                                                    <td>Rp <?php echo number_format($pr->PRICELIST_SEWA,'0',',','.'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Tanggal Dirubah<strong></td>
                                                    <td>{{ $pr1->TGL_GANTI }}</td>
                                                </tr>

                                            </tbody>
                                            @endif
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>

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
                    <th>#</th>
                    <!-- <th>Id Pricelist</th> -->
                    <th>Category Bus</th>
                    <th>Tujuan Sewa</th>
                    <th>Pricelist Sewa</th>
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


@endsection
