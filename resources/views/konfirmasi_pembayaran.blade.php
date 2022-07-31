@extends('layout/main')

@section('container')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Billing</span></p>
            <h1 class="mb-0 bread">Bus Rental</h1>
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
            
              <h1>Konfirmasi Pembayaran</h1> <div class="alert alert-danger"><h3><strong>Sewa Bus</strong></h3></div>
              
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

                        <form action="selesai_bayar" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-md-10 mb-3">
                                        <label for="nama" class="col-form-label">Nomor Invoice :</label>
                                            <input type="text" class="form-control" id="ID_SEWA_BUS" name="ID_SEWA_BUS" placeholder="Masukkkan nomor invoice Anda (for example : 201226001)">
                                    </div>
                                    <div class="col-md-2 mt-5 mb-2" >
                                            <button class="btn btn-primary btn-block" id="cek" onclick="event.preventDefault();cekNota()">Check</button>
                                        </div>
                                </div>
                                <div id="bayar"></div>

                               
                            </form>
</section>
<section class="ftco-section bg-light"></section>


@endsection
@section('script')

<script>
var notaID;
function cekNota(){
    var notaID1=$('#ID_SEWA_BUS').val();
    notaID=notaID1;
    // console.log('nota id');
    // console.log(notaID1);
        jQuery.ajax({
            url : 'cek-nota/' +notaID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                console.log('cek nota');
                console.log(data);

                if(data.length==0){
                    // alert('data tidak ditemukan');
                    Swal.fire(
                    'Maaf!',
                    'Nomor Invoice Anda tidak ditemukan! Silahkan teliti Nomor Invoice Anda!',
                    'error'
                    )
                }
                else if(data[0].ID_JENIS==6){
                    Swal.fire(
                    'Info!',
                    'Anda sudah membayar lunas!',
                    'info'
                    )
                }
                else{
                    ajax_tampil_append();
                }
            }
        });
}

function ajax_tampil_append(){
    jQuery.ajax({
            url : 'data-nota/' +notaID,
            type : "GET",
            dataType : "json",
            success:function(data)
            {
                console.log('masuk data-nota');
                
                var id_jenis=data[0].ID_JENIS;
                console.log(data);
                // console.log(data.length);
                if(data.length==0 || id_jenis==5){
                    append_html_dua();
                }
               
                else if(id_jenis==1){
                    append_html_satu();
                }
                else if(id_jenis==2){
                    append_html_dua();
                }
            }
        });
}
  

function append_html_kosong(){
    let row='\
        <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Rekening Pembayaran :</label>\
                                            <select name="ID_REKENING" class="form-control" id="ID_REKENING">\
                                            <option value="REK001">BTPN - 90260078897</option>\
                                            </select>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Cara Bayar :</label>\
                                        <input type="text" class="form-control" id="carabayar" name="carabayar" value="Transfer" readonly>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label ">Jenis Pembayaran :</label>\
                                            <select name="jenisbayar" class="form-control jenis_bayar" id="jenisbayar1">\
                                                <option selected="selected">-- Pilih --</option>\
                                                    <option value="1">DP (25%)</option>\
                                                    <option value="2">Sisa Bayar</option>\
                                            </select>\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="jumlahbayar" class="col-form-label">Jumlah Pembayaran :</label>\
                                            <input type="jumlahbayar" class="form-control" id="jumlahbayar" name="jumlahbayar">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="pemilikrekening" class="col-form-label">Nama Pemilik Rekening :</label>\
                                            <input type="pemilikrekening" class="form-control" id="pemilikrekening" name="pemilikrekening">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="namabank" class="col-form-label">Nama Bank :</label>\
                                            <input type="namabank" class="form-control" id="namabank" name="namabank">\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="norek" class="col-form-label">Nomor Rekening Pembayaran :</label>\
                                            <input type="norek" class="form-control" id="norek" name="norek">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label>Upload Bukti Bayar</label>\
                                            <input type="file" name="file" class="form-control">\
                                                <h8>Format JPG, PNG, Maksimal 2 MB</h8>\
                                    </div>\
                                <div class="col-md-4 mb-3">\
                                    <label for="keterangan" class="col-form-label">Keterangan Lainnya :</label>\
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>\
                                </div>\
                                </div>\
                                <div class="form-group row" align="right">\
                                    <label class="col-sm-3 control-label"></label>\
                                <div class="col-sm-9">\
                                    <div class="btn-group">\
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="save">\
                                        <i class="fa fa-save"></i> Simpan Data</button>\
                                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">\
                                        <i class="fa fa-times"></i> Reset</button>\
                                    </div>\
                                </div>';
        $('#bayar').append(row);

        jQuery(document).ready(function ()
    {
       console.log('massuk pilih jenis bayar');
            jQuery("#jenisbayar1").change(function(){
                console.log('masuk jquery jenis bayar');
               var jenis_bayar = jQuery(this).val();
               if(jenis_bayar)
               {
                  jQuery.ajax({
                     url : 'get_jenis_bayar/' +jenis_bayar+'/'+ notaID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                         console.log(data);
                        if(data[0].DP_BUS === null || data[0].DP_BUS === undefined){
                            var hasil50 = data[0].SISA_SEWA_BUS;
                        }
                        if(data[0].SISA_SEWA_BUS === null || data[0].SISA_SEWA_BUS === undefined){
                            var hasil50 = data[0].DP_BUS;
                        }
                        //  console.log(data[0].DP_BUS);
                        console.log(hasil50);
                        $('#jumlahbayar').val(hasil50);
                     }
                  });
               }
            });
         });
}

