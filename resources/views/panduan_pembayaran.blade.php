@extends('layout/main')

@section('container')

<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">Panduan Pembayaran</h1>
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
              <h1>Panduan Pembayaran</h1>
              <hr>
            </div>
            <div class="col-md-12 text-left">
              
              <p class="text-center">Anda sudah melakukan pembayaran? Silakan lakukan <a href="konfirmasi_pembayaran">Konfirmasi Pembayaran</a>.</p>
              <hr>
                <p>Anda dapat melakukkan pembayaran dengan beberapa cara, yaitu :</p>
                    <ol>
                        <li>
                            <strong>Pembayaran Tunai</strong>
                            ", dapat Anda serahkan secara langsung ke Kantor MDC Trans"
                        </li>
                        <li>
                            <strong>Pembayaran Via Transfer Rekening</strong>
                        </li>
                    </ol>
                <p>
                    "Lakukkan transfer biaya atas layanan bus dan paket wisata&nbsp;"
                        <strong>PT. MDC Trans</strong>
                        "&nbsp;ke salah satu rekening di baawah ini."
                </p>
                <h3>Konfirmasi Pembayaran</h3>
                <p>Anda dapat melakukkan konfirmasi pembayaran melalui :</p>
                    <ul>
                        <li>
                            <strong>Melalui Email</strong>
                            ", silahkan kirim bukti pembayaran ke:&nbsp;"
                                <strong>
                                    <a href="">groupmdc@gmail.com</a>
                                </strong>
                        </li>
                        <li>
                            <strong>Melalui Whatsapp</strong>
                            ", kirimkan bukti pembayaran Anda ke&nbsp;"
                                <strong>+6282363306033
                        </li>
                        <li>
                            <strong>Melalui Formulir Konfirmasi Pembayaran</strong>
                            ", Anda dapat mengunggah bukti pembayaran Anda melalui form&nbsp;"
                                <strong>
                                    <a title="Konfirmasi Pembayaran" href="konfirmasi_pembayaran">
                                    &nbsp;Konfirmasi Pembayaran</a>
                                </strong>
                        </li>
                    </ul>
              <hr>
              <table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr class="bg-light">
                    <th width="5%">No.</th>
                    <!-- <th>GAMBAR</th> -->
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Atas Nama</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($rekening as $c)
                    <td class="text-left">{{ $loop->iteration }}</td>
                    <td>{{ $c -> NAMA_BANK }}</td>
                    <td>{{ $c -> NOMOR_REKENING }}</td>
                    <td>{{ $c -> ATAS_NAMA }}</td>
                </tbody>
                @endforeach
              </table>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</br>
<section class="ftco-section bg-light">

</section>

@endsection