@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="d-flex justify-content-between">
        <div class="h1">
            Org Details
        </div>
        <a href="/records/create" class="btn btn-primary"> Create New Record</a>
    </div>

    {{-- <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th> 
            </tr>
          </thead>
          <tbody>
             
                      
            <tr>
              <th scope="row"> </th>
              <td> </td>
              <td><a href="/records/ " class="btn btn-primary">View Record</a> <a class="btn btn-success">Edit</a> <a class="btn btn-danger">Delete</a></td>
              
            </tr>
            
          </tbody>
    </table> --}}
</div>
@endsection