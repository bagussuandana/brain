@extends('layouts.base')
@section('baseStyles')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('baseScripts')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
@endsection
@section('body')
    <x-navbar/>
    <div class="mt-4">
        @yield('content')
    </div>
    <footer class="mt-5 border-top py-5">
        <div class="container">Lorem ipsum dolor sit amet.</div>
    </footer>
@endsection