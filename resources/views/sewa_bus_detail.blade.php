@extends('layouts.app')

@section('head')
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="{{ url('vendors/fullcalendar/fullcalendar.min.css') }}" type="text/css">

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
                            <!-- {{ csrf_field() }} -->
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
                        
                        <form action="" method="post">
                        <div data-repeater-list="group-a">
                            <div data-repeater-item>
                                <div class="row">
                                <div class="col-md-2 col-sm-12 form-group">
                                        <label for="name">Category Armada</label>
                                        <select name="ID_CATEGORY" class="form-control" id="ID_CATEGORY1" onchange="getTujuan()">
                                        @foreach($category_armada as $c)
                                       
                                        <option id="ID_CATEGORY1{{$c->ID_CATEGORY}}" value="{{$c->ID_CATEGORY}}" 
                                        data-tujuan="{{$c->ID_CATEGORY}}">{{$c->NAMA_CATEGORY}}</option>
                                       
                                        @endforeach                 
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <label for="name">Tujuan Sewa</label>
                                            <select name="TUJUAN_SEWA" class="form-control" id="TUJUAN_SEWA1" onchange="getHarga()">
                                            @foreach($pricelist_sewa_armada as $pr)
                                        
                                            <option id="TUJUAN_SEWA1{{$pr->ID_PRICELIST}}" value="{{$pr->ID_PRICELIST}}" 
                                            data-pricelist="{{$pr->PRICELIST_SEWA}}">{{$pr->TUJUAN_SEWA}}</option>
                                        
                                            @endforeach                 
                                            </select>
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <label for="hargasewa">Harga</label>
                                        <input type="hargasewa" class="form-control" name="hargasewa" id="hargasewa1" 
                                        value="{{$pr->PRICELIST_SEWA}}" readonly="" onchange="getTotal()">
                                    </div>
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <label for="gender">Quantity</label>
                                        <div>
                                            <input type="number" class="form-control" value="1" id="qty" onchange="getTotal()">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 col-sm-12 form-group">
                                        <label for="profession">Sub Total</label>
                                        <input type="subtotal" class="form-control" name="subtotal" id="subtotal1">
                                    </div>
                                    </div>
                        </div>
                    </div>
                    <div><label>&nbsp;</label></div>
                    <div><label>&nbsp;</label></div>
                    
                    <div data-repeater-list="group-a">
                    <div data-repeater-item>
                        <div class="row">
                            <div class="col-md-2 col-sm-12 form-group">
                                <label for="gender">Total Payment</label>
                                    <input type="text" class="form-control" name="total_payment" id="total_payment">
                            </div>
                                    
                            <div class="col-md-2 col-sm-12 form-group">
                                <label for="profession">DP (25%)</label>
                                    <input type="text" class="form-control" name="dp" id="dp">
                            </div>
                                    
                            <div class="col-md-2 col-sm-12 form-group">
                                <label for="profession">Sisa Bayar</label>
                                    <input type="sisabayar" class="form-control" name="sisabayar" id="sisabayar">
                            </div>
                            </div>

                            </div>
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
   
//    $('#tabelproduk').DataTable().row.add([
//         '<input type="checkbox" id="as'+results.category_armada[i]['ID_CATEGORY']+'">',
//                         results.category_armada[i]['NAMA_CATEGORY'],
//                     ]).node().id = 'row'+results.product[i]['ID_CATEGORY'];
//                     $('#tabelproduk').DataTable().draw();

//    $(document).ready(function(){
//     console.log("hai");
//        $("#add").click(function(){
//            var nilai = $("#TUJUAN_SEWA").attr('select');
//            console.log(nilai);
//        })
//    });

   $.ajaxSetup({
       headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
   });

