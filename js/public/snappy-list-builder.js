jQuery(document).ready(function($){

    var wpajax_url = document.location.protocol + '//' + document.location.host + '/wordpressplugincourse/wp-admin/admin-ajax.php';

    var email_capture_url = wpajax_url + '?action=slb_save_subscription';

    $('form#slb_register_form').bind('submit',function() {

        // get the jquery form object
        $form = $(this);

        // setup our form data for our ajax post
        var form_data = $form.serialize();

        // submit our form data for our ajax post
        $.ajax({
            'method': 'post',
            'url':email_capture_url,
            'data':form_data,
            'dataType':'json',
            'cache':false,
            'success': function( data, textStatus ) {
                if( data.status == 1) {
                    // success
                    // reset the form
                    $form[0].reset();
                    // notify te user of success
                    alert(data.message);
                } else {
                    // error
                    // begin building our error message text
                    var msg = data.message + '\r' + data.error + '\r';
                    $.each(data.errors,function(key,value) {
                        msg += '\r';
                        msg += '- '+value;
                    });
                    alert( msg );
                }
            },
            'error': function( jqXHR, textStatus, errorThrown) {

            }
        });

        // stop the form from submitting normally
        return false;
    });

    // email capture action url
    var unsubscribe_url = wpajax_url + '?action=slb_unsubscribe';

    $(document).on('submit','form#slb_manage_subscriptions_form',function() {
        
        // get the jquery form object
        $form = $(this);

        // setup ourt form data for ourt ajax post
        var form_data = $form.serialize();

        // setup our form data with ajax
        $.ajax({
            'method':'post',
            'url':unsubscribe_url,
            'data':form_data,
            'dataType':'json',
            'cache':false,
            'success': function( data, textStatus) {
                if(data.status == 1){
                    // success
                    // update form html
                    $form.replaceWith(data.html);
                    // notify the user of succcess
                    alert(data.message);
                } else {
                    // error
                    // begin building our error message text
                    var msg = data.message + '\r' + data.error +'\r';
                }
            },
            'error': function( jqXHR, textStatus, errorThrown ) {
                // ajax didn't work
            }
         });
        //  stoop the form form submitting normally
        return false;
    }); 
});

