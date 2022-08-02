<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id','DESC')->paginate(3);
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$request->all();
    

        
        $category = new Category();
        $category->title =$data['title'];
        $category->description =$data['description'];
        $category->status =$data['status'];
        $category->updated_at =$data['updated_at'];
        $category->created_at =$data['created_at'];
        $get_image = $request->image;
        $path = 'uploads/category/';

        $get_name_image =$get_image->getClientOriginalName();

        $name_image = current(explode('.',$get_name_image));
        $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $category->image = $new_image;
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                $data =$request->all();
        $category = Category::find($id);
        $category->title =$data['title'];
        $category->description =$data['description'];
        $category->status =$data['status'];
        $category->updated_at =$data['updated_at'];
        $category->created_at =$data['created_at'];
        $get_image = $request->image;
        if($get_image){
        //bỏ hình ảnh
            $path_unlink ='uploads/category/'.$category->image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
            //thêm mới
        $path = 'uploads/category/';

        $get_name_image =$get_image->getClientOriginalName();

        $name_image = current(explode('.',$get_name_image));
        $new_image =$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $category->image = $new_image;
        }
        $category->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        //bỏ hình ảnh
            $path_unlink ='uploads/category/'.$category->image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
            $category->delete();
            return redirect()->back();
    }
}
