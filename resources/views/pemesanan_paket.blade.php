@extends('layout/main')


@section('container')

    <div class="hero-wrap hero-bread" style="background-image: url('asset/vegfoods/images/baground2.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span><span>Cart</span></p>
            <h1 class="mb-0 bread">Pemesanan</h1>
          </div>
        </div>
      </div>
	</div>
  </br>
  </br>

<section id="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2 hero-img">
        <div class="kotak">
          <div class="row">
            <div class="col-md-12 text-center">
              <h1>Formulir Pemesanan Paket Wisata</h1>
              <hr>
            </div>
          <div class="col-md-8 text-left">

            <form action="pemesanan_paket_store" method="post" accept-charset="utf-8">
               {{ csrf_field() }}
               <!-- <input type="hidden" name="token_rahasia" value="72827582Uduagd86275gbdahgahgfa"> -->
               <input type="hidden" name="STATUS_SEWA" value="">

                <p class="alert alert-primary">
                  Isi data pemesanan Anda dengan lengkap dan benar.
                </p>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Tanggal Sewa<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" name="TGL_SEWA_PAKET" class="form-control tanggal">
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Jam Sewa<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="time" name="JAM_SEWA_PAKET" class="form-control tanggal">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Tanggal Akhir Sewa<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" name="TGL_AKHIR_SEWA_PAKET" class="form-control tanggal">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Tanggal Akhir Sewa<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="time" name="JAM_AKHIR_SEWA_PAKET" class="form-control tanggal">
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Nama Anda<span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" name="NAMA_CUSTOMER" class="form-control" placeholder="Nama Anda" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Nomor HP/Whatsapp <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" value="" name="TELEPHONE" class="form-control" placeholder="Nomor HP/Whatsapp" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Email</label>
                  <div class="col-sm-8">
                    <input type="email" name="EMAIL_CUSTOMER" class="form-control" 
                    placeholder="Email Anda" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 control-label text-right">Alamat</label>
                  <div class="col-sm-8">
                    <textarea name="ALAMAT" class="form-control" placeholder="Alamat"></textarea>
                  </div>
                </div>

               
             
          
                    <div class="col-md-12">
                      <!-- <img src="{{ url('asset/vegfoods/images/bismillah.jpg') }}" class="img img-thumbnail img-fluid" >   -->
                      <hr>
                        <p>Anda sudah melakukan pembayaran? Silahkan lakukan <a href="{{ url('konfirmasi') }}">Konfirmasi Pembayaran</a>.</p>
                      <hr>
                    </div>
                  
                      <div class="clearfix" align="left">
                          <button id="btnchoose" type="button" name="submit" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-save"></i>Choose Packages
                          </button>
                      </div>
           
            <th>&nbsp;</th>
            <table class="table table-bordered" id="keranjang">
              <thead class="thead-light">
                    <tr class="text-center">
                      
                      <th>Paket Wisata</th>
                      <th>Tempat Kunjung</th>
                      <th>Harga (/orang)</th>
                      <th>Harga Paket</th>
                      <th>Quantity</th>
                      <th>Discount (Rp.)</th>
                      <th>Sub Total</th>
                      <th>&nbsp;</th>
                    </tr>
                </thead>
	          </table>

        <br>
  
          <div class="col-xl-12">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
                    <span>Total</span>
                    <div class="col-sm-12 col-md-1">
                      <label>Rp.</label><br>
                    </div>
                    <div class="col-sm-12 col-md-2">
                      <label id="subtotal-val"></label><br>
                    </div>
		    					</p>
		    					<p class="d-flex">
                    <span>DP (25%)</span>
                    <div class="col-sm-12 col-md-1">
                      <label>Rp.</label><br>
                    </div>
                    <div class="col-sm-12 col-md-2">
                      <label id="dpbus"></label><br>
                    </div>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
                    <span>Sisa Bayar</span>
                    <div class="col-sm-12 col-md-1">
                      <label>Rp.</label><br>
                    </div>
                    <div class="col-sm-12 col-md-2">
                      <label id="total-val"></label><br>
                    </div>
		    					</p>
								</div>
	          	</div>
	
                <input type="hidden" name="idsewa" id="idsewa" value="">
                <input type="hidden" name="sub" id="tot">
                <input type="hidden" name="dpbus" id="depe">
                <input type="hidden" name="sisa" id="sb">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <div class="form-group row" align="right">
                      <label class="col-sm-4 control-label"></label>
                      <div class="col-sm-8">
                        <div class="btn-group">
                          <button type="submit" class="btn btn-info btn-lg" value="submit">
                            <i class="fa fa-times"></i>Submit
                          </button>
                        </div>
                      </div>
                  </div>
            
                                      <!-- Modal -->
                                      <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="myModal">
                                        <div class="modal-dialog modal-xl">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="myModalLabel">Choose Packages</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                              <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table id="example1" class="table table-striped">
                                                    <thead>
                                                      <tr role="row">
                                                        <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Paket Wisata</th>
                                                        <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Harga (/orang)</th>
                                                        <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Harga Paket</th>
                                                        <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Tempat Kunjung</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      @foreach( $paket_wisata as $p )
                                                      <tr role="row" class="odd" onclick="pilihBarang('{{ $p -> ID_PAKET }}')" style="cursor:pointer">
                                                        <td>{{ $p->NAMA_PAKET }}</td>
                                                        <td>Rp <?php echo number_format($p->HARGA_PAKET,'0',',','.'); ?></td>
                                                        <td>Rp <?php echo number_format($p->HARGA_JUAL,'0',',','.'); ?></td>
                                                        <td>{{ $p->TEMPAT_KUNJUNG }}</td>
                                                      </tr>
                                                      @endforeach
                                                    </tbody>
                                                    </table>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      <div>

                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </br>
  </br>
