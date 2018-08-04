var repeatFunction;

$(document).ready(function() {

    $('#create-form').on('submit', function(event) {
        event.preventDefault(); //preventing the default function of the form

        console.log('form is ready to submit'); // random message to print
        let url = $(this).attr('action'); //action attribute of form
        let method = $(this).attr('method'); //method of form
        let data = {};
        let validate = true; //variable for validation of form

        // moving into validating form
        $(this).find('input,textarea,input:checked').each(function() {
            //getting into each input type and checking validation
            if ($(this).val() == '' || $(this).val() == null) {
                $(this).css('border', '1px solid brown');
                validate = false;
            }

            data[$(this).attr('name')] = $(this).val();

        });
        // checking if the form was validate
        if (validate) {
            // submitting form using own ajax function
            callAjax({
                url: url,
                method: method,
                data: data
            }, function(response) {
                alert('your post ' + response.title + ' is submitted successfully');
                $('#create-form')[0].reset();
            });
        } else {
            // your prefferred function if the  form was not validate
            alert('you have submitted your form wrong please check it once before submitting!');
        }
    });

});

// chat box opens

$('#make-deal').off('click').on('click', function(e) { 
    e.preventDefault();
    $('#chat-box').show();
    let to = this.getAttribute('data-to'); // data-to attribute ko value
    let fr = this.getAttribute('data-from'); // data-from attribute ko value
    reload(to, fr);
    clearInterval(repeatFunction); // katai setinterval chali rko xa vane clear gareko
    setInterval(function() { // naya msg ako xa ki xaina check grxa 
        reload(to, fr);
    }, 3000);
});

var reload = function (to, from) {
    let url = '/chat/history';
    let data = {
        to: to,
        from: from
    };
    callAjax({
        url: url,
        method: "POST",
        data: data
    }, function(data) { 
    // after ajex is executed we get some response data here is that response ex  return view('users.chat.box', compact('messages'));
        $(document).find('#messages').html(data); // in main documment ther is nothing in msg id so we send whole view
        updateScroll("messages"); 
    });
}
var updateScroll = function (element_id) {
    var element = document.getElementById(element_id);
    if (element.scrollTop == 0)
        element.scrollTop = element.scrollHeight;
}