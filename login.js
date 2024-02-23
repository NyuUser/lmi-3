$(document).ready(function(){
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var username = $('#username').val();
        var uemail = $('#uemail').val();
        var password = $('#password').val();
        console.log('hello', username, password)
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: {
                username: username, 
                uemail: uemail, 
                password: password
            },
            success: function(response) {
                $('#loginMessage').html(response);
            }
        });
    });

    $('#registerForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var username = $('#username').val();
        //var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: {
                username: username, 
                //email: email, 
                password: password
            },
            success: function(response) {
                $('#registerMessage').html(response);
            }
        });
    });
});