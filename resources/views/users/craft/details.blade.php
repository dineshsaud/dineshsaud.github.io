@extends('layouts.blueprint')
@section('content')
<div class="container">
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
					<div class="col-sm-5 mt-3 ml-3 ">
						<div class="table-bordered" id="img-container" style="height: 400px;">
							@for($i=1; $i<=3; $i++)
							<img src="{{$craft['imgname'.$i] ? '/'.$craft['imgname'.$i]: asset('images/img_3.jpg') }}" alt="product image {{$i}}" style="{{$i>1?'display:none;': ''}}">
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
					
					<div class="col-sm-6 ml-4 mt-3">
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
										<li><span>Name</span>: {{ $craft->seller->name }}</li>
										<li><span>address</span>: {{ $craft->seller->address }}</li>
										<li><span>Email</span>: {{ $craft->seller->email }}</li>
										<li><span>phone no</span>: {{ $craft->seller->phone_no }}</li>
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
								<button type="button" class="btn btn-info mr-2">Make deal</button>
								Create account if new user !! <a href="/customer/register">Create Account</a>
							</div>
						</div>
					</div>
				</div>
				<hr>
				{{-- review section --}}
				<div class="row ">
					<div class="col-sm-8 mx-3">
						<h5>Users review</h5>
						<form method="post" class="mb-3 table-bordered px-3 pt-2" action="{{ route('c.review') }}" enctype="multipart/form-data">
							
							@csrf
							<input type="hidden" value="{{ session('auth')['id'] }}" name="customer_id">
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
						@if($craft->reviews->count() > 0)
						@foreach($craft->reviews as $review)
						<div class="card mb-3">
							<div class="ratings">
								<div class="px-3 clearfix">
									<span class="float-left">{{ $review->customer->name }} -</span>
									<span class="float-right">
										@for($rate=0; $rate < $review->rating; $rate++)
										<i class="fa fa-star" style="color:gold;"></i>
										@endfor
									</span>
								</div>
								<small class="d-block px-3">
								{{ date_create($review->created_at)->format('d - M - Y') }}
								</small>
								<hr class="mb-0 mt-1">
								<strong class="px-3">{{ $review->tittle }}</strong>
								<p class="px-3 text-justify mb-1">
									{{ $review->comment }}
								</p>
								
							</div>
						</div>
						@endforeach
						@endif
					</div>
					
					<div class="col-sm-3 ml-2 mt-0">
						<div class="table-bordered">
							<h5>sugestion section </h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section("script")
<script>
	$('#img-control li a').off("click").on("click", function(event){
		event.preventDefault();
		$('#img-container img:nth-child('+$(this).text()+')').show().siblings('img').hide();
	});

	// rating concept
	setInterval(function(){
		for(let i=1; i<=$('#rating').val(); i++){
			$('#rate-box i:nth-child('+i+')').css('color', 'gold');
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
</script>
@endsection