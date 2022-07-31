@extends('layouts.app')

@section('head')
    <!-- Fullcalendar -->
    <link rel="stylesheet" href="{{ url('vendors/fullcalendar/fullcalendar.min.css') }}" type="text/css">

    <!-- Clockpicker -->
    <link rel="stylesheet" href="{{ url('vendors/clockpicker/bootstrap-clockpicker.min.css') }}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ url('vendors/datepicker/daterangepicker.css') }}" type="text/css">
@endsection

@section('content')

@if(\Session::has('kasir') || \Session::has('admin'))
    <div class="page-header">
        <div class="page-title">
            <h3>Schedule Armada</h3>
            <div>
                <!-- <button class="btn btn-primary" data-toggle="modal"
                        data-target="#createEventModal">
                    <i class="ti-plus mr-2"></i> Create Schedule
                </button> -->
            </div>
        </div>
    </div>
    
    <div class="row app-block mb-4">
        <div class="col-md-3 app-sidebar">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-2">Armada</h6>
                    <p class="text-muted">Armada On Schedule</p>
                    <div class="list-group mb-3" id="external-events">
                    @foreach($schedule_armada as $schdl)
                        <div class="list-group-item px-0">
                            <i class="fa fa-bus text-success" data-icon="car"></i>
                                {{$schdl->NAMA_CATEGORY}} - {{$schdl->PLAT_NOMOR}}
                        </div>
                    @endforeach
                    </div>
                    <!-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="drop-remove" checked="">
                        <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                    </div> -->
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
    
    <!-- begin::Create Event Modal -->
    <div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                
                    <form method="post" autocomplete="off" action="/scheduleupdate">
                    @csrf
                    <input type="hidden" name="ID_SCHEDULE" id="ID_SCHEDULE">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer</label>
                            <div class="col-sm-9">
                                <div class="NAMA_CUSTOMER"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <div class="TUJUAN_SEWA"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Status Schedule</label>
                            <div class="col-sm-9">
                                <div class="STATUS_ARMADA">
                                <input type="hidden" class="form-control" id="STATUS_ARMADA"  name="STATUS_ARMADA">
                                </div>

                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <div class="col-sm-9">
                                <button type="submit" id="btn-save" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- begin::Event Info Modal -->
    <!-- <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <span class="event-icon mr-2"></span>
                        <span class="event-title">Modal Title</span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                {{ csrf_field() }}
                    <label for="ID_ARMADA">Armada</label>
                        <select name="ID_ARMADA" class="form-control" id="ID_ARMADA">
                            @foreach($armada as $c)
                                       
                                <option value="{{$c->ID_ARMADA}}">{{$c->NAMA_CATEGORY}}   -  {{$c->PLAT_NOMOR}}</option>
                                       
                            @endforeach                 
                        </select>
                        <button type="submit" class="btn btn-primary" id="berhasil">Add</button>
                    <div class="event-body"></div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end::Event Info Modal -->
@endif
@endsection

@section('script')
<script>

    console.log('x : ')
        const x = document.getElementsByClassName('post0');
            for(let i=0;i<x.length;i++){
                x[i].addEventListener('click',function(){
                    x[i].submit();
                    });
                }

</script>
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
@endsection
