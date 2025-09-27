<?php
namespace App\Http\Controllers;

use App\Models\Cliente3900;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

class Cliente3900Controller extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/clientes",
     *     summary="Mostrar todos los clientes",
     *     @OA\Response(
     *         response=200,
     *         description="Muestra todos los clientes."
     *     )
     * )
     */
    public function index() {
        return Cliente3900::all();
    }

    /**
     * @OA\Get(
     *     path="/api/clientes/{id}",
     *     summary="Mostrar un cliente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Muestra un cliente."
     *     )
     * )
     */
    public function show($id) {
        return Cliente3900::findOrFail($id);
    }

    public function store(Request $request) {
        return Cliente3900::create($request->all());
    }

    public function update(Request $request, $id) {
        $cliente = Cliente3900::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }

    public function destroy($id) {
        $cliente = Cliente3900::findOrFail($id);
        $cliente->delete();
        return response()->json(['message' => 'Cliente eliminado']);
    }
}