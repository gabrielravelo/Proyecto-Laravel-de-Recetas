<div class="col-md-4 mt-4">

  <div class="card shadow">

    <img src="/storage/{{ $receta->imagen }}" alt="imagen receta" class="card-img-top">

    <div class="card-body">

      <h3 class="card-title">{{ Str::title( $receta->titulo ) }}</h3>

      <div class="meta-receta d-flex justify-content-between">

        @php
          $fecha = $receta->created_at
        @endphp

        <p class="text-primary fecha font-weight-bold">
          <fecha-receta fecha="{{ $fecha }}"></fecha-receta>
        </p>

        <p>
          {{ count( $receta->likes ) }} Les gustó
        </p>

      </div>

      <p>
        {{ Str::words( strip_tags( $receta->preparacion ), 20 ) }}
      </p>

      <a href="{{ route('recetas.show', ['receta' => $receta->id]) }}"
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

</div>