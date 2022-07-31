@extends('layouts.app')

@section('head')
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="{{ url('vendors/fullcalendar/fullcalendar.min.css') }}" type="text/css">
    <!-- DataTable -->
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
    <!-- Clockpicker -->
    <link rel="stylesheet" href="{{ url('vendors/clockpicker/bootstrap-clockpicker.min.css') }}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ url('vendors/form-wizard/jquery.steps.css') }}" type="text/css">

    <!-- Prism -->
    <link rel="stylesheet" href="{{ url('vendors/prism/prism.css') }}" type="text/css">
    
    

@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))

<div class="page-header">
    <div class="page-title">
        <h3>Form Sewa Bus</h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
                <p class="text-muted"></p>
                    <div id="wizard1">
                        <h3>Personal Information</h3>
                        <section class="card card-body border mb-0">
                            
                                <form action="{{ $sewa_bus->ID_SEWA_BUS }}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="ID_SEWA_BUS" value="{{ $sewa_bus->ID_SEWA_BUS }}"> <br/>
                                    <div class="form-row">
                                    <input type="hidden" name="ID_PENGGUNA" value="{{ $sewa_bus->ID_PENGGUNA }}"> <br/>
                                        <div class="col-md-4 mb-3">
                                            <label for="nama" class="col-form-label">Nama User :</label>
                                            
                                                <label>{{$pengguna->NAMA_PENGGUNA}}</label>
                                            
                                        </div>
                                        <input type="hidden" name="ID_CUSTOMER" value="{{ $sewa_bus->ID_CUSTOMER }}"> <br/>
                                        <div class="col-md-4 mb-3">
                                            <label for="nama" class="col-form-label">Nama Customer :</label>
                                            
                                                <label>{{$customer->NAMA_CUSTOMER}}</label>
                                                
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="TGL_SEWA" class="col-form-label">Start Date :</label>
                                            <input type="date" class="form-control" id="tglsewa" name="TGL_SEWA" value="{{$sewa_bus->TGL_SEWA_BUS}}">
                                        </div>
                                            
                                        <div class="col-md-4 mb-3">
                                            <label for="TGL_AKHIR_SEWA">End Date :</label>
                                            <input type="date" class="form-control" id="tglsewa_akhir" name="TGL_AKHIR_SEWA" value="{{$sewa_bus->TGL_AKHIR_SEWA}}">
                                        </div>
                                    </div>
                                        

                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="JAM_SEWA" class="col-form-label">Start Time :</label>
                                            <input type="time" class="form-control" id="JAM_SEWA" name="JAM_SEWA" value="{{$sewa_bus->JAM_SEWA}}">
                                        </div>
                                            
                                    
                                        <div class="col-md-4 mb-3">
                                            <label for="JAM_AKHIR_SEWA" class="col-form-label">End Time :</label>
                                            <input type="time" class="form-control" id="JAM_AKHIR_SEWA" name="JAM_AKHIR_SEWA" value="{{$sewa_bus->JAM_AKHIR_SEWA}}">
                                        </div>
                                
                                        <div class="col-md-4 mb-3">
                                            <label for="statussewa" class="col-form-label">Status Sewa :</label>
                                            <select name="statussewa" class="form-control" id="statussewa">
                                            @if($sewa_bus-> STATUS_SEWA == 'Booking')
                                                <option selected="selected" value="Booking">Booking</option>
                                                    <option value="On Schedule">On Schedule</option>
                                                    <option value="DIBATALKAN">DIBATALKAN</option>
                                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                            @endif
                                            @if($sewa_bus-> STATUS_SEWA == 'On Schedule')
                                            <option selected="selected" value="On Schedule">On Schedule</option>
                                                    <option value="Booking">Booking</option>
                                                    <option value="DIBATALKAN">DIBATALKAN</option>
                                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                            @endif
                                            @if($sewa_bus-> STATUS_SEWA == 'DIBATALKAN')
                                            <option selected="selected" value="DIBATALKAN">DIBATALKAN</option>
                                                    <option value="On Schedule">On Schedule</option>
                                                    <option value="Booking">Booking</option>
                                                    <option value="Sudah Bayar">Sudah Bayar</option>
                                            @endif
                                            @if($sewa_bus-> STATUS_SEWA == 'Sudah Bayar')
                                            <option selected="selected" value="Sudah Bayar">Sudah Bayar</option>
                                                    <option value="On Schedule">On Schedule</option>
                                                    <option value="Booking">Booking</option>
                                                    <option value="Booking">DIBATALKAN</option>
                                            @endif
                                            </select>
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="total_payment" class="col-form-label">Total Payment :</label>
                                            <input type="text" class="form-control" id="total_payment1_tampil" name="total_payment" 
                                            value="<?php echo number_format($sewa_bus->total_payment,'0',',','.'); ?>" readonly="">
                                            <input type="hidden" id="total_payment1"  value="{{$sewa_bus->total_payment}}">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="subtotal" class="col-form-label">DP (25%):</label>
                                            <input type="text" class="form-control" id="subtotal1_tampil" name="subtotal" 
                                            value="{{$sewa_bus->DP_BUS}}" onkeyup="hitunghargajualA()">
                                            <input type="hidden" id="subtotal1" name="subtotal1"  value="{{$sewa_bus->DP_BUS}}">
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                            <label for="sisa_bayar" class="col-form-label">Sisa Bayar :</label>
                                            <input type="text" class="form-control" id="sisa_bayar1_tampil" name="sisa_bayar" 
                                            value="{{$sewa_bus->SISA_SEWA_BUS}}">
                                            <input type="hidden" id="sisa_bayar1" name="sisa_bayar1">
                                        </div>
                                        </div>
                                    <button type="submit" class="btn btn-primary" id="berhasil">Update Sewa</button>
                                </form>
                        </section>

                        <h3>Billing Information</h3>
                        <section class="card card-body border mb-0">
                        
                                <form action="/datatable_store/{{ $sewa_bus->ID_SEWA_BUS }}" method="POST" enctype="multipart/form-data">
                                
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-2">
                                            <button id="btnchoose" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Choose Bus</button>
                                        </div>
                                    </div>

                                    <table class="table table-bordered" id="keranjang">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID Category</th>
                                                <th scope="col">Bus</th>
                                                <th scope="col">Tujuan Sewa</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Discount (Rp.)</th>
                                                <th scope="col">Sub Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    </table>

                                    <br>
                                    <div class="clearfix" >
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-7"></div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label><strong>Total</strong></label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-1">
                                                    <label>Rp.</label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label id="subtotal-val"></label><br>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-7"></div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label><strong>DP 25%</strong></label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-1">
                                                    <label>Rp.</label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label id="dpbus"></label><br>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-md-7"></div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label><strong>SISA BAYAR</strong></label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-1">
                                                    <label>Rp.</label><br>
                                                </div>
                                                <div class="col-sm-12 col-md-2">
                                                    <label id="total-val"></label><br>
                                                </div>
                                        </div>
                                                <input type="hidden" name="idsewa" id="idsewa" value="{{ $sewa_bus->ID_SEWA_BUS }}">
                                                <input type="hidden" name="sub" id="tot">
                                                <input type="hidden" name="dpbus" id="depe">
                                                <input type="hidden" name="sisa" id="sb">
                                    </div>

                                    <div class="clearfix" align="center">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                        <!-- Modal -->
                                        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table id="example1" class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Bus</th>
                                                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Tujuan Sewa</th>
                                                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Price</th>
                                                                    <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1">Jumlah Bus</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach( $pricelist_sewa_armada as $p )
                                                                <tr role="row" class="odd" onclick="pilihBarang('{{ $p -> ID_PRICELIST }}')" style="cursor:pointer">
                                                                    <td value="{{$p->ID_CATEGORY}}">{{ $p->NAMA_CATEGORY }}</td>
                                                                    <td>{{ $p->TUJUAN_SEWA }}</td>
                                                                    <td>Rp. <?php echo number_format($p->PRICELIST_SEWA,'0',',','.'); ?></td>
                                                                    <td>{{ $p->jmlbis }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        <div>
                                    </div>
                                </form>
                    

                        </section>

                        <h3>Payment Details</h3>
                        <section class="card card-body border mb-0">
                            <h3>Konfirmasi Pembayaran</h3>
                                
                                        <form action="/pembayaranstore/{{ $sewa_bus->ID_SEWA_BUS }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
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
                                                        <select name="carabayar" class="form-control" id="carabayar">
                                                            <option selected="selected">-- Pilih --</option>
                                                                <option>Transfer</option>
                                                                <option>Tunai</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="nama" class="col-form-label">Jenis Pembayaran :</label>
                                                        <select name="jenisbayar" class="form-control" id="jenisbayar">
                                                            <option selected="selected">-- Pilih --</option>
                                                                <option>DP (25%)</option>
                                                                <option>Sisa Bayar</option>
                                                                <option>Lunas</option>
                                                        </select>
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
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="keterangan" class="col-form-label">Keterangan Lainnya :</label>
                                                        <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                                                </div>
                                            </div>
                                            <div class="clearfix" align="center">
                                                <button type="submit" class="btn btn-primary" id="berhasil">Submit</button>
                                            </div>
                                        </form>
                                
                        </section>

                        <h3>Schedule Bus</h3>
                        <section class="card card-body border mb-0">
                            <!-- <h5>Schedule Sewa Armada</h5> -->
                            <div class="page-header">
                                <div class="page-title">
                                    <h3>Schedule Bus</h3>
                                    <div>
                                        <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#createEventModal">
                                            <i class="ti-plus mr-2"></i> Create Schedule
                                        </button>
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-9 app-content">
                                        <div class="app-content-overlay"></div>
                                        <div class="card app-content-body">
                                            <div class="card-body">
                                                <a href="#" class="app-sidebar-menu-button btn btn-outline-light mb-3">
                                                    <i data-feather="menu"></i>
                                                </a>
                                                <div id="calendar-demo"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <span class="event-icon mr-2"></span>
                                                    <span class="event-title">Create Schedule</span>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="ti-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/schedule_store" method="post">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="ID_SEWA_BUS" value="{{ $sewa_bus->ID_SEWA_BUS }}">
                                                    <input type="hidden" class="form-control" id="JAM_AKHIR_SEWA" name="JAM_AKHIR_SEWA" value="{{$sewa_bus->JAM_AKHIR_SEWA}}">
                                                    <input type="hidden" class="form-control" id="JAM_SEWA" name="JAM_SEWA" value="{{$sewa_bus->JAM_SEWA}}">
                                                    <input type="hidden" class="form-control" id="TGL_AKHIR_SEWA" name="TGL_AKHIR_SEWA" value="{{$sewa_bus->TGL_AKHIR_SEWA}}">
                                                    <input type="hidden" class="form-control" id="TGL_SEWA" name="TGL_SEWA" value="{{$sewa_bus->TGL_SEWA_BUS}}">
                                                        <label for="id">Tujuan</label>
                                                            <select name="id" class="form-control" id="id1" onchange="getTujuan()">
                                                                @foreach($sewa_bus_category as $sbc)
                                                               
                                                                    <option id="id1{{$sbc->id}}" value="{{$sbc->id}}" name="id"  data-pricelist="{{$sbc->ID_PRICELIST}}">{{$sbc->TUJUAN_SEWA}}</option>
                                                                
                                                                @endforeach                 
                                                            </select>
                                                            </br>
                                                        <label for="ID_ARMADA1">Bus</label>
                                                            <select name="ID_ARMADA1" class="form-control" id="ID_ARMADA1">
                                                                
                                                                   
                                                               
                                                                               
                                                            </select>
                                                            </br>
                                                            
                                                        <button type="submit" class="btn btn-primary" id="berhasil">Add</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
            </div>
        </div>
                    
    </div>
</div>

                    
            
@endif
@endsection

@section('script')

<script>
    function getTujuan(){
    var cat = document.getElementById('id1').value;
    var ratings =  $('#id1'+cat).data('pricelist');
       $.ajax({
           url:"{{url('armada')}}",
           data:"category="+ratings,
           dataType: "json",
           type: "GET",
           success:function(response){
            // alert("Percoban");
            console.log(response);
                $('#ID_ARMADA1').empty();
                 $.each(response.data,function(key,item){
                     $('#ID_ARMADA1').append('<option id="ID_ARMADA1'+item.ID_ARMADA+'"value="'+item.ID_ARMADA+'">'+item.NAMA_CATEGORY+'-'+item.PLAT_NOMOR+'</option>');
                 });
           }
       });
   }
   getTujuan();
</script>

<script>
var barang = <?php echo json_encode($pricelist_sewa_armada); ?>;
	console.log(barang[0]["NAMA_CATEGORY"]);
	var colnum=0;

	function getVal(event){
		if (event.keyCode === 13) {
			modal();
		}
	}
	function pilihBarang(id){
		var index;
		for(var i=0;i<barang.length;i++){
			if(barang[i]["ID_PRICELIST"]==id){
				console.log(barang[i]);
				index=i;
				break;
			}
		}
        var stokMax = barang[index]["jmlbis"];
		$("#myModal").modal("hide");
        // $("#btnchoose").hide();

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
		cell1.innerHTML = '<input type="hidden" name="id['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["ID_PRICELIST"]+'">'+barang[index]["ID_CATEGORY"];
		cell2.innerHTML = '<input type="hidden" name="cat['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["ID_CATEGORY"]+'">'+barang[index]["NAMA_CATEGORY"];
		cell3.innerHTML = '<input type="hidden" name="tj['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["TUJUAN_SEWA"]+'">'+barang[index]["TUJUAN_SEWA"];	
		cell4.innerHTML = '<input type="hidden" id="harga'+barang[index]["ID_PRICELIST"]+'" name="harga['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["PRICELIST_SEWA"]+'">'+barang[index]["PRICELIST_SEWA"];
		cell5.innerHTML = '<input type="number" name="qty['+barang[index]["ID_PRICELIST"]+']" value="1" min="1"  max='+stokMax+' oninput="recount(\''+barang[index]["ID_PRICELIST"]+'\')" id="qty'+barang[index]["ID_PRICELIST"]+'" style="background:secondary; border:none; text-align:left; width=100%">';	
        cell6.innerHTML = '<input class="discount" type="number" name="discount['+barang[index]["ID_PRICELIST"]+']" value="0" min="0" oninput="recount(\''+barang[index]["ID_PRICELIST"]+'\')" id="discount'+barang[index]["ID_PRICELIST"]+'" style="background:primary; border:none; text-align:left; width=100%">';	
		cell7.innerHTML = '<input type="hidden" class="subtotal" name="subtotal['+barang[index]["ID_PRICELIST"]+']" value="'+barang[index]["PRICELIST_SEWA"]+'" id="subtotal'+barang[index]["ID_PRICELIST"]+'"><span id="subtotalval'+barang[index]["ID_PRICELIST"]+'">'+barang[index]["PRICELIST_SEWA"]+'</span>';
		cell8.innerHTML = '<button onclick="hapusEl(\''+id+'\')" class="btn btn-danger btn-block text-uppercase">Delete</button>';
        

		total();
		
	}
	function lm(i){
		var min =  document.getElementById("qty"+i).value;
		if(min <= 1){

		}else{
		min--;
		document.getElementById("qty"+i).value = min;
		recount(i);
		}
	}
	function ln(i){
		var plus =  document.getElementById("qty"+i).value;
		console.log(plus);
		plus++;
		document.getElementById("qty"+i).value = plus;
		console.log(plus);
		recount(i);
	}

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
        // $("#btnchoose").show();
		document.getElementById(idCol).remove();
		total();
	}

    function money(text){
	var text = text.toString();
  // console.log(text);
	var panjang = text.length; //4
	var hasil = new Array();
	if (panjang>0){
		if(panjang>3){
			var div = parseInt(panjang/3); //1
			var char = new Array();
			var result="";
			if (div > 1 && panjang > 6) {
				var x = parseInt(panjang - (div*3));
				div++;
				for (var i=0; i<div; i++) {
					if (i == 0) {
						char[i] = text.slice(i,x);
					}
					else{
						char[i] = text.slice(((i-1)*3)+x,(i*3)+x);
					}
					if (i == (div-1)) {					
						hasil[i]= char[i];
					}
					else{
						hasil[i]= char[i]+".";
					}
				}
				for (var i=0; i<div; i++) {
					result+=hasil[i];
				}
			}
			else{
				result = text.slice(0,panjang-3)+"."+text.slice(panjang-3,panjang);
			//  console.log( text.slice(0,panjang-3));
      //  console.log(text.slice(panjang-3,panjang));
      }
			return result;
		}
    else if(panjang>0){
        return text;
    }
		return 0;
	}
}

    function hitunghargajualA(){
        console.log("function getHargaJual");
        var total = document.getElementById('total_payment1').value;
        console.log(total);
        var dp = document.getElementById('subtotal1').value;
        // console.log(dp);
        var x = document.getElementById('sisa_bayar1').value;

        var total_tampil = document.getElementById('total_payment1_tampil').value;
        var dp_tampil = document.getElementById('subtotal1_tampil').value;
        // console.log(dp);
        var x_tampil = document.getElementById('sisa_bayar1_tampil').value;


        var sisa = Number(total-dp_tampil);
        $('#sisa_bayar1').val(sisa);
        document.getElementById('sisa_bayar1_tampil').value=money(sisa);
       
        console.log(sisa);
        }

        function getTgl() {
            var today = new Date();
            var day = today.getDate();
            var month = today.getMonth()+1;
            var year = today.getFullYear();
            if(month < 10){
                month = '0'+month.toString();
            }
            if(day < 10){
            day = '0'+day.toString();
            }
            var minToday = year+"-"+month+"-"+day;
            document.getElementById('tglsewa').setAttribute('min',minToday);
            document.getElementById('tglsewa_akhir').setAttribute('min',minToday);
            }

        getTgl();
   

