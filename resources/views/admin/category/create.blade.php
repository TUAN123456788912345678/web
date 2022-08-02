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
                <div class="card-header">Liệt kê danh sách game</div>
  
                    
                  </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('category.index')}}" class="btn btn-success">Liệt kê danh mục game </a>
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" placeholder="...">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Imge</label>
    <input type="file" class="form-control-file" name="image">
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
    <textarea class="form-control" name="description" placeholder="..."></textarea> 
  </div>
        <div class="form-group">
    <label for="exampleFormControlSelect1">Status</label>
    <select class="form-control" name="status">
      <option value="0">Hiển Thị</option>
      <option value="1">Không Hiển Thị</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection