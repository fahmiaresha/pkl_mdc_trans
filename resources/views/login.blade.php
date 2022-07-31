@extends('layouts.auth')

@section('content')


    <h5>Log in</h5>
  
    <!-- form -->
    <form action="postlogin" method="post">
    @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="PASSWORD" id="PASSWORD" placeholder="Password" required>
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <!-- <label class="custom-control-label" for="customCheck1">Remember me</label> -->
            </div>
            <a class="small" href="{{ url('pemulihan_pw') }}">Reset password</a>
        </div>
        <hr>
        <!-- <a href ="{{ url('ecommerce-dashboard')}}" class="btn btn-primary btn-block">Log in</a> -->
        <button type ="submit" class="btn btn-primary btn-block">Log in</button>
        <!-- <p class="text-muted">Login with your social media account.</p> -->
        <!-- <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-facebook">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="btn btn-floating btn-google">
                    <i class="fa fa-google"></i>
                </a>
            </li>
        </ul> -->
        <hr>
        <!-- <p class="text-muted">Don't have an account?</p>
        <a href="{{ route('register') }}" class="btn btn-outline-light">Register now!</a> -->
        
    </form>
    @endsection

 @section('script')
    <!-- Sweet alert -->
    <script src="{{ url('assets/js/examples/sweet-alert.js') }}"></script>

    <!-- Prism -->
    <script src="{{ url('vendors/prism/prism.js') }}"></script>


    <!-- ./ form -->
    @if (session('salah'))
        <script>
            swal("Sorry!", "Username/Password Salah!", "error");
        </script>
    @endif

    @endsection





