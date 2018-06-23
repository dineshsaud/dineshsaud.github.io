@extends('layouts.blueprint')
@section('content')
<div class="container">
	<style>
	[name] {
		box-shadow: inset 0px 0px 20px 0px lightblue;
	}
	</style>
	<div class="mt-3"></div>
	<div class="row px-3 pt-2 pb-3 m-auto w-100 rounded" style="background: #F0B27A;">
		<div class="col-sm-4">
			<div class="card" style="background: transparent;border-color: transparent;">
				<form action="post">
					<div class="form-group">
						<label for="cat" class="text-white">Seller Name</label>
						<select name="catogery" id="cat" class="form-control">
							@foreach($sellers as $seller)
							<option value="{{$seller->id}}" >{{$seller->name}}</option>
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
						<label for="catogery" class="text-white">Categories</label>
						<select name="catogery" id="catogery" class="form-control">
							@foreach(craft_categories() as $key => $value )
							<option id="{{$key}}" value="Paper craft">{{$value}}</option>
							@endforeach
						</select>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card" style="background: transparent;border-color: transparent;">
				<form action="post">
					<label for="search-manual" class="text-white">Manual Search</label>
					<div class="input-group">
						<input id="search-manual" type="text" name="search-manual" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<span class="input-group-text btn"><i class=" fa fa-search" ></i></span>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card" style="background: transparent;border-color: transparent;">
				<label class="text-white">Search by price :</label>
				<form action="post" class="form-inline">
					<div class="form-group">
						<input type="number" name="from" placeholder="from" class="form-control col-md-4">
						&nbsp;&nbsp; -- &nbsp;
						<input type="number" name="to" placeholder="upto" class="form-control col-md-4">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<hr class="bg-danger w-100">
</div>
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
								<small class="float-left pt-1"> &nbsp;(200 views)</small>
								<strong class="float-right text-success">${{$tcraft->price}}</strong>
							</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection