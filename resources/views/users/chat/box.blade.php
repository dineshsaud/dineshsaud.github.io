@foreach($messages as $msg)
@if($msg->from == auth()->id())
<div class="px-3 mt-2">
	<div class="col-11 offset-1 bg-info rounded text-white py-1">
		{{ $msg->message }}
	</div>
	<small><small class="d-block text-right"> {{ date_create($msg->created_at)->format('d - M - Y') }}</small></small>
</div>
@else
<div class="px-3 mt-2">
	<div class="col-11 rounded py-1" style="background: #e2e2e2;">
		{{ $msg->message }}
	</div>
	<small><small class="d-block text-left">
	{{ date_create($msg->created_at)->format('d - M - Y') }} (seen)
	</small></small>
</div>
@endif
@endforeach