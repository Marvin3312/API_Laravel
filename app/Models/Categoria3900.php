<?php


// app/Models/Categoria3900.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Categoria3900 extends Model {
    protected $table = 'Categoria3900';
    protected $primaryKey = 'CategoriaID';
    public $timestamps = false;
    protected $fillable = ['NombreCategoria'];
}
