@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection

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
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-5">

      <div class="col-md-8">
        <form method="POST" action="{{ route('recetas.store') }}" enctype="multipart/form-data" novalidate>
          @csrf

          <div class="form-group">
            <label for="titulo">Título Receta</label>

            <input type="text"
                    name="titulo"
                    class="form-control
                    @error('titulo') is-invalid @enderror"
                    id="titulo"
                    placeholder="Título Receta"
                    value="{{ old('titulo') }}"
            >

            @error('titulo')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="categoria">Categoria</label>

            <select name="categoria" class="form-control @error('categoria') is-invalid @enderror" id="categoria">
              <option value="">-- Seleccione --</option>
              @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}> {{ $categoria->nombre }} </option>
              @endforeach
            </select>

            @error('categoria')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group mt-3">
            <label for="preparacion">Preparación</label>
            <input id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
            <trix-editor class="form-control trix @error('preparacion') is-invalid @enderror" input="preparacion"></trix-editor>

            @error('preparacion')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group mt-3">
            <label for="ingredientes">Ingredientes</label>
            <input id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
            <trix-editor class="form-control trix @error('ingredientes') is-invalid @enderror" input="ingredientes"></trix-editor>

            @error('ingredientes')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group mt-3">
            <label for="imagen">Sube una Imágen</label>
            <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen">

            @error('imagen')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <input 
              type="submit" 
              class="btn 
                    btn-outline-primary
                    text-uppercase
                    font-weight-bold 
                    mt-3" 
              value="Agregar Receta">
          </div>

        </form>
      </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
@endsection