function append_html_satu(){
    let row='\
        <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Rekening Pembayaran :</label>\
                                            <select name="ID_REKENING" class="form-control" id="ID_REKENING">\
                                            <option value="REK001">BTPN - 90260078897</option>\
                                            </select>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Cara Bayar :</label>\
                                        <input type="text" class="form-control" id="carabayar" name="carabayar" value="Transfer" readonly>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label ">Jenis Pembayaran :</label>\
                                            <select name="jenisbayar" class="form-control jenis_bayar" id="jenisbayar1">\
                                                <option selected="selected">-- Pilih --</option>\
                                                    <option value="2">Sisa Bayar</option>\
                                            </select>\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="jumlahbayar" class="col-form-label">Jumlah Pembayaran :</label>\
                                            <input type="jumlahbayar" class="form-control" id="jumlahbayar" name="jumlahbayar">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="pemilikrekening" class="col-form-label">Nama Pemilik Rekening :</label>\
                                            <input type="pemilikrekening" class="form-control" id="pemilikrekening" name="pemilikrekening">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="namabank" class="col-form-label">Nama Bank :</label>\
                                            <input type="namabank" class="form-control" id="namabank" name="namabank">\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="norek" class="col-form-label">Nomor Rekening Pembayaran :</label>\
                                            <input type="norek" class="form-control" id="norek" name="norek">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label>Upload Bukti Bayar</label>\
                                            <input type="file" name="file" class="form-control">\
                                                <h8>Format JPG, PNG, Maksimal 2 MB</h8>\
                                    </div>\
                                <div class="col-md-4 mb-3">\
                                    <label for="keterangan" class="col-form-label">Keterangan Lainnya :</label>\
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>\
                                </div>\
                                </div>\
                                <div class="form-group row" align="right">\
                                    <label class="col-sm-3 control-label"></label>\
                                <div class="col-sm-9">\
                                    <div class="btn-group">\
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="save">\
                                        <i class="fa fa-save"></i> Simpan Data</button>\
                                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">\
                                        <i class="fa fa-times"></i> Reset</button>\
                                    </div>\
                                </div>';
        $('#bayar').append(row);

        jQuery(document).ready(function ()
    {
       console.log('massuk pilih jenis bayar');
            jQuery("#jenisbayar1").change(function(){
                console.log('masuk jquery jenis bayar');
               var jenis_bayar = jQuery(this).val();
               if(jenis_bayar)
               {
                  jQuery.ajax({
                     url : 'get_jenis_bayar/' +jenis_bayar+'/'+ notaID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                         console.log(data);
                        if(data[0].DP_BUS === null || data[0].DP_BUS === undefined){
                            var hasil50 = data[0].SISA_SEWA_BUS;
                        }
                        if(data[0].SISA_SEWA_BUS === null || data[0].SISA_SEWA_BUS === undefined){
                            var hasil50 = data[0].DP_BUS;
                        }
                        //  console.log(data[0].DP_BUS);
                        console.log(hasil50);
                        $('#jumlahbayar').val(hasil50);
                     }
                  });
               }
            });
         });
}

