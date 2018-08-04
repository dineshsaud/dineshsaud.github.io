@extends('layouts.blueprint')
@section('content')
<style>
body{
background: #EBF5FB  ;
}
</style>
<div class="container p-1" style="" >
	@if(session('status'))
	<div class="alert alert-danger mt-4">
		{{ session('status') }}
	</div>
	@endif
	@if(session('success'))
	<div class="alert alert-success mt-4">
		{{ session('success') }}
	</div>
	@endif
	<div class="row">
		<div class="col-sm-12 mt-3"">
			<div class="card h-100">
				<div class="row">
					<div class="col-md-5 mt-3 ml-md-3 ">
						<div class="table-bordered" id="img-container" style="height: 400px;">
							@for($i=1; $i<=3; $i++)
							<img src="{{$craft['imgname'.$i] ? '/'.$craft['imgname'.$i]: asset('images/img_3.jpg') }}" alt="product image {{$i}}" style="{{$i>1? 'display:none;': ''}}">
							@endfor
						</div>
						<ul class="pagination d-flex mt-4" id="img-control">
							<div class="m-auto clearfix">
								<li class="page-item float-left"><a href="#" class="page-link">1</a></li>
								<li class="page-item float-left"><a href="#" class="page-link">2</a></li>
								<li class="page-item float-left"><a href="#" class="page-link">3</a></li>
							</div>
						</ul>
					</div>
					
					<div class="col-md-6 ml-md-4 mt-3">
						<div class="table-bordered p-3" id="details">
							<h3 class="text-capitalize">{{ $craft->name }}</h3>
							<div class="row">
								<div class="col-sm-9">
									<p class="craft-description">
										{{ $craft->description }}
									</p>
								</div>
								<div class="col-sm-3">
									<small class="d-block text-center">({{$craft->views}} views)</small>
									<strong class="d-block text-center">{{ $craft->rating }}</strong>
									<span class="d-block text-center">
										@for($i=0; $i < $craft->rating; $i++)
										<i class="fa fa-star" style="color: gold;"></i>
										@endfor
									</span>
									<small class="text-center d-block">{{rating_text($craft->rating)}}</small>
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8">
									<h6>Seller details</h6>
									<hr>
									<ul class="list-unstyled seller-info">
										<li><span>Name</span>: {{ $craft->user->name }}</li>
										<li><span>address</span>: {{ $craft->user->address }}</li>
										<li><span>Email</span>: {{ $craft->user->email }}</li>
										<li><span>phone no</span>: {{ $craft->user->phone_no }}</li>
									</ul>
								</div>
								<div class="col-sm-4 mt-5">
									<strong class="d-block text-right">Category</strong>
									<span class="text-right d-block">{{ $craft->handicrafttype }}</span>
									<span class="c-price mt-2">
										<strong>${{ $craft->price }} </strong>
									</span>
								</div>
							</div>
							<hr>
							<div>
								
								@if($craft->user->id == auth()->id() )
								
								<h5>Its your product</h5>
								@else
								
								<a {{auth()->check() ? 'id=make-deal' : ''}} class="btn btn-info mr-2"
									href="/login"
									data-to="{{ $craft->user->id }}"
									data-from="{{ auth()->id() }}">
									Make deal
								</a>
								@guest
								Create account if new user !! <a href="/customer/register">Create Account</a>
								@endguest
								@endif
							</div>
						</div>
					</div>
				</div>
				<hr>
				{{-- review section --}}
				<div class="row">
					<div class="col-sm-8 mx-3">
						@if($craft->user->id==auth()->id())
						<h5>Your Product Peviews</h5>
						@else
						<h5>Users review</h5>
						<form method="post" class="mb-3 table-bordered px-3 pt-2" action="{{ route('c.review') }}" enctype="multipart/form-data">
							
							@csrf
							<input type="hidden" value="{{auth()->id()}}" name="user_id">
							<input type="hidden" value="{{ $craft->id }}" name="craft_id">
							
							<div class="form-group row">
								<div class="col-6">
									<label for="tittle">Title</label>
									<input id="tittle" type="text" class="form-control" name="tittle" value="{{ old('tittle') }}" required placeholder="Comment title">
								</div>
								
								<div class="col-6">
									<label for="rating">Rate</label>
									<input type="hidden" name="rating" value="0" id="rating">
									<div id="rate-box" class="clearfix pt-2">
										<i class="far fa-star float-left fa-lg" data-val="1">	</i>
										<i class="far fa-star float-left fa-lg" data-val="2">	</i>
										<i class="far fa-star float-left fa-lg" data-val="3">	</i>
										<i class="far fa-star float-left fa-lg" data-val="4">	</i>
										<i class="far fa-star float-left fa-lg" data-val="5">	</i>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="comment">Comment</label>
								<textarea class="form-control" name="comment" rows="5" placeholder="Write your comment here.."></textarea>
							</div>
							<div class="form-group">
								<button class="btn btn-primary px-4">Post</button>
							</div>
						</form>
						@endif
						<div class="table-bordered mb-2">
						@if($craft->reviews->count() > 0)
						@foreach($craft->reviews as $review)
						<div class="my-3">
							<div class="">
								<div class="px-3 clearfix">
									<h5 class="text-capitalize mb-0">
										{{ $review->user->name }} : 
										<span >{{$review->tittle}}</span>
										<span class="float-right">
											@for($rate=0; $rate < $review->rating; $rate++)
											<i class="fa fa-star" style="color:gold;"></i>
											@endfor
										</span>
									</h5>
									
									<p class="px-5 text-justify mb-0 font-italic ml-3">
										{{ $review->comment }}
									</p>
									<small class="d-block px-3 float-left">
									{{ date_create($review->created_at)->format('d - M - Y') }}
									</small>
								</div>
							</div>
						</div>
						<hr class="mb-0 mt-0 bg-dark">
						@endforeach
						@endif
						</div>
					</div>
					@guest
					@else
					<div class="col-sm-3 ml-2 mt-0">
						<div class="table-bordered">
							<h5 class="font-italic">You might Like</h5>
							@if(Auth::user()->gender=='male')
							<a href="{{ route('c.detail', ['id'=> $malePopular->id]) }}" class="malePopular">
								<div class="card" style="background: transparent;">
									<div class="card-image">
										<img class="img-fluid" src="/{{ $malePopular->imgname1 ? $malePopular->imgname1 : asset('images/img_3.jpg') }}" alt="product image" style="height: 180px;width: 100%">
									</div>
									<div class="card-footer">
										<p class="clearfix"><strong class="float-left text-capitalize">{{ $malePopular->name }}</strong>
										</p>
										<p class="clearfix mb-0">
											<strong class="float-left">
											@for($i=0; $i<$malePopular->rating; $i++)
											<i class="fa fa-star" style="color: gold;"></i>
											@endfor
											</strong>
											<small class="float-left">({{ $malePopular->views }} views)</small>
											<strong class="float-right text-success">${{ $malePopular->price }}</strong>
										</p>
									</div>
								</div>
							</a>
							@elseif(Auth::user()->gender=='female')
							<a href="{{ route('c.detail', ['id'=> $femalePopular->id]) }}" class="femalePopular">
								<div class="card">
									<div class="card-image">
										<img class="img-fluid" src="/{{ $femalePopular->imgname1 ? $femalePopular->imgname1 : asset('images/img_3.jpg') }}" alt="product image" style="height: 180px;width: 100%">
									</div>
									<div class="card-footer">
										<p class="clearfix"><strong class="float-left text-capitalize">{{ $femalePopular->name }}</strong>
										</p>
										<p class="clearfix mb-0">
											<strong class="float-left">
											@for($i=0; $i<$femalePopular->rating; $i++)
											<i class="fa fa-star" style="color: gold;"></i>
											@endfor
											</strong>
											<small class="float-left">({{ $femalePopular->views }} views)</small>
											<strong class="float-right text-success">${{ $femalePopular->price }}</strong>
										</p>
									</div>
								</div>
							</a>
							@endif
						</div>
					</div>
					@endguest
				</div>
			</div>
		</div>
	</div>
