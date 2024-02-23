<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
  <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
<script src="script.js?v=<?php echo time(); ?>"></script>

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <ul>
        <li><a href="../menu.php">Back to Menu</a></li>
    </ul>
 
    <div id="dialog-form" title="Create new user">
  <p class="validateTips">All form fields are required.</p>
 
  <form id="addUser">
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" class="text ui-widget-content ui-corner-all">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>
<div id="users-contain" class="ui-widget">
  <h1>Existing Users:</h1>
  <table id="usersTable" class="ui-widget ui-widget-content">
  </table>
</div>
<button id="create-user">Create new user</button>
 
 
</body>
</html>