</script>

<!-- Form wizard -->
<script src="{{ url('vendors/form-wizard/jquery.steps.min.js') }}"></script>
<script src="{{ url('assets/js/examples/form-wizard.js') }}"></script>

<!-- DataTable -->
<script src="{{ url('vendors/dataTable/datatables.min.js') }}"></script>
<script src="{{ url('assets/js/examples/datatable.js') }}"></script>

<!-- Fullcalendar -->
<script src="{{ url('vendors/fullcalendar/moment.min.js') }}"></script>
<script src="{{ url('vendors/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ url('assets/js/examples/fullcalendar.js') }}"></script>

<!-- Clockpicker -->
<script src="{{ url('vendors/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ url('assets/js/examples/clockpicker.js') }}"></script>

<!-- Datepicker -->
<script src="{{ url('vendors/datepicker/daterangepicker.js') }}"></script>
<script src="{{ url('assets/js/examples/datepicker.js') }}"></script>

<script src="{{ url('assets/js/examples/pages/calendar.js') }}"></script>

<!-- Form repeater -->
<script src="{{ url('vendors/jquery.repeater.min.js') }}"></script>

<!-- Form repeater examples -->
<script src="{{ url('assets/js/examples/pages/form-repeater.js') }}"></script>


<!-- Prism -->
<script src="{{ url('vendors/prism/prism.js') }}"></script>

@endsection