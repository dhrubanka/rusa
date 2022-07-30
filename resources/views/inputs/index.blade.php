@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="d-flex justify-content-between">
        <div class="h1">
           {{$name}} Inputs
        </div>
        <a href="/inputs/create/{{$id}}" class="btn btn-primary"> Create New Input</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
               
              <th scope="col">Parent Input Type</th>
              <th scope="col">Input Name</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($inputs as $input)
                      
            <tr>
              
              <td>{{$input->inputtype->name}}</td>
              <td>{{$input->name}}</td>
              <td> <a class="btn btn-success">Edit</a> <a class="btn btn-danger">Delete</a></td>
              
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection