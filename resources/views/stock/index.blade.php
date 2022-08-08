@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
    <h2>
        Stocks
    </h2>
    {{-- <a href="/stocks/create/{{$record_id}}" class="btn btn-primary m-1">Stock Create</a>  --}}
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h5>Total stocks : </h5> <b>{{$total}}  </b>
        </div>
        <div class="col-md-4">
            <h5>Used stocks : </h5> <b>{{$used}}</b>
        </div>
        <div class="col-md-4">
            <h5>Available Stocks : </h5> <b>{{$free}}</b>
        </div>
         
    </div>
<hr>
@foreach($particulars as $particular)
 <div><h5>Total {{$particular->name}} stocks: <b> {{$particular->value}} </b>,
    Used Stocks : <b> {{$particular->used}} </b>,
    Available Stocks: <b> {{$particular->available}} </b>
    <form method="POST" action="/stocks/create/" >
    @csrf
    <input type="hidden" class="hidden" name="name" value="{{$particular->name}}">
    <input type="hidden" class="hidden" name="available" value="{{$particular->available}}">
    <input type="hidden" class="hidden" name="record_id" value="{{$record_id}}">
    <button type="submit" class="btn btn-primary">ISSUE THIS STOCK</button>
    </h5> 
    </form>
</div>

@endforeach
<hr>
    <table  class="table">
        <thead>
          <tr>
            <th scope="col">Stock Name</th>
            <th scope="col">Stock Issued</th>
            <th scope="col">Issue Person</th>
            <th scope="col">Receive Person</th>
            <th scope="col">Date of Receive</th>
          </tr>
        </thead>
        <tbody>
           
          @foreach ($stocks as $stock)
          <tr>
              <td>{{$stock->name}}</td>  
              <td>{{$stock->stock_number}}</td>  
              <td>{{$stock->issue_person}}</td>  
              <td>{{$stock->receive_person}}</td>  
              <td>{{$stock->date_of_receive}}</td>  
          </tr>
          @endforeach
        </body>
      </table>
</div>
@endsection