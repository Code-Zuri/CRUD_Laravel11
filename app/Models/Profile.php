<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define que la tabla es users 
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'rol', 'password'];  

    protected $hidden = ['password'];
}