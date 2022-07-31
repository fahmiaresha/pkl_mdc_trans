@extends('layouts.app')

@section('head')
    <!-- Magnific popup -->
    <link rel="stylesheet" href="{{ url('vendors/lightbox/magnific-popup.css') }}" type="text/css">
@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))    

@foreach($galeri as $g)
@endforeach  

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
                @foreach($category_armada as $c)
                <li class="nav-item">
                    <a href="#" class="nav-link" data-filter=".{{$c->ID_CATEGORY}}">{{$c->NAMA_CATEGORY}}</a>
                </li>
                @endforeach
                
            </ul>
           
                
      
    
            <div class="gallery-container row">
         
           
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 {{$c->ID_CATEGORY}} mb-4">
                <input type="hidden" name="id" value="{{ $g -> ID_GALERI }}">
                    <a href="{{ url('img/'.$g->FOTO_ARMADA) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('img/'.$g->FOTO_ARMADA) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">{{$g->PLAT_NOMOR}}</h4>
                                    <div><i class="fa fa-tag mr-2"></i>{{$g->DESKRIPSI_FOTO}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 {{$c->ID_CATEGORY}} mb-4">
                <input type="hidden" name="id" value="{{ $g -> ID_GALERI }}">
                    <a href="{{ url('foto/'.$g->avatar) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('foto/'.$g->avatar) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">{{$g->PLAT_NOMOR}}</h4>
                                    <div><i class="fa fa-tag mr-2"></i>{{$g->DESKRIPSI_FOTO}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
         

            <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 webTemplates drawings ui mb-4">
                    <a href="{{ url('img/'.$g->FOTO_ARMADA) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('img/'.$g->FOTO_ARMADA) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">Gallery Item Title</h4>
                                    <div><i class="fa fa-tag mr-2"></i>Web, Logos</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 logos mb-4">
                    <a href="{{ url('img/'.$g->FOTO_ARMADA) }}" class="image-popup-gallery-item">
                        <div class="image-hover">
                            <img src="{{ url('img/'.$g->FOTO_ARMADA) }}" class="rounded" alt="image">
                            <div class="image-hover-body rounded">
                                <div>
                                    <h4 class="mb-2">Gallery Item Title</h4>
                                    <div><i class="fa fa-tag mr-2"></i>Web, Logos</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->

            </div>
        </div>
    </div>
    

@endif
@endsection

@section('script')
<!-- Magnific popup -->
<script src="{{ url('vendors/lightbox/jquery.magnific-popup.min.js') }}"></script>

<!-- Isotope -->
<script src="{{ url('vendors/jquery.isotope.min.js') }}"></script>

<script src="{{ url('assets/js/examples/pages/gallery.js') }}"></script>


@endsection
