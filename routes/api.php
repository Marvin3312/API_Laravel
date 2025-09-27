<?php

// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente3900Controller;
use App\Http\Controllers\Productos3900Controller;
use App\Http\Controllers\Pedidos3900Controller;
use App\Http\Controllers\Categoria3900Controller;

Route::apiResource('clientes', Cliente3900Controller::class)->only(['index', 'show']);
Route::apiResource('productos', Productos3900Controller::class)->only(['index', 'show']);
Route::apiResource('pedidos', Pedidos3900Controller::class)->only(['index', 'show']);
Route::apiResource('categorias', Categoria3900Controller::class)->only(['index', 'show']);