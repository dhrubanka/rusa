@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="d-flex justify-content-between">
        <div class="h1">
            Input Types
        </div>
        <a href="/input-types/create" class="btn btn-primary"> Create New Type</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($types as $type)
                      
            <tr>
              <th scope="row">{{$type->id}}</th>
              <td>{{$type->name}}</td>
              <td><a href="/inputs/{{$type->id}}" class="btn btn-primary">View Inputs</a> <a class="btn btn-success">Edit</a> <a class="btn btn-danger">Delete</a></td>
              
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection