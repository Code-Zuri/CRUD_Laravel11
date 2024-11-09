<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define que la tabla es 'users' en lugar de 'profiles'
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'rol', 'password'];  // Asegúrate de incluir 'password' en $fillable

    protected $hidden = ['password'];  // Esto oculta la contraseña cuando se recupera el usuario
}