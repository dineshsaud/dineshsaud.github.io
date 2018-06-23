@extends('layouts.blueprint')

@section('content')

<h1><i>{{$name}} </i></h1>



	<b>
		@if(count($department>0))
			<ul class="list-group">
				@foreach($department as $depart)
					<li class="list-group-item">{{$depart}}</li>
				@endforeach
			</ul>
		@endif

	</b>


@endsection