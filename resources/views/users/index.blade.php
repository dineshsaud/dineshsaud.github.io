@extends('layouts.blueprint')
@section('content')
{{-- this is banner --}}
<div class="container">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/banner.jpg')}}" alt="Los Angeles" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>We had such a great time in LA!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/banner.jpg')}}" alt="Chicago" width="1100" height="500">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/banner.jpg')}}" alt="New York" width="1100" height="500">
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next" >
      <span class="carousel-control-next-icon"  ></span>
    </a>
  </div>
</div>
{{-- carousal close --}}
<hr>
{{-- serch start --}}
<div class="row">
  <h3 class="w-100 text-center">Find your products here !!</h3>
  <form action="" id="search-form" class="w-100">
    <div class="row">
      <div class="col-sm-4 offset-4" style="padding-right:0;">
        <input class="form-control" type="text" name="search" id="search">
      </div>
      <div class="col-sm-1" style="padding-left: 0;">
        <span class="form-control" style="width: 40px;">
          <i class="fa fa-search"></i>
        </span>
      </div>
    </div>
  </form>
</div>
{{-- search close --}}
<hr class="mb-0">
{{-- list group  --}}
<section id="categories" class="bg-white py-3">
  <div class="container">
    <div class="row">
      @foreach(craft_categories() as $key => $value )
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="card">
          <div class="card-header text-center">{{$value}}
          </div>
          <a href="{{route('cat.results',['id'=>$value])}}">
            
            <div class="card-image text-center p-4">
              <img class="img-fluid" width="100"
              src="{{asset('images/categories/'.$key.'.jpg') ? asset('images/categories/'.$key.'.jpg') :asset('images/img_3.jpg')}}" alt="categories{{$key}}">
            </div>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{-- end list group  --}}
{{-- products --}}
<h2 class="w-100 text-center">Top rated</h2>
<hr class="col-3 bg-warning" >
<section id="products">
  <div class="container">
    <div class="row">
      @foreach( $top_crafts as $tcraft )
      <div class="col-sm-6 col-md-4 col-lg-3 mt-3 relevant-crafts">
        <a href="{{ route('c.detail', ['id'=> $tcraft->id]) }}" class="craft">
          <div class="card">
            <div class="card-image"><img class="img-fluid" src="{{ $tcraft->imgname1 ? $tcraft->imgname1 : asset('images/img_3.jpg') }}" style="height: 250px" alt="{{$tcraft->name}}">
            </div>
            <div class="card-footer">
              <p class="clearfix"> <small><strong class="float-left text-capitalize">{{$tcraft->name}}</strong>
                </small>
              </p>
              <p class="clearfix mb-0">
                <strong class="float-left">
                @for($i=0; $i<$tcraft->rating; $i++)
                <i class="fa fa-star" style="color: gold;"></i>
                @endfor
                </strong>
                <small class="float-left">({{ $tcraft->views }} views)</small>
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
{{-- end products --}}
<br>
{{-- products by relevent price --}}
<br>
<h2 class="w-100 text-center">most relevient </h2>
<hr class="col-3 bg-warning" >
<section id="products">
  <div class="container">
    <div class="row">
      @foreach($crafts as $product)
      <div class="col-sm-6 col-md-4 col-lg-3 mt-3 relevant-crafts">
        <a href="{{ route('c.detail', ['id'=> $product->id]) }}" class="craft">
          <div class="card">
            <div class="card-image">
              <img class="img-fluid" src="{{ $product->imgname1 ? $product->imgname1 : asset('images/img_3.jpg') }}" alt="product image" style="height: 250px;">
            </div>
            <div class="card-footer">
              <p class="clearfix"><strong class="float-left text-capitalize">{{ $product->name }}</strong>
              </p>
              <p class="clearfix mb-0">
                <strong class="float-left">
                @for($i=0; $i<$product->rating; $i++)
                <i class="fa fa-star" style="color: gold;"></i>
                @endfor
                </strong>
                <small class="float-left">({{ $product->views }} views)</small>
                <strong class="float-right text-success">${{ $product->price }}</strong>
              </p>
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{-- end relevent products --}}
@endsection