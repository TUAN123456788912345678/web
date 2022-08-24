<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    // User Controller
    public function index()
    {
        $user = User::all();
        return view('user.users.index',compact('user'));
    }
// Tao moi user
    public function create()
    {
        return view('user.users.create');
    }

    
// View user
    public function store(Request $request)
    {   
        $user = new User();
        $user->name = $request->input('name');
        $user->password= $request->input('password');
        $user->status= $request->input('password');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/user/',$filename);
            $user->image = $filename ;

        }
        $user->status = $request->input('status') == true ? '1':'0';
        $user->save();
        return redirect()->back()->with('status','added User Successfully');
    }


   
   

    


// Chinh sua user kéo dữ liệu về
    public function edit($id)
    {
        $user = User::find($id);
 
        return view('user.users.edit',compact('user'));
    }

// Chỉnh sửa user Đẩy dữ liệu lên
    public function update(Request $request, $id)
    {   
        $user = new User();
        $user->name = $request->input('name');
        $user->password= $request->input('password');
        $user->status= $request->input('password');

        if($request->hasfile('image'))
        {
            $destination = 'uploads/user/'.$user->image;
            if(File::exists($destination)){
                   File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/user/',$filename);
            $user->image = $filename ;

        }
        $user->status = $request->input('status') == true ? '1':'0';
        $user->save();
        return redirect()->back()->with('status','User update Successfully');
    }

// Xoa dữ liệu user dựa trênn id
    public function destroy(User $user)
    {
        //
        if ($user-> count() > 0 ){

               $destination = 'uploads/user/'.$user->image;
               if(File::exists($destination)){
                  File::delete($destination);
                 }   

        $user->delete(); 
        
        return redirect()->back()->with('status','USer Delete Successfully');
        }
        return redirect()->back()->with('status','error ');
    }

}
