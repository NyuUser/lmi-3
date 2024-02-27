<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="signin.js?v=<?php echo time(); ?>"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <br><br><br>
    <form id="oldUser">
        <fieldset>
            <h2>Login</h2>
        
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
            <!--label for="email">Email</label>
            <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all"-->
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">

            <p class="validateTips">All form fields are required.</p>

            <a href="newUser.php">
                <p>
                    Not yet registered? Click here!
                </p>
            </a>
            
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input class="form-button" type="submit" value="Submit">
        </fieldset>
    </form>
</body>
</html>