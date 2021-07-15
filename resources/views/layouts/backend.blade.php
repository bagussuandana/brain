@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
@endsection
@section('baseScripts')
    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(()=>{
        $('.select2').select2()
        })
    </script>
    @stack('scripts')
@endsection
@section('body')
    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-md-3">
                <x-sidebar/>
            </div>
            <div class="col-md-9">
                @include('alerts')
                @yield('content')
            </div>
        </div>
    </div>
@endsection
