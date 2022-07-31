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
    <!-- Magnific popup -->
    <link rel="stylesheet" href="{{ url('vendors/lightbox/magnific-popup.css') }}" type="text/css">

@endsection

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>Gallery Armada</h3>
        <div>
        <a href="tambahfoto">
            <button class="btn btn-primary file-upload-btn">
                    <i class="ti-upload mr-2"></i> Upload Foto
            </button>
            </a>
            </div>
            </div>
    </div>

     
           


    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills gallery-filter mb-4">
                <li class="nav-item">
                    <a href="#" class="nav-link active" data-filter="*">All</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-filter=".webTemplates">Bus Besar</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-filter=".logos">Bus Sedang</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-filter=".drawings">Elf (Mini Bus)</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" data-filter=".ui">UI Elements</a>
                </li>
            </ul>
           
                
      
    
            <div class="gallery-container row">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 drawings mb-4">
                    <a href="{{ url('img/'.$galeri->FOTO_ARMADA) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('img/'.$galeri->FOTO_ARMADA) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">Gallery Item Title</h4>
                                    <div><i class="fa fa-tag mr-2"></i>Web, Logos</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 webTemplates drawings ui mb-4">
                    <a href="{{ url('img/'.$galeri->FOTO_ARMADA) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('img/'.$galeri->FOTO_ARMADA) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">Gallery Item Title</h4>
                                    <div><i class="fa fa-tag mr-2"></i>Web, Logos</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

               
            </div>
        </div>
    </div>
    
@endsection

@section('script')

<!-- Sweet alert -->
<script src="{{ url('assets/js/examples/sweet-alert.js') }}"></script>

<!-- Prism -->
<script src="{{ url('vendors/prism/prism.js') }}"></script>

 <!-- DataTable -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
<script src="{{ url('assets/js/examples/datatable.js') }}"></script>

<!-- Javascript -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
    <!-- Magnific popup -->
    <script src="{{ url('vendors/lightbox/jquery.magnific-popup.min.js') }}"></script>

    <!-- Isotope -->
    <script src="{{ url('vendors/jquery.isotope.min.js') }}"></script>

    <script src="{{ url('assets/js/examples/pages/gallery.js') }}"></script>

    
    <!-- File manager example -->
    <script src="{{ url('assets/js/examples/file-manager.js') }}"></script>

  
  
    
@endsection
