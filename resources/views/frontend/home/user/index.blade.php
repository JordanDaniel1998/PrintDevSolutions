@extends('frontend.layouts.app')

@section('contenido')
    @include('frontend.home.user.components.my-account')
@endsection

@push('scripts')
    @vite(['resources/js/carrito.js'])
@endpush
