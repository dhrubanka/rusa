@extends('layouts.app')

@section('content')
<div class="container">
 <div class="d-flex justify-content-between">
        <div class="h1">
            My Records
        </div>
        <a href="/records/create" class="btn btn-primary m-1">Record Entry</a> 
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
              
              <th scope="col">Record ID</th>
              <th scope="col">Record Date</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
            @foreach ($records as $record)
                      
            <tr>
             
              <td>{{$record->id}}</td>
              <td>{{$record->created_at}}</td>
              <td><a href="/records/show/{{$record->id}}" class="btn btn-primary">View Record</a> <a class="btn btn-success">Edit</a> <a class="btn btn-danger">Delete</a></td>
              
            </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection