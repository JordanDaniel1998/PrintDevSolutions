@extends('frontend.layouts.app')

@section('contenido')
    <section class="flex flex-col gap-16">
        <div>
            <img src="{{ asset('images/img/image_5.png') }}" alt="comentarios" class="w-full h-[530px]">
        </div>

        <livewire:posts.view-posts />


    </section>
@endsection