</section>

<section class="ftco-section bg-light">

</section>
  
<script>

var barang = <?php echo json_encode($paket_wisata); ?>;
	console.log(barang[0]["NAMA_PAKET"]);
	var colnum=0;

	function getVal(event){
		if (event.keyCode === 13) {
			modal();
		}
	}
	function pilihBarang(id){
		var index;
		for(var i=0;i<barang.length;i++){
			if(barang[i]["ID_PAKET"]==id){
				console.log(barang[i]);
				index=i;
				break;
			}
		}
		$("#myModal").modal("hide");
    $("#btnchoose").hide();

		var table = document.getElementById("keranjang");
		var row = table.insertRow(table.rows.length);
		row.setAttribute('id','col'+colnum);
		var id = 'col'+colnum;
		colnum++;

		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		var cell6 = row.insertCell(5);
		var cell7 = row.insertCell(6);
		var cell8 = row.insertCell(7);
		
		console.log(index);
		cell1.innerHTML = '<input type="hidden" name="id['+barang[index]["ID_PAKET"]+']" value="'+barang[index]["ID_PAKET"]+'">'+barang[index]["NAMA_PAKET"];
		cell2.innerHTML = '<input type="hidden" name="tj['+barang[index]["ID_PAKET"]+']" value="'+barang[index]["TEMPAT_KUNJUNG"]+'">'+barang[index]["TEMPAT_KUNJUNG"];	
		cell3.innerHTML = '<input type="hidden" name="cat['+barang[index]["ID_PAKET"]+']" value="'+barang[index]["HARGA_PAKET"]+'">'+barang[index]["HARGA_PAKET"];
		cell4.innerHTML = '<input type="hidden" id="harga'+barang[index]["ID_PAKET"]+'" name="harga['+barang[index]["ID_PAKET"]+']" value="'+barang[index]["HARGA_JUAL"]+'">'+barang[index]["HARGA_JUAL"];
		cell5.innerHTML = '<input type="number" name="qty['+barang[index]["ID_PAKET"]+']" value="1" oninput="recount(\''+barang[index]["ID_PAKET"]+'\')" id="qty'+barang[index]["ID_PAKET"]+'" style="background:secondary; border:none; text-align:left; width=100%" readonly>';	
    cell6.innerHTML = '<input class="discount" type="number" name="discount['+barang[index]["ID_PAKET"]+']" value="0" oninput="recount(\''+barang[index]["ID_PAKET"]+'\')" id="discount'+barang[index]["ID_PAKET"]+'" style="background:primary; border:none; text-align:left; width=100%" readonly>';	
		cell7.innerHTML = '<input type="hidden" class="subtotal" name="subtotal['+barang[index]["ID_PAKET"]+']" value="'+barang[index]["HARGA_JUAL"]+'" id="subtotal'+barang[index]["ID_PAKET"]+'"><span id="subtotalval'+barang[index]["ID_PAKET"]+'">'+barang[index]["HARGA_JUAL"]+'</span>';
		cell8.innerHTML = '<button onclick="hapusEl(\''+id+'\')" class="btn btn-danger btn-block text-uppercase">X</button>';
		total();
		
	}
	// function lm(i){
	// 	var min =  document.getElementById("qty"+i).value;
	// 	if(min <= 1){

	// 	}else{
	// 	min--;
	// 	document.getElementById("qty"+i).value = min;
	// 	recount(i);
	// 	}
	// }
	// function ln(i){
	// 	var plus =  document.getElementById("qty"+i).value;
	// 	console.log(plus);
	// 	plus++;
	// 	document.getElementById("qty"+i).value = plus;
	// 	console.log(plus);
	// 	recount(i);
	// }

	function total(){
		var subtotals = document.getElementsByClassName("subtotal");
		var total = 0;
		for(var i=0; i<subtotals.length;++i){
			total += Number(subtotals[i].value); 
		}
		document.getElementById("subtotal-val").innerHTML = total;
		var dp = parseInt(25/100*total);
		document.getElementById("dpbus").innerHTML = dp;
		var sisabayar = parseInt(75/100*total);
        document.getElementById("total-val").innerHTML = sisabayar;
        document.getElementById("tot").value = total;
        document.getElementById("depe").value = dp;
        document.getElementById("sb").value = sisabayar;
	}

	function recount(id){
		var price = document.getElementById("harga"+id).value;
		var diskon = document.getElementById("discount"+id).value;
		var sembarang = document.getElementById("qty"+id).value;
     
		var lego = Number(price*sembarang)-diskon; 
		document.getElementById("subtotal"+id).value = lego;
		document.getElementById("subtotalval"+id).innerHTML = lego;
		total();
	}

	function modal(){
		$("#myModal").modal("show");
		document.getElementById("myText").value = "";
	}
	function hapusEl(idCol) {
    $("#btnchoose").show();
		document.getElementById(idCol).remove();
		total();
	}


</script>



@endsection