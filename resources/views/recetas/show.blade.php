@extends('layouts.app')

@section('botones')
    <a 
      href="{{ route('recetas.index') }}" 
      class="btn 
            btn-outline-primary
            text-uppercase
            font-weight-bold 
            mr-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
      </svg>
      Volver
    </a>
@endsection

@section('content')
  {{-- <h1>{{ $receta }}</h1> --}}

  <article class="contenido-receta">
    <h1 class="text-center mb-4">{{ $receta->titulo }}</h1>

    <div class="imagen-receta">
      <img src="/storage/{{ $receta->imagen }}" alt="imagen Autor" class="w-100">
    </div>

    <div class="receta-meta mt-3">

      <p>
        <span class="font-weight-bold text-primary">Escrito en:</span>
        {{ $receta->categoria->nombre }}
      </p>

      <p>
        <span class="font-weight-bold text-primary">Autor:</span>
        {{ $receta->autor->name }}
      </p>

      <p>
        <span class="font-weight-bold text-primary">Fecha:</span>
        @php
          $fecha = $receta->created_at
        @endphp
        <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
      </p>

      

      <div class="ingredientes">
        <h2 class="my-3 text-primary">Ingredientes</h2>

        {!! $receta->ingredientes !!}
      </div>
      
      <div class="preparacion">
        <h2 class="my-3 text-primary">Preparación</h2>

        {!! $receta->preparacion !!}
      </div>

      <div class="justify-content-center row text-center">
        <like-button
        receta-id="{{ $receta->id }}"
        like="{{ $like }}"
        likes="{{ $likes }}"
        ></like-button>
      </div>




    </div>
  </article>
@endsection