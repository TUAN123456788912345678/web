@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
@endsection
@section('content')
 <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cap nhat slider </div>
  
                    
                  </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('slider.index')}}" class="btn btn-success">Liet ke silder </a>
                    <form action="{{route('slider.update',[$slider->id])}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" required value="{{$slider->title}}" name="title" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imge</label>
    <input type="file" class="form-control-file"   name="image">
    <img src="{{asset('uploads/slider/'.$slider->image)}}" height="150px" weight="150px">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">updated_at</label>
    <input type="text" class="form-control" name="updated_at" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">created_at</label>
    <input type="text" class="form-control" name="created_at" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description" placeholder="...">{{$slider->description}}</textarea> 
  </div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
     <select class="form-control" required name="status">
        @if($slider->status==1)
      <option value="0" selected>Hiển Thị</option>
      <option value="1">Không Hiển Thị</option>
        @else
        <option value="0" >Hiển Thị</option>
        <option value="1" selected>Không Hiển Thị</option>
        @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Cap nhat</button>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection