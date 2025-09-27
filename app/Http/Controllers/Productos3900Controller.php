<?php

namespace App\Http\Controllers;

use App\Models\Productos3900;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class Productos3900Controller extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/productos",
     *     summary="Mostrar todos los productos",
     *     @OA\Response(
     *         response=200,
     *         description="Muestra todos los productos."
     *     )
     * )
     */
    public function index() {
        return Productos3900::all();
    }

    /**
     * @OA\Get(
     *     path="/api/productos/{id}",
     *     summary="Mostrar un producto",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Muestra un producto."
     *     )
     * )
     */
    public function show($id) {
        return Productos3900::findOrFail($id);
    }

    public function store(Request $request) {
        $request->validate([
            'NombreProducto' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Precio' => 'nullable|numeric',
            'CategoriaID' => 'nullable|integer|exists:Categoria3900,CategoriaID',
        ]);
        return Productos3900::create($request->all());
    }

    public function update(Request $request, $id) {
        $producto = Productos3900::findOrFail($id);
        $producto->update($request->all());
        return $producto;
    }

    public function destroy($id) {
        $producto = Productos3900::findOrFail($id);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}