function append_html_dua(){
    let row='\
        <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Rekening Pembayaran :</label>\
                                            <select name="ID_REKENING" class="form-control" id="ID_REKENING">\
                                            <option value="REK001">BTPN - 90260078897</option>\
                                            </select>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label">Cara Bayar :</label>\
                                        <input type="text" class="form-control" id="carabayar" name="carabayar" value="Transfer" readonly>\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="nama" class="col-form-label ">Jenis Pembayaran :</label>\
                                            <select name="jenisbayar" class="form-control jenis_bayar" id="jenisbayar1">\
                                                <option selected="selected">-- Pilih --</option>\
                                                    <option value="1">DP (25%)</option>\
                                            </select>\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="jumlahbayar" class="col-form-label">Jumlah Pembayaran :</label>\
                                            <input type="jumlahbayar" class="form-control" id="jumlahbayar" name="jumlahbayar">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="pemilikrekening" class="col-form-label">Nama Pemilik Rekening :</label>\
                                            <input type="pemilikrekening" class="form-control" id="pemilikrekening" name="pemilikrekening">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label for="namabank" class="col-form-label">Nama Bank :</label>\
                                            <input type="namabank" class="form-control" id="namabank" name="namabank">\
                                    </div>\
                                </div>\
                                <div class="form-row">\
                                    <div class="col-md-4 mb-3">\
                                        <label for="norek" class="col-form-label">Nomor Rekening Pembayaran :</label>\
                                            <input type="norek" class="form-control" id="norek" name="norek">\
                                    </div>\
                                    <div class="col-md-4 mb-3">\
                                        <label>Upload Bukti Bayar</label>\
                                            <input type="file" name="file" class="form-control">\
                                                <h8>Format JPG, PNG, Maksimal 2 MB</h8>\
                                    </div>\
                                <div class="col-md-4 mb-3">\
                                    <label for="keterangan" class="col-form-label">Keterangan Lainnya :</label>\
                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>\
                                </div>\
                                </div>\
                                <div class="form-group row" align="right">\
                                    <label class="col-sm-3 control-label"></label>\
                                <div class="col-sm-9">\
                                    <div class="btn-group">\
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg" value="save">\
                                        <i class="fa fa-save"></i> Simpan Data</button>\
                                        <button type="reset" name="submit" class="btn btn-info btn-lg" value="reset">\
                                        <i class="fa fa-times"></i> Reset</button>\
                                    </div>\
                                </div>';
        $('#bayar').append(row);

        jQuery(document).ready(function ()
    {
       console.log('massuk pilih jenis bayar');
            jQuery("#jenisbayar1").change(function(){
                console.log('masuk jquery jenis bayar');
               var jenis_bayar = jQuery(this).val();
               if(jenis_bayar)
               {
                  jQuery.ajax({
                     url : 'get_jenis_bayar/' +jenis_bayar+'/'+ notaID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                         console.log(data);
                        if(data[0].DP_BUS === null || data[0].DP_BUS === undefined ){
                            var hasil50 = data[0].SISA_SEWA_BUS;
                        }
                        if(data[0].SISA_SEWA_BUS === null || data[0].SISA_SEWA_BUS === undefined ){
                            var hasil50 = data[0].DP_BUS;
                        }

                       
                        //  console.log(data[0].DP_BUS);
                        console.log(hasil50);
                        $('#jumlahbayar').val(hasil50);
                     }
                  });
               }
            });
         });
}

var today = new Date();
if(today.getHours()>15 || today.getHours()<8 || today.getDay()==0){
  document.getElementById('cek').disabled=true;
      Swal.fire(
          'Maaf!',
          'Konfirmasi Pembayaran hanya bisa dilakukkan pada Hari Senin-Sabtu dijam kerja (08.00-15.00 WIB)! Silahkan menghubungi Admin!',
          'warning'
      )
      document.getElementById('cek').disabled=true;
 }
 else{
  document.getElementById('cek').disabled=false;
 }


</script>

@endsection
