@extends('layouts.blueprint')
@section('content')
<style>
body{
background: #EBF5FB  ;

}
	span.close-tab{
		/*background: red;*/
		display: inline-block;
		width: 20px;
		text-align: center;
	}
	span.close-tab:hover{
		background: rgba(0,0,0,0.3);
		color: #fff;
	}
	@media screen and (max-width: 576px){
		.intro-section > .row > div{
			width: 100%;
			text-align: center;
		}
		.intro-section > .row > div > .profile-img{
			width: 250px;
			margin: auto;
		}
	}
</style>
<div class="container mt-2 p-3" style="background: #F9FAFA">
	
	<section class="intro-section">
		<div class="row align-items-center">
			<div class="col-sm-6 col-md-4 col-lg-3">
				<div class="profile-img mt-2">
					<img class="img-fluid"  style="height:200px; width: 100%" src="{{ $user->image ? "/".$user->image : asset('images/unknown.png') }}" alt="{{$user->name}}">
				</div>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-5">
				<div class="intro mt-2 text-capitalize">
					<h1 class="m-0">{{ $user->name }}</h1>
					<span>&nbsp;{{ $user->email }}</span> <br>
					<span>&nbsp;{{ $user->phone_no }}</span> <br>
					<span>&nbsp;{{ $user->address }}</span>
				</div>
			</div>
			<div class="col-lg-4 tab " style="height: 250px">
				<div class="card-header w-100 text-md-center mt-1" style="margin-left: 0px">Menu</div>
				
				<a class="badge badge-info	 p-3 mt-2" href="{{ route('user.updateForm',['id'=>Auth::user()->id]) }}">
					Edit profile
				</a>
				@if(Auth::user()->user_type=="seller")
				<div>
					<a class="badge badge-secondary p-3 mt-2" href="{{ route('cregister.view') }}">
						Register Craft
					</a>
					<span class="badge badge-primary p-3 mt-2 mr-1">
						{{ $user->crafts->count() }} craft(s) registered
					</span>
				</div>
				@endif
			</div>
			
		</section>
		<div class="row ">
			
			<div class="col-sm-5 px-3">
				<div class="card h-100 mt-2">
					<div class="card-header text-center text-white bg-info">
						All Messages
					</div>
					<div class="card-body p-0">
						<ul class="list-group" id="all-messages">
							@isset($chats)
							@foreach($chats as $chat)
							<li class="list-group-item px-2 clearfix rounded-0 mt-2 mx-2"
								style=" background: #dae0e5"
								data-seller="{{ auth()->id() }}"
								data-cus="{{ $chat->id }}">
								<img class="float-left" src="\{{ $chat->image ? $chat->image : asset('images/img_3.jpg') }}" style="height: 25px; width: 30px; border-radius: 50px;" alt="{{$chat->name}}">
								<span class="float-left bg">{{ $chat->name }}</span>
								<span class="float-right">
									<small>({{ $seen[$chat->id]? 'seen' : 'unseen' }})</small>
								</span>
							</li>
							@endforeach
							@else
							<b class="text-center">	No messages</b>
							@endisset
							
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-sm-7 mt-2">
				<section id="seller-chat-box" style="background: white">
					
				</section>
			</div>
		</div>
	@if(count($user->crafts) > 0)
		<div class="mt-3">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#home">
						<span class="text-primary">Crafts</span>
					</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content mb-2">
				<div class="tab-pane active p-3 table-bordered table-responsive" id="home">
				
					<table class="table table-bordered mb-0">
						<tr class="text-white" style=" background: #7FB3D5  " >
							<th>S.N.</th>
							<th>Craft Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Category</th>
							<th>Views</th>
							<th>Description</th>
							
							<th>Operation</th>
						</tr>
						@php $i = 1; @endphp
						@foreach($user->crafts as $craft)
						<tr style="background: white">
							<td>{{ $i++ }}</td>
							<td>{{ $craft->name }}</td>
							<td>{{ $craft->price }}</td>
							<td>{{ $craft->quntity }}</td>
							<td>{{ $craft->handicrafttype }}</td>
							<td>{{ $craft->views }}</td>
							<td>{{ $craft->description }}</td>
							<td>
								<a href="{{route('c.edit', ['id'=> $craft->id])}}" class="edit-craft">	<i class="fa fa-edit mr-4"></i></a>
								<a href="{{route('c.delete',$craft->id)}}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						@endforeach
					</table>
				
				</div>
				<div class="tab-pane" id="menu1">...</div>
				<div class="tab-pane" id="menu2">...</div>
			</div>
		</div>
			@endif
	</div>
</div>
@endsection
@section('script')
<script>
	$('#all-messages li').off('click').on('click', function(e) {
	e.preventDefault();
	let url = '/chat';
	let data = {};
	data.customer = $(this).data('cus');
	data.seller = $(this).data('seller');
	callAjax({
	url: url,
	method: "POST",
	data: data
	}, function(response) {
	$('#seller-chat-box').html(response);
	reload(data.seller, data.customer);
	clearInterval(repeatFunction); 
	repeatFunction = setInterval(function() {
	reload(data.seller, data.customer);
	}, 3000);
	});
	});
	$(document).off('click', '#send').on('click', '#send', function(e) {
	e.preventDefault();
	let data = {};
	data.from = $(this).data('seller-id');
	data.to = $(this).data('cus-id');
	data.message = $(document).find('textarea#message').val(); 
	let url = '/chat/store';
	if (data.message != '')
	callAjax({
	url: url,
	method: 'POST',
	data: data
	}, function(respnose) {
	reload(data.to, data.from);
	$(document).find('textarea#message').val(''); //empty text area 
	});
	});
	$('.edit-craft').off('click').on('click', function (event) {
		event.preventDefault();
		let url = $(this).attr('href');
		callAjax({url:url}, function (respnose) {
			if($('.nav-tabs [href="#craft'+respnose.id+'"]').length == 1)
				$('.nav-tabs [href="#craft'+respnose.id+'"]').tab('show');
			else{
				let tab = `
					<li class="nav-item">																													<a class="nav-link" data-toggle="tab" href="#craft${respnose.id}">														<span class="text-dark">${respnose.name} <span class="close-tab" data-target="craft${respnose.id}">&times;</span></span></a>
					</li>`;
				let content = `<div class="tab-pane" id="craft${respnose.id}">${respnose.body}</div>`;
				$('.nav-tabs').append(tab);
				$('.tab-content').append(content);
				$('.nav-tabs [href="#craft'+respnose.id+'"]').tab('show'); //for opening code or showing code
			}
		});
	});
	$(document).off('click', 'span.close-tab').on('click', 'span.close-tab', function (event) {
		event.preventDefault();
		let id = $(this).data('target');
		$(this).closest('li.nav-item').remove(); // removing li eliement from tab
		$('div#'+id).remove();
		$('ul.nav-tabs li:last-child a').tab('show');
	});
</script>
@endsection