@extends('layouts.auth')

@section('head')

    <link rel="stylesheet" href="{{ url('vendors/form-wizard/jquery.steps.css') }}" type="text/css">

@endsection

@section('content')

    <h5 align="center">Reset password</h5>

    <!-- form -->
    <!-- @foreach($pengguna as $png)
    @endforeach -->
        <div class="row">
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="Masukkan Email Anda" name="email" id="email1">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary btn-block" onclick="loadpertanyaan()">load</button>
            </div>
        </div>
    <form action="/pw_update" method="POST">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $png->ID_PENGGUNA }}"> <br/>
        
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan Pertanyaan Pemulihan Sandi" name="PERTANYAAN" id="PERTANYAAN1" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Masukkan Jawaban Pemulihan Sandi" name="JAWABAN" id="JAWABAN" required autofocus>
        </div>
        <button class="btn btn-primary btn-block">Submit</button>
        <hr>
        <!-- <p class="text-muted">Take a different action.</p> -->
        <!-- <a href="{{ route('register') }}" class="btn btn-outline-light mr-1">Register now!</a> -->
        
        <!-- <a href="{{ url('login') }}" class="btn btn-outline-light ml-1">Sign In</a> -->
        <!-- <hr>
                            <div class="clearfix col-lg-3" align="center">
                            <button class="btn btn-primary btn-block">Submit</button>
                            </div>
    </form> -->
    </form>
    
    
    <!-- ./ form -->

@endsection
<script>

function loadpertanyaan(){
    var p = document.getElementById('email1').value;
    $.ajax({
           url:"{{url('pertanyaan')}}",
           data:"email="+p,
           dataType: "json",
           type: "GET",
           success:function(response){
            // alert("Percoban");
                $('#PERTANYAAN1').val(response.data[0].PERTANYAAN);
           }
       });
}

</script>
@section('script')

<!-- Form wizard -->
<script src="{{ url('vendors/form-wizard/jquery.steps.min.js') }}"></script>
<script src="{{ url('assets/js/examples/form-wizard.js') }}"></script>
<script src="{{ url('vendors/jquery/jquery-ui.min.js') }}"></script>

@endsection