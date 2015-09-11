$(document).ready(function () {
    $('#user_register').on('click', function (event) {
        event.preventDefault();
        $('p.error').remove();
        $('.form-group').removeClass('has-error');
        
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var email_register = $('#email_register').val();
        var password_register = $('#password_register').val();
        var repassword_register = $('#repassword_register').val();
        var city = $('#city').val();
        var day = $('#day').val();
        var month = $('#month').val();
        var year = $('#year').val();        


        function removeHasError() {
            $(this).closest('.form-group').removeClass('has-error').find('.error').remove();
        }

        function validateEmail(email) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (filter.test(email)) {
                return true;
            }
            return false;
        }
        
        function validateDate(day, month, year) {
            var d = parseInt(day, 10);
            var m = parseInt(month, 10);
            var y = parseInt(year, 10);
            var c_date = new Date();
            var s_date = new Date(y, m - 1, d);
            if ((s_date.getFullYear() == y && s_date.getMonth() + 1 == m && s_date.getDate() == d) && (s_date <= c_date)) {
                return true;
            } else {
                return false;
            }
        }

        $('input').on('focus', removeHasError);
        $('#male, #female, #birthday').on('click', removeHasError);
        
        
        if ($.trim(first_name).length == 0) {
            var error_mesage = $('<p class="error">First name is required</p>');
            $('#first_name').after(error_mesage).closest('.form-group').addClass('has-error');
        }        
       
        if ($.trim(last_name).length == 0) {
            var error_mesage = $('<p class="error">Last name is required</p>');
            $('#last_name').after(error_mesage).closest('.form-group').addClass('has-error');
        }

        if ((day == null) || (month == null) || (year == null)) {
            var error_mesage = $('<p class="error">Insert full birthday</p>');
            $('#birthday').append(error_mesage).closest('.form-group').addClass('has-error');
        } else if(!validateDate(day, month, year)){
            var error_mesage = $('<p class="error">Not valid calendar date</p>');
            $('#birthday').append(error_mesage).closest('.form-group').addClass('has-error');
        }        
        
        if ($.trim(email_register).length == 0) {
            var error_mesage = $('<p class="error">Email is required</p>');
            $('#email_register').after(error_mesage).closest('.form-group').addClass('has-error');
        }else if (!validateEmail(email_register)){
            var error_mesage = $('<p class="error">Email not valid</p>');
            $('#email_register').after(error_mesage).closest('.form-group').addClass('has-error');
        }else{
//            verify using ajax if email is unic;
        }        
       
        if ($.trim(password_register).length == 0) {        
            var error_mesage = $('<p class="error">Password is required</p>');
            $('#password_register').after(error_mesage).closest('.form-group').addClass('has-error');
        }else if ($.trim(repassword_register).length == 0) {
            var error_mesage = $('<p class="error">Retype password</p>');
            $('#repassword_register').after(error_mesage).closest('.form-group').addClass('has-error');
        }else if (password_register != repassword_register) {
            var error_mesage = $('<p class="error">Passwords do not match</p>');
            $('#repassword_register').after(error_mesage).closest('.form-group').addClass('has-error');
            $('#password_register').closest('.form-group').addClass('has-error');
            $('#password_register, #repassword_register').on('focus', function () {
                $('#password_register').closest('.form-group').removeClass('has-error');
                $('#repassword_register').closest('.form-group').removeClass('has-error').find('.error').remove();
            });
        }        
       
        if ($.trim(city).length == 0) {
            var error_mesage = $('<p class="error">Please enter city</p>');
            $('#city').after(error_mesage).closest('.form-group').addClass('has-error');
        }

        if (!($('#male').is(":checked")) && !($('#female').is(":checked"))) {
            var error_mesage = $('<p class="error">Please select gender</p>');
            $('#gender').append(error_mesage).closest('.form-group').addClass('has-error');
        }

    });
});