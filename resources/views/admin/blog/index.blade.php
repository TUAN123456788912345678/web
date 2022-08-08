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
                <div class="card-header">Liệt kê slider game</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{route('slider.create')}}" class="btn btn-success">Thêm slider </a>
                   <table class="table table-striped" id="myTable">
                    
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên Slider</th>
        <th>Mô Tả</th>
        <th>Hiển Thị</th>
        <th>Hình Ảnh</th>
        <th>Quản lý</th>
        <th></th> 
      </tr>
    </thead>
    <tbody>
      @foreach($slider as $key => $sli)
      <tr>
         <td>{{$key}}</td>
         <td>{{$sli->title}}</td>
         <td>{{$sli->description}}</td>
         <td>
            @if($sli->status==0)
            không hiển thị
            @else
            hiển thị
            @endif
         </td>
         <td><img src="{{asset('uploads/slider/'.$sli->image)}}" height="150px" weight="150px"></td>
         <td>
         <form action="{{route('slider.destroy',[$sli->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Bạn có muốn xoá silder game này không');" class="btn btn-danger">Delete</button>
         </form>
            <a href="{{route('slider.edit' , $sli->id)}}" class="btn btn-warning">Sửa</a>
         </td>
      </tr>
      @endforeach

    </tbody>
  </table>
                {{$slider->links('pagination::bootstrap-4')}}  
                </div>
            </div>
        </div>
    </div>
</div>


@endsection