<?php

namespace App\Http\Controllers;

use App\Models\Categoria3900;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class Categoria3900Controller extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categorias",
     *     summary="Mostrar todas las categorias",
     *     @OA\Response(
     *         response=200,
     *         description="Muestra todas las categorias."
     *     )
     * )
     */
    public function index() {
        return Categoria3900::all();
    }

    /**
     * @OA\Get(
     *     path="/api/categorias/{id}",
     *     summary="Mostrar una categoria",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Muestra una categoria."
     *     )
     * )
     */
    public function show($id) {
        return Categoria3900::findOrFail($id);
    }

    public function store(Request $request) {
        $request->validate([
            'NombreCategoria' => 'required|string|max:255',
        ]);
        return Categoria3900::create($request->all());
    }

    public function update(Request $request, $id) {
        $categoria = Categoria3900::findOrFail($id);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy($id) {
        $categoria = Categoria3900::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada']);
    }
}