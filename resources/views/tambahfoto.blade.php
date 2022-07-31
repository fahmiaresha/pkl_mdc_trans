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

<div class="page-header">
        <div class="page-title">
            <h3>Tambah Foto Armada</h3>
        </div>
</div>

        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
     
                            <form action="uploadgambar" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                                                
                                    <div class="form-group">
                                        <label for="nama" class="col-form-label">Plat Nomor Armada :</label>
                                            <select name="ID_ARMADA" class="form-control" id="ID_ARMADA">
                                                @foreach($armada as $ar)
                                                                                
                                                    <option value="{{$ar->ID_ARMADA}}">{{$ar->NAMA_CATEGORY}} - {{$ar->PLAT_NOMOR}}</option>
                                                                                
                                                @endforeach                 
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="DESKRIPSI_FOTO" class="col-form-label">Deskripsi Foto :</label>
                                            <input type="DESKRIPSI_FOTO" class="form-control" id="DESKRIPSI_FOTO" name="DESKRIPSI_FOTO">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih Foto</label>
                                            <input type="file" name="file" class="form-control" required>
                                    </div>
                        </div>

                                <div><label>&nbsp;</label></div>

                                    <button type="submit" class="btn btn-primary" id="edit">Add</button>
                    </div>
                            </form>




                </div>
            </div>
        </div>
    </div>
</div>



@endsection