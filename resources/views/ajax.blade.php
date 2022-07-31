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
            <h3>Form Sewa Armada</h3>
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
                            
                        <form action="{{ $sewa_bus->ID_SEWA_BUS }}" method="post">
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
                                    <input type="date" class="form-control" id="TGL_SEWA" name="TGL_SEWA" value="{{$sewa_bus->TGL_SEWA_BUS}}">
                                </div>
                                    
                                <div class="col-md-4 mb-3">
                                    <label for="TGL_AKHIR_SEWA">End Date :</label>
                                    <input type="date" class="form-control create-event-datepicker" id="TGL_AKHIR_SEWA" name="TGL_AKHIR_SEWA" value="{{$sewa_bus->TGL_AKHIR_SEWA}}">
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
                                    <label for="LAMA_SEWA" class="col-form-label">Lama sewa :</label>
                                    <input type="LAMA_SEWA" class="form-control" id="LAMA_SEWA" name="LAMA_SEWA" value="{{$sewa_bus->LAMA_SEWA}}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="statussewa" class="col-form-label">Status Sewa :</label>
                                    <select name="statussewa" class="form-control" id="statussewa" value="{{$sewa_bus->STATUS_SEWA}}">
                                        <option selected="selected">-- Status --</option>
                                            <option>Booking</option>
                                            <option>Belum Bayar</option>
                                            <option>Lunas</option>
                                    </select>
                                    </div>
                            </div>
                                    
                           
                            <button type="submit" class="btn btn-primary" id="berhasil">Update Sewa</button>
                        </form>
              
                        </section>

                        <h3>Billing Information</h3>
                        <section class="card card-body border mb-0">
                        
                         <form class="basic-repeater" action="" method="POST" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <!-- <center>
                         <div class="col-md-4 mb-3">
                                        <label for="profession">Tanggal Sewa</label>
                                        <input type="date" class="form-control" name="tglsewa" id="tglsewa">
                                   </div></center> -->
                                   <!-- <div><label>&nbsp;</label></div> -->
                                   <div class="form-row">
                                    <div class="form-group col-md-2">
                                        <button type="button" class="btn btn-primary" onclick="tampil_modal()">Add Product</button>
                                    </div>   
                                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search" value="" placeholder="Enter Your Product Name!" onkeydown="getModal(event)">
                            <div class="form-group">
						        <label for="focusedinput" class="col-sm-2 control-label"></label>
								    <div class="col-sm-3">
                                        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                <div class="modal-body">
                                                    <table id="myTable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th>Armada</th>
                                                                <th>Tujuan Sewa</th>
                                                                <th>Harga</th>
                                                    
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                @foreach($sewa_bus_category as $p)
                                                            <tr id="row{{$p->ID_PRICELIST }}">
                                                                        <th scope="row"><input type="checkbox" id="as{{$p->ID_PRICELIST}}" ></th>
                                                                        <td>{{ $p->NAMA_CATEGORY}}</td>
                                                                        <td>{{ $p->TUJUAN_SEWA}}</td>
                                                                        <td>{{ $p->PRICELIST_SEWA}}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th>Armada</th>
                                                            <th>Tujuan Sewa</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="label label-warning" data-dismiss="modal" id="save">Add</button>
                                                    <button type="button" class="label label-info" data-dismiss="modal">Back</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                <div class="table-responsive">
                                                    <div class="tables">
                                                        <div class="panel-body widget-shadow">
                                                            <table class="table" id="cart">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                        <th>Discount & Tax (%)</th>
                                                                        <th>Total</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                    <tbody>     
                                                                    </tbody>
                                                            </table>        
                                                        </div>
                                                    </div>
                                                </div>
                
				                                <div class="tables">
						                            <h4>Carts Total</h4>
						                                <table class="table table-bordered"> 
                                                            <tbody>
                                                                <tr>
                                                                    <input type="hidden" id="subtotal">
                                                                        <th>Subtotal
                                                                            <td id="subtotal-val"></td>
                                                                </tr>
                                                                <tr>
                                                                    <input type="hidden" id="total_discount">
                                                                        <th>Discount
                                                                            <td id="total_discount-val"></td>
                                                                </tr>
                                                                <tr>
                                                                    <input type="hidden" id="total_tax">
                                                                        <th>PPN
                                                                            <td id="total_tax-val"></td>
                                                                </tr>
                                                                <tr>
                                                                    <input type="hidden" name="total_payment" id="total_payment">
                                                                        <th>Total
                                                                            <td id="total_payment-val"></td>
                                                                </tr>

                                                                

                                                            </tbody>
                                                        </table>
                                                                <button type="submit" class="btn btn-success">Insert</button>
                                                                <button type="submit" class="btn btn-danger">Reset</button>

                                                                </div>
	
               
                    </form>
                    

                </section>

                        <h3>Payment Details</h3>
                        <section class="card card-body border mb-0">
                            <h5>Invoice</h5>
                                    <div class="invoice">
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <img src="{{ url('assets/media/image/logo/mdc.png') }}" alt="logo">
                                            <h3 class="text-xs-left m-b-0">#INV-{{$sewa_bus->ID_SEWA_BUS}}</h3>
                                        </div>
                                            <hr class="m-t-b-50">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                        <b>PT. Medina Dzikra Cemerlang Trans</b><br>
                                                        JL. Suwoko No. 43 A Lamongan - Jawa Timur<br>
                                                        Telp : (0322) 3101285
                                                    </p>
                                                    <p>
                                                    <b>{{$pengguna->NAMA_PENGGUNA}},</b><br>{{$sewa_bus->TGL_SEWA_BUS}}   -   {{$sewa_bus->TGL_AKHIR_SEWA}}
                                                    <br>{{$sewa_bus->JAM_SEWA}}       -      {{$sewa_bus->JAM_AKHIR_SEWA}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="text-right">
                                                        <b>Invoice to</b>
                                                    </p>
                                                    <p class="text-right"> {{$customer->NAMA_CUSTOMER}},<br> {{$customer->TELEPHONE}},<br> {{$customer->ALAMAT}}.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table my-4">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th class="text-right">Quantity</th>
                                                        <th class="text-right">Unit Cost</th>
                                                        <th class="text-right">Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sewa_bus_category as $sbc)
                                                    @if($sbc->ID_SEWA_BUS == $sewa_bus->ID_SEWA_BUS)
                                                    <tr class="text-right">
                                                        <td class="text-left">{{ $loop->iteration }}</td>
                                                        <td class="text-left">{{$sbc -> NAMA_CATEGORY}} - 
                                                        {{$sbc -> TUJUAN_SEWA}}
                                                        </td>
                                                        <td>{{$sbc -> QUANTITY}}</td>
                                                        <td>Rp. {{$sbc -> PRICELIST_SEWA}}</td>
                                                        <td>Rp. {{$sbc -> TOTAL}}</td>
                                                    </tr>
                                                    @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="text-right">
                                                <p>Sub - Total : $12,348</p>
                                                <p>DP (25%) : $138</p>
                                                <h4 class="font-weight-800">Total : $13,986</h4>
                                            </div>
                                            <p class="text-center small text-muted  m-t-50">
                                                <span class="row">
                                                    <span class="col-md-6 offset-3">
                                                        Invoice of PT. MDC Trans
                                                    </span>
                                                </span>
                                            </p>
                                        </div>
                                        <div class="text-right d-print-none">
                                            <hr class="my-5">
                                            <a href="#" class="btn btn-primary">Send Invoice</a>
                                            <a href="javascript:window.print()" class="btn btn-success m-l-5">
                                                <i class="ti-printer mr-2"></i> Print
                                            </a>
                                
                        </section>
                        <h3>Schedule Armada</h3>
                        <section class="card card-body border mb-0">
                            <h5>Schedule Sewa Armada</h5>
                            <p>The next and previous buttons help you to navigate through your content.</p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="invoice">
                                        <div class="d-md-flex justify-content-between align-items-center">
                                            <img src="{{ url('assets/media/image/logo/mdc.png') }}" alt="logo">
                                            <h3 class="text-xs-left m-b-0">Invoice #INV-16</h3>
                                        </div>
                                        <hr class="m-t-b-50">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>
                                                    <b>PT. Medina Dzikra Cemerlang Trans</b>
                                                </p>
                                                <p>104,<br>Minare SK,<br>Canada, K1A 0G9.</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="text-right">
                                                    <b>Invoice to</b>
                                                </p>
                                                <p class="text-right">Gaala &amp; Sons,<br> C-201, Beykoz-34800,<br> Canada, K1A 0G9.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table my-4">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="text-right">
                                                    <td class="text-left">1</td>
                                                    <td class="text-left">Brochure Design</td>
                                                    <td>2</td>
                                                    <td>$20</td>
                                                    <td>$40</td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td class="text-left">2</td>
                                                    <td class="text-left">Web Design Packages(Template) - Basic</td>
                                                    <td>05</td>
                                                    <td>$25</td>
                                                    <td>$125</td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td class="text-left">3</td>
                                                    <td class="text-left">Print Ad - Basic - Color</td>
                                                    <td>08</td>
                                                    <td>$500</td>
                                                    <td>$4000</td>
                                                </tr>
                                                <tr class="text-right">
                                                    <td class="text-left">4</td>
                                                    <td class="text-left">Down Coat</td>
                                                    <td>1</td>
                                                    <td>$5</td>
                                                    <td>$5</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right">
                                            <p>Sub - Total amount: $12,348</p>
                                            <p>vat (10%) : $138</p>
                                            <h4 class="font-weight-800">Total : $13,986</h4>
                                        </div>
                                        <p class="text-center small text-muted  m-t-50">
                                            <span class="row">
                                                <span class="col-md-6 offset-3">
                                                    Invoice of PT. MDC Trans
                                                </span>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="text-right d-print-none">
                                        <hr class="my-5">
                                        <a href="#" class="btn btn-primary">Send Invoice</a>
                                        <a href="javascript:window.print()" class="btn btn-success m-l-5">
                                            <i class="ti-printer mr-2"></i> Print
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    
            
