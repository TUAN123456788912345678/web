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
                <div class="card-header">Cập nhật danh mục game </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('category.index')}}" class="btn btn-success">Liệt kê danh mục game </a>
                    <a href="{{route('category.create')}}" class="btn btn-success">Thêm danh mục game </a>
                    <form action="{{route('category.update' ,$category->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" required value="{{($category->title)}}" name="title" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imge</label>
    <input type="file" class="form-control-file" name="image">
    <img src="{{asset('uploads/category/'.$category->image)}}" height="150px" weight="150px">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">updated_at</label>
    <input type="text" class="form-control" value="{{($category->updated_at)}}" name="updated_at" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">created_at</label>
    <input type="text" class="form-control" value="{{($category->created_at)}}" name="created_at" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" required value="{{($category->description)}}" name="description" placeholder="..."></textarea> 
  </div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" required name="status">
        @if($category->status==1)
      <option value="0" selected>Hiển Thị</option>
      <option value="1">Không Hiển Thị</option>
        @else
        <option value="0" >Hiển Thị</option>
        <option value="1" selected>Không Hiển Thị</option>
        @endif
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Sửa</button>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection