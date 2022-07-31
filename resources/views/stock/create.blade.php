@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($message = Session::get('success'))
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                  </svg>
            </div>

            <div class="alert alert-success d-flex align-items-center" role="alert" style="margin:10px">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                {{$message}}
              </div>
            </div>
        @endif
        </div>
         <div class="card col-12 offset-md-2 col-md-8">
             <div class="card-header row" style="padding-top: 25px;">
                 <h5 class="card-title col-12 col-md-8">Insert Record</h5>
             </div>
             <div class="card-body" >
                 <form method="POST" action="/records/store">
                    @csrf
                    <div class="mb-3">
                      <label for="fund" class="form-label">Input Types</label>
                      <select class="form-select" name="inputtype" id="inputtype" aria-label="Default select example">
                        <option selected>Select Input Type</option>
                        @foreach ($inputtypes as $input)
                          <option value="{{$input->id}}">{{$input->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                      <div id="particulars"></div>
                    </div>
                     
                    <input type="text" class="form-control" name="record_id" value="{{$record_id}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stock Number</label>
                        <input type="text" class="form-control" name="stock_number" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Receive Person</label>
                      <input type="text" class="form-control" name="unique_id" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                  
                     
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Date of Receive</label>
                      <input type="date" class="form-control" name="date_of_receive" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                 </form>
            </div>

         </div>
          
     </div>
</div>
<script>
  $(document).ready(function() {
      $('#inputtype').on('change', function() {
          let id = $(this).val();
          $('#particulars').empty();
          $('#monetary').empty();
          $.ajax({
              type: 'GET',
              url: '/records/getTypes/' + id,
              success: function(response) {
                  var response = JSON.parse(response);
                  console.log(response);
                  $('#particulars').empty();
                  $('#particulars').append(
                 `  
                    <hr><label for="1" class="form-label"> Name of Stock </label> 
                    </br>
                    <select class="form-select" name="name" id="1" aria-label="Default select example">
                    <option selected> Select </option>
                 
                    `
                  ); 
                  var i = 0;
                  response.forEach(element => {
                    // $('#particulars').append(
                    //       `<option value="${element['name']}">${element['name']}</option>`
                    //   );
                    var options += `<option value="${element['name']}">${element['name']}</option>`;
                    i++;
                   
                  });
                  $('#particulars').append(options);
                  $('#particulars').append(
                 ` </select> `);
                  
              }
          });
      });
  });
  </script>
@endsection