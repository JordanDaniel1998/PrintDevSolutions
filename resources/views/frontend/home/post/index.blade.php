@extends('frontend.layouts.app')

@section('contenido')
    <section class="flex flex-col gap-16">
        <div>
            <img src="{{ asset('images/img/comments.jpg') }}" alt="comentarios" class="w-full h-[530px] object-cover">
        </div>

        <livewire:posts.view-posts />


    </section>
@endsection


