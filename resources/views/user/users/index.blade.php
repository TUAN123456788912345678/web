@extends('layouts.app')
@section('navbar')
    <div class="container">
        @include('admin.include.navbar')
    </div>
    <div class="contaimer mt -5">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> USer
                <a href="{{url('add-user')}}" class="btn btn-primary btn-sm float-right">Add User </a>
            </h4>
            <div class="card-body">
                <table class="table table-bordered">


                  <thead>

                       <tr>
                          <th>ID</th>
                          <th>Name For USer</th>                           
                          <th>Image</th>
                          <th>Status</th> 
                          
                          
                      </tr>

                </thead>
                <tbody >
                    @foreach($user as $item)
                    <tr>
                      <td>{{ $item->id}}</td>
                      <td>{{ $item->name }}</td>
                      <td>
                          <img src="{{asset('uploads/user/'.$item->image)}}" width="100px" alt ="User Image">
                      </td>
                      
                      <td>
                        @if ($item->status == '1')
                          hidden
                        @else
                          visible
                        @endif
                      </td>

                      <td>
                             <a href="{{ url ('edit-user/'.$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                             <a href="{{ url ('destroy-user/'.$item->id) }}" 
                             onclick="return confirm('are you sure?');"
                             
                             
                             class="btn btn-danger btn-sm">delete</a>                                  
                      </td>
                      
                      
                    </tr>
                    @endforeach

                </tbody>
                </table>

                  
                  

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@section('content')

@endsection