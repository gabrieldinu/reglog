$(document).ready(function () {
    $('#form_register').on('click','#user_register', function (event) {
        event.preventDefault();

        $('p.error').remove();
        $('.form-group').removeClass('has-error');

        var email_reg = $('#email_register').val();

        $.ajax({
            url: 'processes/ajax_validator.php',
            beforeSend: function(){
                var loading = $('<span class="glyphicon glyphicon-refresh spinning"></span>');
                $('#email_register').append(loading);
            },
            complete: function(){
                $('span.spinning').remove();
            },
            timeout: 5000,
            type: 'POST',
            dataType: 'json',
            data: {
                email: email_reg
            },
            success: function (data) {
                if(!data.user_available){
                    var error_mesage = $('<p class="error">The email address is already used.</p>');
                    $('#email_register').after(error_mesage).closest('.form-group').addClass('has-error');
                } else {
                   // var no_error_mesage = $('<p class="error">The email address you entered is uniq.</p>');
                    $('#email_register').closest('.form-group').addClass('has-success');
                }
            },
            error: function () {
                console.log("Error in ajax!");
                var error_mesage = $('<p class="error">ERROR: Can not connect to server!</p>');
                $('#email_register').after(error_mesage).closest('.form-group').addClass('has-error');
            }
        });
    });
});