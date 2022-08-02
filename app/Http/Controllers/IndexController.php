<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class IndexController extends Controller
{
    public function home(){
        $category = Category::orderBy('id','DESC')->get();
        return view('pages.home', compact('category'));
    }
    public function services(){
        return view('pages.services');
    }
     public function sub_services(){

        return view('pages.sub_services');
    }
    public function category(){
        return view('pages.category');
    }
     public function sub_category(){

        return view('pages.sub_category');
    }

}
