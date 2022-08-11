<?php

namespace App\Providers;

use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function($view) {
            $categorias = CategoriaReceta::all();
            $view->with('categorias', $categorias);
        });
    }
}
