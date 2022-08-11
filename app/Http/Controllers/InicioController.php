<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoriaReceta;
use Illuminate\Routing\Controller;

class InicioController extends Controller
{
    //
    public function index()
    {
        // Mostrar las recetas por cantidad de votos
        // $votadas = Receta::has('likes', '>', '1')->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'DESC')->limit(3)->get();

        // Obtener las recetas más nuevas
        $nuevas = Receta::latest()->limit(6)->get();

        // Obtener todas las categorias
        $categorias = CategoriaReceta::all();
        
        // Agrupar las recetas por categoria
        $recetas = [];

        foreach($categorias as $categoria) {
            $recetas [ Str::slug( $categoria->nombre ) ] [] = Receta::where('categoria_id', $categoria->id)->limit(3)->get();
        }
        // return $recetas;

        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
