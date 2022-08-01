@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="d-flex justify-content-between">
        <div class="h1">
            All Organisations
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
              
              <th scope="col">Organisation Name</th>
              <th scope="col">Date of Account Creation</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($records as $record)
                      
            <tr>
             
              <td>{{$record->user->name}}</td>
              <td>{{$record->created_at}}</td>
              <td><a href="/org/{{$record->user_id}}" class="btn btn-primary">View Org</a> <a class="btn btn-success">Edit</a> <a class="btn btn-danger">Delete</a></td>
              
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection