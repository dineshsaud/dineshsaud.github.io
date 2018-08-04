@extends('layouts.blueprint')
@section('content')
<style>
	body{
background: #EBF5FB  ;

}
</style>
<div class="container p-1" style="background-color: #F9FAFA">
	<style>
	[name] {
		box-shadow: inset 0px 0px 20px 0px lightblue;
	}

	</style>
	  <div class=""></div>
	<div class="row px-3 pt-2 pb-3 m-auto w-100 rounded" style="background:#E5E7E9;">
		<div class="col-sm-4">
			<div class="card" style="background: transparent;border-color: transparent;">
				<form action="post">
					<div class="form-group">
						<label for="cat" class="text-muted">Brand Seller Name</label>
						<select name="seller" id="byseller" class="form-control">
							<option value="">Choose</option>
							@foreach($sellers as $seller)
							<option value="{{$seller->id}}">{{$seller->name}}</option>
							@endforeach
						</select>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-4" >
			<div class="card" style="background: transparent;border-color: transparent;">
				<form action="post">
					<div class="form-group">
						<label for="category" class="text-muted">Categories</label>
						<select name="category" id="bycategory" class="form-control">
							<option value="">Choose</option>
							@foreach(craft_categories() as $key => $value )
							<option  value="{{$value}}" >{{$value}}</option>
							@endforeach
						</select>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card" style="background: transparent;border-color: transparent;">
				<form action="{{ route('name.results') }}" method="post" id="search-form" class="w-100 mt-3">
					@csrf
					<div class="input-group w-75 mt-3">
						<input type="text" class="form-control" name="craft_name" placeholder="Search Craft Here" aria-label="Recipient's username" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="input-group-text" type="submit"  id="basic-addon2"> <i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-4 ">
			<div class="card" style="background: transparent;border-color: transparent;">
				<label class="text-muted">Search by price :</label>
				<form action="post">
					<div class="row form-group px-3">
						<select type="number" id="byPriceFrom" name="price_from" class="form-control col-md-5">
							<option value="">From</option>
							@for($i=0; $i<count(price()); $i++)
							<option value="{{price()[$i]}}"> ${{price()[$i]}}</option>
							@endfor
							
						</select>
						&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;&nbsp;
						<select type="number" id="byPriceUpTo" name="price_upto"  class="form-control col-md-5">
							<option value="">Up To</option>
							@for($i=0; $i<count(price()); $i++)
							<option value="{{price()[$i]}}"> ${{price()[$i]}}</option>
							@endfor
							
						</select>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<hr class="bg-danger w-100">

<section id="products">
	<div class="container">
		<div class="row">
			@foreach( $crafts as $tcraft )
			<div class="col-sm-6 col-md-4 col-lg-3 mt-3 relevant-crafts">
				<a href="{{ route('c.detail', ['id'=> $tcraft->id]) }}" class="craft">
					<div class="card">
						<div class="card-image"><img class="img-fluid" src="{{ $tcraft->imgname1 ? '/'.$tcraft->imgname1 : asset('images/img_3.jpg') }}" style="height: 250px" alt="{{$tcraft->name}}">
						</div>
						<div class="card-footer">
							<p class="clearfix"><small><strong class="float-left text-capitalize">{{$tcraft->name}}</small></strong>
								
							</p>
							<p class="clearfix mb-0">
								<strong class="float-left">
								@for($i=0; $i<$tcraft->rating; $i++)
								<i class="fa fa-star" style="color: gold;"></i>
								@endfor
								</strong>
								<small class="float-left pt-1"> &nbsp;{{$tcraft->views}}</small>
								<strong class="float-right text-success">${{$tcraft->price}}</strong>
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
	</div>
</section>
<script>
$(document).off('change', 'select').on('change', 'select', function (event) {
	event.preventDefault();
	let param = {};
	$(document).find('select').each(function () {
		param[$(this).attr('name')] = $(this).val();
	});
	// debugger;
	callAjax({
		url: '/filter/crafts',
		method: 'POST',
		data : param
	}, function (response) {
		$('#products .container').html(response);
		// debugger;
	});
});
</script>
@endsection