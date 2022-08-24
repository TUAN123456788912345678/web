<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // Model User
    protected $table =  'user';
    protected $fillable =[
            'name',
            'password',
            'image',
            'status',
    ];

}
