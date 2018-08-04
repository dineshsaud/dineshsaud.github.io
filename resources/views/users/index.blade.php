@extends('layouts.blueprint')
@section('content')
{{-- this is banner --}}
<style>
body{
background: #EBF5FB  ;
}
</style>
@if(count($top_crafts) > 2)
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    @for($i = 0; $i < 3; $i++)
    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
      <img src="{{asset($top_crafts[$i]->imgname1)}}" alt="{{ $top_crafts[$i]->name }}" width="100%" height="550">
      <div class="carousel-caption">
        <h3 class="text-capitalize font-italic font-weight-bold" style="color: black"  >{{ $top_crafts[$i]->name }}</h3>
        <p class="font-italic">{{ $top_crafts[$i]->description}}</p>
      </div>
    </div>
    @endfor
    
  </div>
  <a class="carousel-control-prev"  href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon style="color:black"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next" >
    <span class="carousel-control-next-icon"  ></span>
  </a>
</div>
@endif
{{-- carousal close --}}
<hr>
{{-- serch start --}}
<div class="container " style="background:#F9FAFA">
  <div class="row">
    
    <form action="{{ route('name.results') }}" method="post" id="search-form" class="w-100 mt-3">
      @csrf
      <div class="input-group w-25 m-auto">
        <input type="text" class="form-control" name="craft_name" placeholder="Search Craft Here" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="input-group-text" type="submit"  id="basic-addon2"> <i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>
  {{-- search close --}}
  <hr class="mb-0">
  {{-- list group  --}}
  <section id="categories" class=" p-3">
    <div >
      <div class="row">
        @foreach(craft_categories() as $key => $value )
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3 ">
          <div class="card ">
            <div class="card-header text-center table-bordered">{{$value}}
            </div>
            <a href="{{route('cat.results',['id'=>$value])}}">
              
              <div class="card-image text-center p-1 table-bordered">
                <img class="img-fluid" style="width: 100%;height:180px"
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
  <div class="card-header" >
    <h4 class=" text-center font-italic"><i class="fa fa-star"></i>Top rated <i class="fa fa-star"></i> </h4>
  </div>
  <section id="products">
    <div >
      <div class="row">
        @foreach( $top_crafts as $tcraft )
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3 relevant-crafts">
          <a href="{{ route('c.detail', ['id'=> $tcraft->id]) }}" class="craft">
            <div class="card">
              <div class="card-image"><img class="img-fluid" src="{{ $tcraft->imgname1 ? $tcraft->imgname1 : asset('images/img_3.jpg') }}" style="width: 100%;height:180px " alt="{{$tcraft->name}}">
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
                  <small class="float-left">( {{ $tcraft->views }}  views) </small>
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
  <div class="card-header" >
    <h2 class="w-100 text-center font-italic">Most Relevient </h2>
  </div>
  <hr class="col-3 bg-warning" >
  <section id="products" class="p-1">
    <div>
      <div class="row">
        @foreach($crafts as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3 relevant-crafts">
          <a href="{{ route('c.detail', ['id'=> $product->id]) }}" class="craft">
            <div class="card">
              <div class="card-image">
                <img class="img-fluid" src="{{ $product->imgname1 ? $product->imgname1 : asset('images/img_3.jpg') }}" alt="product image" style="height: 180px;width: 100%">
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
</div>
<div class="mb-4"></div>
{{-- end relevent products --}}
@endsection