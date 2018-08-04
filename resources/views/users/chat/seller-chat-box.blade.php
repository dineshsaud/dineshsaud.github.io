<section id="seller-box">
	<div class="bg-info text-white px-3 clearfix">
		<span class="float-left">
			{{ $customer->name }} <br>
			{{ $customer->email }}
		</span>
		<span class="float-right">
			<i class="fa fa-window-close mt-2 btn pr-0" onclick="$('#seller-box').hide()"></i>
		</span>
	</div>
	<div style="height: 275px;overflow-y: scroll;" id="messages">
		
	</div>
	<hr class="m-0 bg-light">
	<div class="p-3">
		<form action="#" class="clearfix">
			<textarea class="form-control col-10 msg float-left" rows="2" id="message"></textarea>
			<button class="btn btn-info mt-2 float-right" id="send"
			data-seller-id="{{ auth()->id() }}" data-cus-id="{{ $customer->id }}">
			<i class="fa fa-arrow-circle-right"></i>
			</button>
		</form>
	</div>
</section>