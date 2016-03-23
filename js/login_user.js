$(document).ready(function () {
    $('#form_login').on('click', '#btn_login', function (event) {
        event.preventDefault();

        $('p.error').remove();

        var email_login = $('#email_login').val();
        var password_login = $('#password_login').val();
        $('input').on('focus', removeHasError);

        function removeHasError() {
            $(this).closest('#form_login').find('p.error').remove();
        }

        function validateEmail(email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {
                return true;
            }
            return false;
        }

        function isEmailAvailable() {
            return JSON.parse($.ajax({
                url: 'processes/ajax_validator_login.php',
                async: false,
                beforeSend: function () {
                    var loading = $('<span class="glyphicon glyphicon-refresh spinning"></span>');
                    $('#email_login').append(loading);
                },
                complete: function () {
                    $('span.spinning').remove();
                },
                timeout: 5000,
                type: 'POST',
                dataType: 'json',
                data: {
                    email_login: $('#email_login').val(),
                    password_login: $('#password_login').val()
                },
                success: function (data) {
                },
                error: function () {
                    console.log("Error in ajax!");
                }
            }).responseText);
        }

        //check email and password validation
        if (($.trim(email_login).length == 0) || ($.trim(password_login).length == 0)) {
            var error_mesage = $('<p class="error">Please insert email and password.</p>');
            $('#form_login').append(error_mesage);
        } else if (!validateEmail(email_login)) {
            var error_mesage = $('<p class="error">Email is not valid</p>');
            $('#form_login').append(error_mesage);
        } else if (($.trim(email_login).length != 0) && ($.trim(password_login).length != 0) && (validateEmail(email_login))) {
            var resp = isEmailAvailable();
            if (!resp.user_login) {
                var error_mesage = $('<p class="error">Email or password incorrect.</p>');
                $('#form_login').append(error_mesage);
            }
        }

        if ($('p.error').length == 0) {
            $('#form_login').submit();
        }
    });
});