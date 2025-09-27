<?php

// app/Models/Productos3900.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Productos3900 extends Model {
    protected $table = 'Productos3900';
    protected $primaryKey = 'ProductoID';
    public $timestamps = false;
    protected $fillable = [
        'NombreProducto', 'Descripcion', 'Precio', 'CategoriaID'
    ];
}

