@extends('layouts.sidebar')
@section('content')
<!-- <title>Import Export Excel to database</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> 
</head> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <body> -->
  <!--   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        Import Export Excel to database
        </div>
        <div class="card-body">
            <form action="{{ route('import1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Cov Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export Cov Data</a>
            </form>
        </div>
    </div>
</div>
-->
<!-- </body> -->

<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;">

  <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
    <h2>Covanants Ibi</h2>
    <ol class="list-unstyled">
    </ol>
  </div>

  <div class="col">
    <a href="{{ route('covenants_ibi.create') }}" class="btn btn-sm btn-primary btn-create" id = "aaa">
      @lang('Add a new covanant')</a>
  </div>

  <div class="panel panel-default">

    <br>
    <div class="table-responsive">
      <table class="table" style="text-align:center;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Range (M)</th>
            <th>Max amount (K)</th>
            <th>Approval (%)</th>
            <th>Max general</th>
            <th>Min general</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody style="text-align:center;">
          @foreach($covenantsibis as $covenantibi)
          <tr>

            <td> {{$covenantibi->banks->name}} </td>
            <td> {{$covenantibi->designation}}</td>
            <td> {{$covenantibi->total_month}}</td>
            <td> {{$covenantibi->total_amount}}</td>
            <td> {{$covenantibi->approval}}</td>
            <td> {{$covenantibi->max_percentage_general}}</td>
            <td> {{$covenantibi->min_percentage_general}}</td>
            <td><a href="{{route('covenants_ibi.edit', $covenantibi->id )}}"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" style="width:30px; height:30px; margin-left: -20px; margin-right: auto;"> </a>
            <div class="delete" id= "{{$covenantibi->id}}" >
  <a href="#"> <img src="data:image/png;base64,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"
   style = "width:30px; height:30px; display:block; margin-left: auto; margin-right: -12px; margin-top: -30px;  border: 0px solid #000;" >
   </a></div>
            </td>
        
          </tr>


          @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Central Modal Medium -->
<div class="modal fade" id="confirmModalcovibi" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Warning!</h4>
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          Are you sure to delete ?
        </div>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <div class="modal-footer">
          <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
var user_id;

    $(document).on('click', '.delete', function() {
      user_id = $(this).attr('id');
      $('#confirmModalcovibi').modal('show');
    });

    $('#ok_button').click(function() {
      $.ajax({
        url: "covenants_ibi/destroy/" + user_id,
        beforeSend: function() {
          $('#ok_button').text('Deleting...');
        },
        success: function(data) {
          setTimeout(function() {
            $('#confirmModalcovibi').modal('hide');
            location.reload();
            // $('#user_table').data().ajax.reload();
            //  $("#result").load($data);
            //alert('Data Deleted');
          }, 0);
        }
      })
    });

  });
</script>



@endsection
<style>
   @media (min-width:1000px) {
      #aaa {
         position: absolute;
         right: 1px;
         top: -45px;
      }
   }
</style>