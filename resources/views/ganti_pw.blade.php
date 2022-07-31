@extends('layouts.auth')

@section('head')

    <link rel="stylesheet" href="{{ url('vendors/form-wizard/jquery.steps.css') }}" type="text/css">

@endsection

@section('content')
    <h5 align="center">Reset password</h5>

    <form action="/sandi_update" method="POST">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $pengguna->ID_PENGGUNA }}"> <br/>
        
        <div class="form-group">
            <input type="password" class="form-control" id="password1" name="password" placeholder="Input New Password">                 
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="copas1" name="copas" onkeyup="cekPass()" placeholder="Confirm Password">
                <p id="error" style="color:red"></p>
        </div>
        <button class="btn btn-primary btn-block">Submit</button>
        <hr>
        <!-- <p class="text-muted">Take a different action.</p> -->
        <!-- <a href="{{ route('register') }}" class="btn btn-outline-light mr-1">Register now!</a> -->
        <!-- or
        <a href="{{ url('login') }}" class="btn btn-outline-light ml-1">Sign In</a> -->
        <!-- <hr>
                            <div class="clearfix col-lg-3" align="center">
                            <button class="btn btn-primary btn-block">Submit</button>
                            </div>
    </form> -->
    </form>
    
    
    <!-- ./ form -->

@endsection
<script>

function cekPass()
                {
                var pass = document.getElementById('password1').value;
                var copass = document.getElementById('copas1').value;
                var text = document.getElementById('error');
                if(pass != copass)
                {
                text.style.color = 'red';
                text.innerHTML='Password not Match';
                }
                else
                {
                text.style.color = 'green';
                text.innerHTML='Password Match';
                }

                }

</script>
@section('script')

<!-- Form wizard -->
<script src="{{ url('vendors/form-wizard/jquery.steps.min.js') }}"></script>
<script src="{{ url('assets/js/examples/form-wizard.js') }}"></script>
<script src="{{ url('vendors/jquery/jquery-ui.min.js') }}"></script>

@endsection