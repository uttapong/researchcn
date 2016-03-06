@if(isset($msg))
<div class="alert alert-dismissible alert-{{$alert_type}}" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{$msg}}</div>
@endif
@if(isset($errors))
@if (count($errors) > 0)
<div class="alert alert-danger col-md-12">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
@endif
