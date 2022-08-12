<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
     public $timestamp = false;
    protected $table ='category';
    protected $fillable =[
        'title', 'description', 'image', 'status', 'content','updated_at','created_at'
    ];
}
