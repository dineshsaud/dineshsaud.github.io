
  $(document).ready(function(){
    
    $('#create-form').on('submit', function(event){
    	event.preventDefault(); //preventing the default function of the form

    	console.log('form is ready to submit'); // random message to print
    	let url = $(this).attr('action'); //action attribute of form
    	let method = $(this).attr('method'); //method of form
    	let data = {};
    	let validate = true; //variable for validation of form

    	// moving into validating form
    	$(this).find('input,textarea,input:checked').each(function(){
    		//getting into each input type and checking validation
    		if( $(this).val() == '' || $(this).val() == null ){
    			$(this).css('border', '1px solid brown');
    			validate = false;
    		}

    		data[$(this).attr('name')] = $(this).val();

    	});
    	// checking if the form was validate
    	if(validate){
	    	// submitting form using own ajax function
	    	callAjax({url:url, method:method, data:data}, function(response){
	    		alert('your post '+response.title+' is submitted successfully');
	    		$('#create-form')[0].reset();
	    	});    		
    	}else{
    	// your prefferred function if the  form was not validate
    		alert('you have submitted your form wrong please check it once before submitting!');
    	}
    });

  });

function callAjax(parameters, callback = ''){

	let url = parameters.url ? parameters.url : '/';  //giving value to url if it was no sent through parameter
	let method = parameters.method ? parameters.method : 'GET'; //giving value to method if not mentioned in parameter
	let data = parameters.data ? parameters.data : {}; // giving empty data if it wast not send through parameter

	//setting up headers for csrf toekn mismatched // if more want more info search for laravel documentation on csrf token
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

    $.ajax({

    	url: url,
    	method: method,
    	data: data,

    	beforeSend: function(){
    		//the function that excutes before ajax function 
    		// you can write any function to be executed before the ajax
    		// such as displaying the loader of your page..
    		// $('#page-loader').css('display', 'block');
    		console.log('ajax is running...');
    	},

    	error: function(){
    		console.log('something wernt wrong with the ajax');
    	},

    	statusCode: {
    		404: function(){
    			// window.location.href = '404';
    		},
    		422: function(){
    			console.log('something went wrong with the form validation');
    		},
    		500: function(){
    			console.log('something wernt wrong with the server...');
    		},
    		405: function(){
    			console.log('your request method is mismatched...');
    		}
    	},

    	success: function(response){
    		// checking if the callback fucntion is given through parameter
    		if(typeof(callback) != 'String'){
    			// fetching the function given in parameter
    			callback(response);

    		}
    	}
    });

}