//    $('#TUJUAN_SEWA1').on('change',function(){
//        console.log("masuk Tujuan SEwa");
//         $('#hargasewa1').val(10000000);
//    });

   
   function getTujuan(){
    var cat = document.getElementById('ID_CATEGORY1').value;
       $.ajax({
           url:"{{url('tujuan')}}",
            data:"category="+cat,
           dataType: "json",
           type: "GET",
           success:function(response){
            // alert("Percoban");
                $('#TUJUAN_SEWA1').empty();
                 $.each(response.data,function(key,item){
                     $('#TUJUAN_SEWA1').append('<option id="TUJUAN_SEWA1'+item.ID_PRICELIST+'"  value"'+item.ID_CATEGORY+'" data-pricelist="'+item.PRICELIST_SEWA+'">'+item.TUJUAN_SEWA+'</option>');
                 });
           }
       });
   }

   function getHarga(){
    var pr = document.getElementById('TUJUAN_SEWA1').value;
       $.ajax({
           url:"{{url('harga')}}",
            data:"price="+pr,
           dataType: "json",
           type: "GET",
           success:function(response){
            // alert("Percoban");
                $('#hargasewa1').empty();
                $.each(response.data,function(key,item){
                     $('#hargasewa1').append('<input type="hargasewa'+'"  value"'+item.PRICELIST_SEWA+'">');
                 });
           }
       });
   }

   function getPrice(){
       console.log("masuk");
       var tujuan = document.getElementById('TUJUAN_SEWA1').value;
      // var tmp = document.getElementsByTagName('select')[0].getAttribute("TUJUAN_SEWA[]");
       //console.log(tmp);
       var ratings =  $('#TUJUAN_SEWA1'+tujuan).data('pricelist');
       var price = document.getElementById('hargasewa1').value;
    //    var harga = $('#TUJUAN_SEWA1'+this.value).data('pricelist');
       console.log(ratings);
       $('#hargasewa1').val(ratings);
   }

   function getTotal(){
       var sub = document.getElementById('hargasewa1').value;
       var kuantiti = document.getElementById('qty').value;
       var subtotal = (Number(sub*kuantiti));
       $('#subtotal1').val(subtotal);
   }

   function getPayment(){
       var sub1 = document.getElementById('subtotal1').value;
       var jumlah = document.getElementById('total_payment').value;
       var subtotal = (Number(sub*kuantiti));
       $('#subtotal1').val(subtotal);
   }

   function percentDP(){
      console.log("function percentDisc");
      var percent = document.getElementById('percent').value;
      if(percent>=25){
        console.log('masukkk if percent');
        var percent = document.getElementById('percent').value=0;
      }
      var total = document.getElementById('total_payment').value;
      var hasil = (Number(percent)/100) * total;
      document.getElementById("dp").value = hasil;
      document.getElementById("total_payment").value = total;
      document.getElementById("sisabayar").innerHTML = money(total-hasil);
      getTotal();
    };

   function getDP(){
       var sub1 = document.getElementById('total_payment').value;
       var jumlah = document.getElementById('dp').value;
       var subtotal = (Number(sub*kuantiti));
       $('#subtotal1').val(subtotal);
   }

</script>

<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="ID_CATEGORY"]').on('change',function(){
               var provinsiID = jQuery(this).val();
               if(provinsiID)
               {
                  jQuery.ajax({
                     url : 'sewa_bus_detail/getTujuan/' +provinsiID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="TUJUAN_SEWA"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="TUJUAN_SEWA"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="TUJUAN_SEWA"]').empty();
               }
            });

            jQuery('select[name="TUJUAN_SEWA"]').on('change',function(){
               var kotaID = jQuery(this).val();
               if(kotaID)
               {
                
                  jQuery.ajax({
                     url : 'sewa_bus_detail/getPrice/' +kotaID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {

                        console.log(data);
                        jQuery('#hargasewa1').val();
                        jQuery.each(data, function(key,value){
                           $('#hargasewa1').val();
                        });
                     }
                  });
               }
               else
               {
                  $('#hargasewa1').empty();
               }
            });
        });
</script>


<script>

$('#save').hide();
$('#add').click(function(){
    $('#save').show();
});
</script>

<!-- Form wizard -->
<script src="{{ url('vendors/form-wizard/jquery.steps.min.js') }}"></script>
<script src="{{ url('assets/js/examples/form-wizard.js') }}"></script>
<script src="{{ url('vendors/jquery/jquery-ui.min.js') }}"></script>

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