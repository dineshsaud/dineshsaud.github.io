@extends('layouts.blueprint')

@section('content')



<hr>
<form id="create-form"  method="POST" action="post" style="width: 300px;">

{{csrf_field()}}

  <div class="form-group">

    <label for="text">Title</label>

    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Text" name="title">
    @if($errors->any())
    @if($errors->has('title'))
      <span class="alert text-danger form-control">{{$errors->first('title')}}</span>
    @endif
    @endif
  </div>

  <div class="form-group">
  
    <label>Body</label>

  	<textarea id="body" name="body" class="form-control">
		
  	</textarea>
    @if($errors->any())
    @if($errors->has('body'))
      <span class="alert text-danger form-control">{{$errors->first('body')}}</span>
    @endif
    @endif

  </div>

  <div class="form-group">
    
    <button type="submit" class="btn btn-default text-capitalize">publish</button>

  </div>
</form>

@endsection
