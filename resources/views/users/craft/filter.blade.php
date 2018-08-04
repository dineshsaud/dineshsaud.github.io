<div class="row">
	@if(count($crafts)>0)
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
	@endif
</div>