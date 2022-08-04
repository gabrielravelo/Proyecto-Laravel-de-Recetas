<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $recetas = ['Receta pizza', 'Receta hamburguesa', 'Receta tacos'];
        $categorias = ['Comida venezolana', 'Comida Mexicana', 'Postres'];

        // sintaxis with
        // return view('recetas.index')
        //     ->with('recetas', $recetas)
        //     ->with('categorias', $categorias);


        // sintaxis compact
        return view('recetas.index', compact('recetas', 'categorias'));
    }
}
