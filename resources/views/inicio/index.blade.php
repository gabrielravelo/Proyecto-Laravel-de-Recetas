@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

@section('hero')
  <div class="hero-categorias">
    <form class="container h-100" action="{{ route('buscar.show') }}">
      <div class="row h-100 align-items-center">
        <div class="col-md-4 texto-buscar">
          <p class="display-4">Encuentra una receta para tu próxima comida</p>
          <input type="search" name="buscar" class="form-control" placeholder="Buscar Receta">
        </div>
      </div>
    </form>
  </div>
@endsection

@section('content')
  
  <div class="container nuevas-recetas">
    <h2 class="titulo-categoria text-uppercase mb-4">Últimas Recetas</h2>

    <div class="owl-carousel owl-theme">
      @foreach ($nuevas as $nueva)

        <div class="card ">
          <img src="/storage/{{ $nueva->imagen }}" class="card-img-top" alt="imagen receta">

          <div class="card-body">

            <h3>{{ Str::title( $nueva->titulo ) }}</h3>

            <p>{{ Str::words( strip_tags( $nueva->preparacion ), 20 ) }}</p>

            <a href="{{ route('recetas.show', ['receta' => $nueva->id]) }}"
              class="btn
                    btn-outline-primary
                    d-block
                    font-weight-bold
                    text-uppercase">
              Ver Receta
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 icono" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </a>

          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="container">
    <h2 class="titulo-categoria text-uppercase mt-5 mb-4">Recetas Más Votadas</h2>

    <div class="row">

        @foreach ($votadas as $receta)
          @include('ui.receta')
        @endforeach

    </div>
  </div>

  @foreach($recetas as $key => $grupo)
    <div class="container">
      <h2 class="titulo-categoria text-uppercase mt-5 mb-4">{{ str_replace( '-', ' ' , $key ) }}</h2>

      <div class="row">

        @foreach ($grupo as $recetas)

          @foreach ($recetas as $receta)
            @include('ui.receta')
          @endforeach

        @endforeach

      </div>
    </div>

  @endforeach
@endsection