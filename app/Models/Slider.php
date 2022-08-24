<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    // Model slider
    use HasFactory;
     public $timestamp = false;
    protected $table ='slider';
    protected $fillable =[
        'title', 'description', 'image', 'status','updated_at','created_at'
    ];
}
