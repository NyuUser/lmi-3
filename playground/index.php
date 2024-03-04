<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Stuff</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <!--link rel="stylesheet" href="/resources/demos/style.css"-->
  <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
  <script src="script.js?v=<?php echo time(); ?>"></script>

  <div class="sidebar">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <a href="../index.php">Employees</a>
    <a class="active" href="index.php">Admin</a>
    <a href="logout.php">Logout</a>
  </div>
  
  <div class="content">

  <div id="tabs">
    <ul>
      <li><a href="#tabs-2">Check Existing Users</a></li>
      <li><a href="#tabs-3">Refresh Database Tables</a></li>
    </ul>
  
    <div id="tabs-3">
      <ul>
        <li> <a href="http://localhost/lmi-3/usersTable.php">User's Table</a> </li>
        <li> <a href="http://localhost/lmi-3/empsfile.php">Employee's Table</a> </li>
      </ul>
    </div>
    
    <div id="tabs-2">
      <div class="ui-widget">
        <label for="tags">Search by Name: </label>
        <input id="tags">
        <input type="button" value="Submit" onclick="searchByName()">
      </div>
    
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
        <br/><br/>
        <input type="button" class="form-button" id="create-user" value="Create new user">
        <br><br>
        <input type="button" class="form-button" value="Export as CSV" onclick="exportTableToCSV('usersTable')">
      </div>
    </div>
    
    <div id="edit-form" title="Update User">
      <p class="validateTips">All form fields are required.</p>
      
      <form id="editUser">
        <fieldset>
          <!--label for="editrecid">Record ID</label-->
          <input hidden type="text" name="editrecid" id="editrecid" class="text ui-widget-content ui-corner-all">
          <label for="editname">Name</label>
          <input type="text" name="editname" id="editname" class="text ui-widget-content ui-corner-all">
          <label for="editemail">Email</label>
          <input type="text" name="editemail" id="editemail" class="text ui-widget-content ui-corner-all">
          
          <!-- Allow form submission with keyboard without duplicating the dialog button -->
          <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
      </form>
    </div>
    
  </div>
  </html>
</body>
  