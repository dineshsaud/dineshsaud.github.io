@extends('layouts.blueprint')
@section('content')
<style>
body{
background: #EBF5FB  ;
}
</style>
<div class="container p-2" style="background:#F9FAFA">
<div class="mt-3" >
	<div class="card-header bg-info text-center" style="">
		<h2 class="font-italic">Forum</h2>
	</div>
	<div class=" table-bordered">
		<div class="p-3 form-control border-0">
			<form action="{{ route('q.post') }}" method="post" enctype="multipart/form-data" >
				@csrf
				<label for="qpost">Your question</label>
				<div class="row">
					<input type="hidden" name="user_id" value="{{auth()->id()}}">
					<div class="col-12 px-3 form-group">
						<textarea  class="form-control" name="question" id="" rows="2" placeholder="Post Your Question here...." required=""></textarea>
					</div>
					
					<div class="form-group col-12 m-0">
						<button class="btn btn-success px-4">Post</button>
					</div>
				</div>
			</form>
		</div>		
	</div>
</div>

	<div id="accordion" class="my-3">
		@if($question->count() > 0)
		@foreach($question as $key => $quest)
		<div class="card mb-1">
			<div class="card-header bg-white" id="heading{{ $key }}">
				<h5 class="mb-0">
					<i class="fa fa-plus table-bordered rounded-circle" style="background: #ccc"></i>
				<small class="">
					<img style="width: 50px; height: 50px; border-radius: 50px;" src="{{$quest->user->image}}" alt="">
				</small>
				<button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
				{{$quest->question}}
				<small style="font-size: 60%" class="text-left d-block text-muted">
					{{ date_create($quest->created_at)->format("d, M, Y") }}
				</small>
				</button>
				</h5>
			</div>
			<div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
				<div class="card-body">
					@if($quest->answers->count() > 0)
					@foreach($quest->answers as $ans)
					<div class="py-2 px-2 rounded clearfix mb-2" style="background: white;">
						<div class="float-left px-3" style="width: 250px;">
							<small class="float-left mr-3">
							<img style="width: 50px; height: 50px; border-radius: 50px;" src="{{$ans->user->image}}" alt="">
							</small>
							<span class="font-weight-bold text-capitalize w-100">
								{{$ans->user->name}}
								<small class="d-block" style="font-size: 60%">
									{{date_create($ans->created_at)->format('d, M, Y')}}
								</small>
							</span>

						</div>
						<div class="pt-2 float-left text-capitalize">
							
							{{$ans->answer}}
							
						</div>
						<div class="float-right">
							<button class="badge btn-primary p-1" name="like">
							<i class="fas fa-thumbs-up fa-sm"></i> {{$ans->likes}}
							</button>
							@if(array_key_exists($ans->id, $likes) && $likes[$ans->id] > 0)
							Liked
							@else
								<a href="{{route('a.like',$ans->id)}}">
									Like
								</a>
							@endif

							<button class="badge btn-warning p-1" name="dislike">
							<i class="fas fa-thumbs-down"></i> {{ $ans->dislikes }}
							</button>
							@if(array_key_exists($ans->id, $likes) && $likes[$ans->id] < 0)
							Disliked
							@else
								<a href="{{route('a.dislike',$ans->id)}}">
								Dislike
								</a>
							@endif
							
						</div>
					</div>
					@endforeach
					@endif
					<form action="{{ route('a.post') }}" method="POST" class="w-100">
						
						@csrf
						<input type="hidden" name="user_id" value="{{auth()->id()}}">
						<input type="hidden" name="question_id" value="{{$quest->id}}">
						<div class="form-group mt-2 px-5">
							<textarea  class="form-control btn-group" placeholder="Write your view here....." name="answer" id="" rows="2" style="border-radius: 20px;" required=""></textarea>
						</div>
						<div class="form-group mx-5">
							<button  type="submit" class="btn btn-primary">Reply</button>
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection