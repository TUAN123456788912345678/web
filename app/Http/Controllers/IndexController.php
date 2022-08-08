<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Slider;
class IndexController extends Controller
{
    public function home(){
        $slider = Slider::orderBy('id','DESC')->where('status',0)->get();
        $category = Category::orderBy('id','DESC')->get();
        return view('pages.home', compact('category','slider'));
    }
    public function services(){
        $slider = Slider::orderBy('id','DESC')->where('status',0)->get();
        return view('pages.services', compact('slider'));
    }
     public function sub_services(){
        $slider = Slider::orderBy('id','DESC')->where('status',0)->get();
        return view('pages.sub_services', compact('category','slider'));
    }
    public function category(){
        $slider = Slider::orderBy('id','DESC')->where('status',0)->get();
        return view('pages.category',compact('slider'));
    }
     public function sub_category(){
        $slider = Slider::orderBy('id','DESC')->where('status',0)->get();
        return view('pages.sub_category',compact('slider'));
    }

}
