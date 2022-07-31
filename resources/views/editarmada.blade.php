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
            <h3>Edit Bus</h3>
        </div>
    </div>

        <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
        @foreach($armada as $ar)
        <form action="/armadaupdate/{id}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $ar->ID_ARMADA }}"> <br/>
                                                <div class="form-group">
                                                    <label for="nama" class="col-form-label">Category Bus :</label>
                                                    <select name="ID_CATEGORY" class="form-control" id="ID_CATEGORY">
                                                        @foreach($category_armada as $c)
                                                       
                                                        <option value="{{$c->ID_CATEGORY}}">{{$c->NAMA_CATEGORY}}</option>
                                                       
                                                        @endforeach                 
                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="platnomor" class="col-form-label">Plat Nomor :</label>
                                                    <input type="platnomor" class="form-control" id="platnomor" name="platnomor" value="{{ $ar->PLAT_NOMOR }}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="kapasitas" class="col-form-label">Kapasitas :</label>
                                                    <input type="kapasitas" class="form-control" id="kapasitas" name="kapasitas" value="{{ $ar->KAPASITAS }}">
                                                    </div>
                                                <div class="form-group">
                                                    <label for="fasilitas" class="col-form-label">Fasilitas :</label>
                                                    <textarea type="fasilitas" class="form-control" id="fasilitas" name="fasilitas">{{ $ar->FASILITAS_ARMADA }}</textarea>
                                                    </div>
                                                <div class="form-group">
                                                        <label>Pilih Foto</label>
                                                            <input type="file" name="avatar" class="form-control">
                                                    </div>
                                                <div class="gallery-container row">
                                                <center>
                                                <div class="col-xl-6 col-lg-4 col-md-6 col-sm-12 mb-4">
                                                    <img src="{{ url('foto/'.$ar->avatar) }}" class="rounded" alt="image">
                                                    </div>
                                                </center>
                                                    </div>
                                                
                                                    </div>
                                                    <div><label>&nbsp;</label></div>
                                                    
                                                <button type="submit" class="btn btn-primary" id="edit">Update</button>
                                            </div>
                                            </form>
     @endforeach



                    </div>
                        </div>

                        </div>
                    </div>
                    </div>



@endsection