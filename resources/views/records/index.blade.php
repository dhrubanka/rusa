@extends('layouts.app')

@section('content')
<div class="container" >
   
    <div class="d-flex flex-row-reverse  ">
      @if ($record== null)
          
       

        <a href="/records/create" class="btn btn-primary m-1"> Create New Record</a></div>
       
      @endif     
        <button class="btn btn-success m-1"  onclick="printData()">Print</button> 
        <a href="/records/edit/" class="btn btn-primary m-1">Edit</a> 
    </div>

    
    <table class="table " id="printTable">
        <thead>
            <tr>
              <h3>My Record</h3>
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
</div>
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