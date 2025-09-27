<?php

// app/Models/Cliente3900.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cliente3900 extends Model {
    protected $table = 'Cliente3900';
    protected $primaryKey = 'UsuarioID';
    public $timestamps = false;
    protected $fillable = [
        'NombreUsuario', 'Email', 'PasswordHash', 'Nombre', 'Apellido',
        'FechaCreacion', 'UltimoAcceso', 'Estado', 'Rol'
    ];
}
