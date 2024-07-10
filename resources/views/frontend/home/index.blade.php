@extends('frontend.layouts.app')

@section('contenido')
<p>Hola venfo desde el home index</p>

@endsection


@push('scripts')
    @vite(['resources/js/carrito.js'])
@endpush



