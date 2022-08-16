@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
    <div class="contaimer mt -5">
    <div class="row">
      <div class="col-md-12">
        @if (session ('status'))
            <h5 class="alert alert-success">{{session('status')}}</h5>
        @endif
        <div class="card">
          <div class="card-header">  
            <h4>Edit User
              <a href="{{ url('home-user') }}" class="btn btn-danger btn-sm float-right">BACK </a>
            </h4>           
          </div>
          <div class="card-body">

            <form action="{{url('update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method ('PUT')
             

               <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">                
              </div>

              <div class="form-group">
                <label for="">password</label>
                <textarea  name="password" class="form-control">{{$user->password}}</textarea>                
              </div>

               <div class="form-group">
                <label for="">User Upload Image:</label>
                <input type="file" name="image" class="form-control">   
                <img src="{{ asset('uploads/user/'.$user->image) }}" width="100px" alt =" Image">             
              </div>

               <div class="form-group">
                <label for="">status</label>
                <input type="checkbox" name="status" {{$user->status == '1' ? 'checked':''}}>  0=visible, 1=hidden                
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>            
              </div>














            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

    @section('content')

@endsection