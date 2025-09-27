<?php

namespace App\Http\Controllers;

use App\Models\Pedidos3900;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class Pedidos3900Controller extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/pedidos",
     *     summary="Mostrar todos los pedidos",
     *     @OA\Response(
     *         response=200,
     *         description="Muestra todos los pedidos."
     *     )
     * )
     */
    public function index() {
        return Pedidos3900::all();
    }

    /**
     * @OA\Get(
     *     path="/api/pedidos/{id}",
     *     summary="Mostrar un pedido",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Muestra un pedido."
     *     )
     * )
     */
    public function show($id) {
        return Pedidos3900::findOrFail($id);
    }

    public function store(Request $request) {
        $request->validate([
            'NombreItem' => 'required|string|max:255',
            'DescripcionItem' => 'nullable|string',
        ]);
        return Pedidos3900::create($request->all());
    }

    public function update(Request $request, $id) {
        $pedido = Pedidos3900::findOrFail($id);
        $pedido->update($request->all());
        return $pedido;
    }

    public function destroy($id) {
        $pedido = Pedidos3900::findOrFail($id);
        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado']);
    }
}