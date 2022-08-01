@extends('layouts.app')

@section('content')
<div class="container" >
   
    <div class="d-flex flex-row-reverse  ">
      @if ($record->isNotEmpty())
        <button class="btn btn-success m-1"  onclick="printData()">Print</button> 
        <a href="/records/edit/" class="btn btn-danger m-1">Edit</a> 
        <a href="/stocks/create/{{$record[0]->id}}" class="btn btn-primary m-1">Stock Create</a> 
      @else  
        <a href="/records/create" class="btn btn-primary m-1"> Record Entry</a></div>
      @endif
    </div>
    @if ($record->isNotEmpty())
    <div  id="printTable">
    <table class="table ">
        <thead>
            <tr>
              <h3 class="text-center">My Record</h3>
            </tr>
          </thead>
          <tbody>
            <th scope="row"> <h3>Particulars of the Asset : </h3></th>
                     
              @foreach ($record[0]->particulars as $particular)
              <tr>
              <td> 
               <h6> <b> {{$particular->name}} </b></h6>
               </td>
               <td>
                {{$particular->value}} (Quantities)
               </td>   
              </tr> 
              @endforeach
             
           
            <th scope="row"><h3>Monetary Values :</h3></th>

              @foreach ($record[0]->monetaries as $monetary)
              <tr>
              <td> 
               <h6> <b> {{$monetary->name}} </b> </h6>
               </td>
               <td>
                {{$monetary->value}} PER UNIT COST
               </td>    
              </tr>
              @endforeach
             
          
            <tr>
              <th scope="row"> <h4> Fund Source </h4>   </th>
              
              <td>
                {{$record[0]->fund_source}}
              </td>
            </tr>
            <tr>
              <th scope="row"> <h4> Specification of the Asset </h4></th>
               
              <td>
                {{$record[0]->specification_of_the_asset}}
              </td>
            </tr>

            <tr>
              <th scope="row"><h4>Unique ID </h4> </th>
              
              <td>
                {{$record[0]->unique_id}}
              </td>
            </tr>

            <tr>
              <th scope="row"> <h4>Mode of Purchase </h4></th>
              
              <td>
                {{$record[0]->mode_of_purchase}}
              </td>
            </tr>

            <tr>
              <th scope="row"> <h4>Date of Purchase</h4></th>
               
              <td>
                {{$record[0]->date_of_purchase}}
              </td>
            </tr>

          </tbody>
    </table>
    <h3>Stocks</h3>
    <table  class="table">
      <thead>
        <tr>
          <th scope="col">Stock Name</th>
          <th scope="col">Stock Number</th>
          <th scope="col">Issue Person</th>
          <th scope="col">Receive Person</th>
          <th scope="col">Date of Receive</th>
        </tr>
      </thead>
      <tbody>
         
        @foreach ($record[0]->stocks as $stock)
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
  @else  <div class="text-center p-5" >
        <h1>No Record Found !
         <br> Enter your Record</h1>
        </div>
      @endif
</div class="mb-5">
<script>
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

</script>
@endsection