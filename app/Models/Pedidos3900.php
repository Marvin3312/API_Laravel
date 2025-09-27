<?php

// app/Models/Pedidos3900.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Pedidos3900 extends Model {
    protected $table = 'Pedidos3900';
    protected $primaryKey = 'PedidoID';
    public $timestamps = false;
    protected $fillable = ['NombreItem', 'DescripcionItem'];
}
