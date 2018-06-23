
@extends('layouts.blueprint')

@section('content')

	<div class="container">
	@foreach($posts as $post)
		<div class="well">
			<header>
				<a href="{{route('post.show', ['id'=> $post->id])}}"><strong class="text-primary">{{ $post->title }}</strong></a>
			</header>
			<p class="text-justify text-muted">
				{{ $post->body }}
			</p>
		</div>
	@endforeach
	</div> 

@endsection