@endif
@endsection

@section('script')

<script>
function getModal(event){
        if(event.keyCode==13){
            var key = document.getElementById('search').value;
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:"POST",
                url:"cari",
                data:{
                    "key":key,
                    "_token": "{{ csrf_token() }}",
                },
            success : function(results){
                console.log(JSON.stringify(results));
                var tab = $('#myTable').DataTable();
                tab.clear().draw();

                for(let i=0; i<results.pricelist_sewa.length; i++){
                    $('#myTable').DataTable().row.add([
                        '<input type="checkbox" id="as'+results.pricelist_sewa[i]['ID_PRICELIST']+'">',
                        results.pricelist_sewa[i]['NAMA_CATEGORY'],
                        results.pricelist_sewa[i]['TUJUAN_SEWA'],
                        results.pricelist_sewa[i]['PRICELIST_SEWA'],
                    ]).node().id = 'row'+results.pricelist_sewa[i]['ID_PRICELIST'];
                    $('#myTable').DataTable().draw();
                }
                $("#tambahModal").modal();
            },
            error: function(data){
                console.log(data);
            }
            });
        }
    }

    function tampil_modal(){
      $("#tambahModal").modal();
    }

    function myFunction() {
     document.getElementById("search").value='';
    }
    jQuery( function( $ ) {
        
        $("#save").click(function(){
          var checks = $("#tambahModal").find("input[type=checkbox]:checked");
          var ids = Array();
          for(var i=0;i<checks.length;i++) {
              ids[i] = checks[i].id; 
              $("#"+ids[i]).prop("checked", false);
              ids[i] = ids[i].substring(2,10);
              addRow(ids[i]);
              $("#myTable tbody tr#row"+ids[i]).hide();
          }
        });
      });
    var products = <?php echo json_encode($sewa_bus_category); ?>;
  function addRow(id){
      var index = getIndex(id);
      var id = products[index]["ID_PRICELIST"];
      var name = products[index]["NAMA_CATEGORY"];
      var stock = products[index]["TUJUAN_SEWA"];
      var price = products[index]["PRICELIST_SEWA"];
      var mprice = money(price);
      var markup = "\
      <tr id='"+id+"' style='border: 3px;'>\
	  \
	  <td style='text-align: left; padding-left: 30px;' class='align-middle'>\
	    <div class='row'>\
	      <h3 class='NAMA_CATEGORY' style='font-weight:bold;'>"+name+"</h3></div>\
	    <div class='row'>\
	      <input type='hidden' name='ID_PRICELIST["+id+"]' value="+id+" readonly id='ID_PRICELIST"+id+"'></div>\
	  </td>\
	  \
	  <td style='width: 20%;' class='align-middle'>\
	    <div class='row justify-content-center'>\
      <button class='dec btn btn-sm btn-danger' type='button' onclick='dec(\""+id+"\")'>-</button>\
	    	<input type='number' style='background-color:#f5f5f5; -moz-appearance: textfield; width: 20%; border:1px;text-align: center;' class='quantity' oninput='recount("+id+")' name='jumlah["+id+"]' min='1' id='jumlah"+id+"'required max='"+stock+"' value='1'>\
        <button class='inc btn btn-sm btn-success' type='button' onclick='inc(\""+id+"\")'>+</button>\
	    </div>\
	  </td>\
	  \
	  <td style='text-align: left; width:15%;' class='align-middle'>\
	    <div class='row justify-content-left'>\
	      <input type='hidden' class='selling_price' name='selling_price["+id+"]' id='price"+id+"' value='"+price+"'>\
	        "+""+mprice+"\
	  </div>\
    </td>\
    <td>\
    <div class='row align-text-bottom justify-content-center'>\
	      <div class='col-2 pl-0 pt-1 align-middle'>\
	      <h6 style='text-align: left; font-weight:bold;'></h6></div>\
	      <div class='col-2 px-0 pt-1'>\
	        <input type='number' min='0' max='100' oninput='percentDisc(\""+id+"\")' class='percent' \
	        name='percent["+id+"]' id='percent"+id+"' \
	        placeholder='0' \
	        style='-moz-appearance: textfield;padding-right:5px; text-align:right; width: 30%;color: black;border-radius: 5pt;border: 3px solid #e09a6c;'>\
	        <input type='hidden' min='0' oninput='recount(\""+id+"\")' \
	        class='discount' name='discount["+id+"]' \
	        id='discount"+id+"' placeholder='0' \
	        style='-moz-appearance: textfield;text-align: right;'>\
	        <input type='number' min='0' max='100' oninput='percentTax(\""+id+"\")' class='percentTax' \
	        name='percentTax["+id+"]' id='percentTax"+id+"' \
	        placeholder='10' readonly\
	        style='-moz-appearance: textfield;padding-right:5px; text-align:right; width: 30%;color: black;border-radius: 5pt;border: 3px solid #e0d46c;'>\
	        <input type='hidden' min='0' oninput='recount(\""+id+"\")' \
	        class='discountTax' name='discountTax["+id+"]' \
	        id='discountTax"+id+"' placeholder='0' \
	        style='-moz-appearance: textfield;text-align: right;'>\
	    </div>\
	  </td>\
	  \
	  <td class='align-middle' style='width: 15%;'>\
		  <div class='row align-middle justify-content-end'>\
		  	<input type='hidden' class='total' name='total["+id+"]' min='1' id='total"+id+"' required>\
		  		<h4 style='text-align: left; padding-right: 20px;' id='total-val"+id+"'></h4>\
		  	</div>\
		  </div>\
	  </td>\
	  \
      <td>\
      <div class='row align-text-bottom justify-content-center'>\
      <div style='width: 5%;' class='align-middle'>\
          <i class='badge badge-danger' onclick='delRow(\""+id+"\")' style='cursor: pointer; '>x</i>\
          </div>\
          </div>\
	  </td>\
	</tr>\
	";
	$("#cart tbody").append(markup);
	recount(id);
}
function getIndex(id){
	for(var i = 0;i<products.length;i++){
	  if(products[i]["ID_PRICELIST"] == id){
	      var index = i;
	      return index;
	  }
	}
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
    function recount(id) {
      console.log("function recount");
      var jumlah = document.getElementById("jumlah"+id).value;
      var price = document.getElementById("price"+id).value;
      var subtotal = (jumlah*price);
      document.getElementById("discount"+id).setAttribute("max", subtotal);
      document.getElementById("total"+id).value = subtotal;
      percentDisc(id);
    };
    function delRow(id){
          $('#cart tbody tr#'+id).remove();
          getTotal();
          $("#myTable tbody tr#row"+id).show();
    }
    function percentDisc(id){
      console.log("function percentDisc");
      var percent = document.getElementById("percent"+id).value;
      if(percent>100 || percent<0){
        console.log('masukkk if percent');
        var percent = document.getElementById("percent"+id).value=0;
      }
      var total = document.getElementById("total"+id).value;
      var hasil = (Number(percent)/100) * total;
      document.getElementById("discount"+id).value = hasil;
      document.getElementById("total"+id).value = total;
      document.getElementById("total-val"+id).innerHTML = money(total-hasil);
      getTotal();
    };
    function getTotal(){
      console.log("function getTotal");
      var totals = document.getElementsByClassName("total");
      var i;
      var total_p = 0;
      for (i = 0; i < totals.length; ++i) {
        total_p = total_p + Number(totals[i].value);
      }
      document.getElementById('subtotal').value = total_p ;
      document.getElementById('subtotal-val').innerHTML = money(total_p);
      var discounts = document.getElementsByClassName("discount");
      var i;
      var total_disc = 0;
      for (i = 0; i < discounts.length; ++i){
        total_disc = total_disc + Number(discounts[i].value);
      }
    //  console.log(total_p);
      var l=document.getElementById('total_tax').value=(Number(total_p*0.1));
      // console.log(l);
      document.getElementById('total_tax-val').innerHTML=money(l);
      // console.log(money(l));
      document.getElementById('total_discount').value = total_disc;
      document.getElementById('total_discount-val').innerHTML = money(total_disc);
      let k = (Number(total_p))-total_disc;
      if(k<=0){
        console.log('masuk if k<=0');
        document.getElementById('total_payment').value = 0;
        document.getElementById('total_payment-val').innerHTML = '0';
      }
      else{
        console.log('masuk if k!=0');
        document.getElementById('total_payment').value = (total_p+(Number(total_p*0.1)))-total_disc;
        document.getElementById('total_payment-val').innerHTML = money((total_p+(Number(total_p*0.1)))-total_disc);
      }
     
    };
    function inc(id){
          var oldValue = $("#jumlah"+id).val();
          var newVal = parseFloat(oldValue)+1;
          var maximal = $("#jumlah"+id).attr('max');
          if(!(newVal > maximal)){
            $("#jumlah"+id).val(newVal);
            recount(id);
            console.log("massssuk");
          }
    }
        function dec(id){
          var oldValue = $("#jumlah"+id).val();
          if (parseFloat(oldValue) > 1) {
              var newVal = parseFloat(oldValue)-1;
              $("#jumlah"+id).val(newVal);
          }
          recount(id);
        }
    swal("Welcome to Point of Sales!", "You clicked the button!", "success");
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