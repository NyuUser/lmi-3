<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="newUser.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br><br><br>
    <form id="newUser">
        <fieldset>
            <h2>Register</h2>
        
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">

            <p class="validateTips">All form fields are required.</p>

            <a href="login.html">
                <p>
                    Already have an account? Click here!
                </p>
            </a>
            
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input class="form-button" type="submit" value="Submit">
        </fieldset>
    </form>
    
    
</body>
</html>