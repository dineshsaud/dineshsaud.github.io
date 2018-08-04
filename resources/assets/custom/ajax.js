function callAjax(parameters, callback = '', error = '') {
	let url = parameters.url ? parameters.url : '/';
	let method = parameters.method ? parameters.method : 'GET';
	let data = parameters.data ? parameters.data : {};

	var xhr = new XMLHttpRequest();
	if( xhr.readyState !== 4 && xhr.status !== 200)
		xhr.abort();

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	xhr = $.ajax({
		url:url,
		method:method,
		data:data,
		error:function(err){
			if (typeof error === 'function')
				error(err);
		},
		success:function(response){
			if (typeof callback === 'function')
				callback(response);
		}
	});
}
