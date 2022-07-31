@extends('layout/main')

@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Billing</span></p>
            <h1 class="mb-0 bread">Tour Packages</h1>
          </div>
        </div>
      </div>
	</div>
    </br>
    </br>

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
                <h1>Konfirmasi Pembayaran</h1> <div class="alert alert-danger"><h3><strong>Paket Wisata</strong></h3></div>
             
              <hr>
            </div>
            <div class="col-md-12 text-left">
              
              <p class="text-center">Baca informasi Panduan pembayaran sebelum melakukaan konfirmasi. <a href="panduan_pembayaran">Panduan Pembayaran</a>.</p>
              <hr>
                <!-- <div class="alert alert-danger"></div> -->

                <p class="alert alert-info">
                    Isi data pembayaran Anda dengan lengkap dan benar.
                </p>
                <hr>

                        <form action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nama" class="col-form-label">Nomor Transaksi :</label>
                                            <input type="text" class="form-control" id="ID_SEWA_PAKET" name="ID_SEWA_PAKET" placeholder="for example : 201226001">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nama" class="col-form-label">Rekening Pembayaran :</label>
                                            <select name="ID_REKENING" class="form-control" id="ID_REKENING">
                                            @foreach($rekening as $c)
                                       
                                                <option value="{{$c->ID_REKENING}}">{{$c->NAMA_BANK}}   -  {{$c->NOMOR_REKENING}}</option>
                                            
                                            @endforeach                 
                                            </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nama" class="col-form-label">Cara Bayar :</label>
                                            <input type="text" class="form-control" id="carabayar" name="carabayar" value="Transfer">   
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="date" class="col-form-label">Tanggal Bayar :</label>
                                            <input type="date" class="form-control" id="tanggalbayar" name="tanggalbayar">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="jumlahbayar" class="col-form-label">Jumlah Pembayaran :</label>
                                            <input type="jumlahbayar" class="form-control" id="jumlahbayar" name="jumlahbayar">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="pemilikrekening" class="col-form-label">Nama Pemilik Rekening :</label>
                                            <input type="pemilikrekening" class="form-control" id="pemilikrekening" name="pemilikrekening">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="namabank" class="col-form-label">Nama Bank :</label>
                                            <input type="namabank" class="form-control" id="namabank" name="namabank">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="norek" class="col-form-label">Nomor Rekening Pembayaran :</label>
                                            <input type="norek" class="form-control" id="norek" name="norek">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label>Upload Bukti Bayar</label>
                                            <input type="file" name="file" class="form-control">
                                                <h8>Format JPG, PNG, Maksimal 2 MB</h8>
                                    </div>
                                <!-- </div>
                                <div class="form-row"> -->
                                <div class="col-md-4 mb-3">
                                    <label for="keterangan" class="col-form-label">Keterangan Lainnya :</label>
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                </div>
                                </div>

                                <div class="form-group row" align="right">
                                    <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <div class="btn-group">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="save">
                                        <i class="fa fa-save"></i> Simpan Data
                                        </button>
                                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">
                                        <i class="fa fa-times"></i> Reset
                                        </button>
                                    </div>
                                </div>

                            </form>
</section>
<section class="ftco-section bg-light">

</section>

@endsection