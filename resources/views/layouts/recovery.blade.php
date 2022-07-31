<!doctype html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. MDC Trans Lamongan</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/bus.png') }}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">

@yield('head')

<!-- App css -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
@if(trim($__env->yieldContent('bodyClass')))
<body class="@yield('bodyClass')">
@else
<body class="dark small-navigation">
@endif
<!-- Preloader -->
<div class="preloader">
    <img class="logo" src="{{ url('assets/media/image/logo/logo.png') }}" alt="logo">
    <img class="dark-logo" src="{{ url('assets/media/image/logo/dark-logo.png') }}" alt="logo dark">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->

<!-- Sidebar group -->

<!-- ./ Sidebar group -->

<!-- Layout wrapper -->
<div class="layout-wrapper">
    <!-- Header -->
    
    <!-- ./ Header -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Navigation -->
       
        <!-- ./ Navigation -->

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- ./ Content -->

            <!-- Footer -->
            
            <!-- session PHP -->
            
            <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="{{ url('vendors/bundle.js') }}"></script>

@yield('script')

<!-- App scripts -->
<script src="{{ url('assets/js/app.min.js') }}"></script>

<!--session JS-->
<script>
        var c = 0; max_count = 10; logout = true;
        startTimer();

        function startTimer(){
            setTimeout(function(){
                logout = true;
                c = 0; 
                max_count = 10;
                $('#timer').html(max_count);
                $('#logout_popup').modal('show');
                startCount();

            }, 30*60*1000);//10 detik =10*1000, 30 menit=30*60*1000, 
         
        }

        function resetTimer(){
            logout = false;
            $('#logout_popup').modal('hide');
            startTimer();
        }

        function chooseOut(){
            logout = false;
            $('#logout_popup').modal('hide');
            // alert('Your time is expired');
            window.location='/';
            // startTimer();
        }

        function timedCount() {
            c = c + 1;
            if(c<=10){
            remaining_time = max_count - c;
                if( remaining_time == 0 && logout ){
                    $('#logout_popup').modal('hide');
                    //location.href = $('#logout_url').val();
                    chooseOut();
                }
                else{
                    $('#timer').html(remaining_time);
                    t = setTimeout(function(){timedCount()}, 1000);
                }
        }
            else{
                startTimer();
            }
        }

        function startCount() {
           timedCount();
        }

        function press(){
            $('#logout_popup').modal('hide');
            console.log('press');
            resetTimer();
        }

    </script>
</body>
</html>