</div>
<section id="chat-box">
	<div class="bg-info text-white px-3 clearfix">
		<span class="float-left">
			{{ $craft->user->name }} <br>
			{{ $craft->user->email }}
		</span>
		<span class="float-right">
			<i class="fa fa-window-close mt-2 btn pr-0" onclick="$('#chat-box').hide()"></i>
		</span>
	</div>
	<div style="height: 275px;overflow-y: scroll;" id="messages">
		
	</div>
	<hr class="m-0 bg-light">
	<div class="p-3">
		<form action="#" class="clearfix">
			<textarea class="form-control col-10 msg float-left" rows="2" id="message"></textarea>
			<button class="btn btn-info mt-2 float-right" id="send"
			data-seller-id="{{ $craft->user->id }}" data-cus-id="{{ auth()->id() }}">
			<i class="fa fa-arrow-circle-right"></i>
			</button>
		</form>
	</div>
</section>
@endsection
@section("script")
<script>
	$('#img-control li a').off("click").on("click", function(event){
		event.preventDefault();
		$('#img-container img:nth-child('+$(this).text()+')').show().siblings('img').hide();
	});
	// rating concept
setInterval(function() {
for (let i = 1; i <= $('#rating').val(); i++) {
$('#rate-box i:nth-child(' + i + ')').css('color', 'gold');
}
}, 100);
$('#rate-box i').off('mouseover').on('mouseover', function() {
$(this).css('color', 'gold').prevAll('i').css('color', 'gold');
}).off('mouseout').on('mouseout', function() {
$(this).css('color', 'unset').prevAll('i').css('color', 'unset');
}).off('click').on('click', function() {
$('#rating').val($(this).data('val'));
$(this).siblings('i').css('color', 'unset');
$(this).css('color', 'gold').prevAll('i').css('color', 'gold');
});
	
$(document).off('click', '#send').on('click', '#send', function(e) {
e.preventDefault();
let data = {};
data.from = $(this).data('cus-id');
data.to = $(this).data('seller-id');
data.message = $(document).find('textarea#message').val();
let url = '/chat/store';
if (data.message != '')
callAjax({
url: url,
method: 'POST',
data: data
}, function(respnose) {
reload(data.to, data.from);
$(document).find('textarea#message').val('');
});
});
</script>
@endsection