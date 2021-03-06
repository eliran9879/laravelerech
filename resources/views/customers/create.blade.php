@extends('layouts.sidebar2')
@section('content')

<h1>Create a new withdrawer</h1>
<form method='post' action="{{action('CustomerController@store')}}">
  {{csrf_field()}}

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="/resources/demos/style.css">



  <div class="form-group">
    <div class="col-md-2">
      <label class="control-label" for="client_name"> Withdrawer name </label></div>
    <div class="col-md-10">
      <input type="text" class="form-control" name="client_name" id="client_name" required>
      <div id="client_nameList">
      </div>
    </div>

<br>

    <div class="col-md-2">
      <label class="control-label" for="account">Id Account</label></div>
    <div class="col-md-10">
      <input type="number" class="form-control" name="account" required>
    </div>
    <br>

    <div class="col-md-2">
      <label class="control-label" for="occupation">Occupation</label></div>
    <div class="col-md-10">
      <select class="form-control" name="occupation" required>
        <option value="real_estate">real_estate</option>
        <option value="industry">industry</option>
        <option value="agriculture"> agriculture</option>

      </select>
    </div>
    <br>

    <div class="col-md-2">
      <label class="control-label" for="adrress">Address</label></div>
    <div class="col-md-10">
      <input type="text" class="form-control" name="adrress" required>
    </div>

    <br>
    <div class="col-md-10">
      <button name="submit" type="submit" value="Save" class="btn btn-success btn-block"> Add</button></div>
</form>
</div>

<script>
  $(document).ready(function() {

    $('#client_name').keyup(function() {
      var query = $(this).val();
      if (query != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
          url: "{{ route('autocomplete.fetch') }}",
          method: "POST",
          data: {
            query: query,
            _token: _token
          },
          success: function(data) {
            $('#client_nameList').fadeIn();
            $('#client_nameList').html(data);
          }
        });
      }
    });

    $(document).on('click', 'li', function() {
      $('#client_name').val($(this).text());
      $('#client_nameList').fadeOut();
    });


  });
</script>


@endsection