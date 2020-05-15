@extends('layouts.sidebar3')
@section('content')
  

<h1>Edit Mizrahi's Covenants </h1>
<form method = 'post' action="{{action('CovenantsmizrahiController@update', $covenantsmizrahis->id)}}">
@csrf
@method('PATCH')
<div class = "form-group">
    <label for = "title">Designation:</label>
    <input type= "text" class = "form-control" name= "designation" value = "{{$covenantsmizrahis->designation}}">
</div>

<div class = "form-group">
    <label for = "title">Range:</label>
    <input type= "text" class = "form-control" name= "total_month" value = "{{$covenantsmizrahis->total_month}}">
</div>

<div class = "form-group">
    <label for = "title">Approval:</label>
    <input type= "text" class = "form-control" name= "approval" value = "{{$covenantsmizrahis->approval}}">
</div>

<div class = "form-group">
    <label for = "title">Max Aprroval:</label>
    <input type= "text" class = "form-control" name= "max_approval" value = "{{$covenantsmizrahis->max_approval}}">
</div>

<div class = "form-group">
    <label for = "title">Type check:</label>
    <input type= "text" class = "form-control" name= "type_check" value = "{{$covenantsmizrahis->type_check}}">
</div>


<div class = "form-group">
    <input type ="submit" class = "form-control" name="submit" value ="Just Do It">
</div>

</form>




@endsection
