$(document).ready(function(){
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: {username: username, password: password},
            success: function(response) {
                $('#loginMessage').html(response);
            }
        });
    });

    $('#registerForm').submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: {username: username, password: password},
            success: function(response) {
                $('#registerMessage').html(response);
            }
        });
    });
});