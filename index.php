<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMI - 3</title>
    <!--script src="https://code.jquery.com/jquery-3.6.4.min.js"></script-->
    <!--script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!--script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.11/jquery.csv.min.js"></script-->
</head>

<body>
<script src="script.js?v=<?php echo time(); ?>"></script>
<!---->
<div class="sidebar">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <a class="active" href="index.php">Employees</a>
    <a href="playground/index.php">Admin</a>
    <a href="logout.php">Logout</a>
</div>

<div class="content">
    <div id="tabs">
        <ul>
            <!--li><a href="#tabs-1">Nunc tincidunt</a></li-->
            <li><a href="#tabs-2">Add new Employee</a></li>
            <li><a href="#tabs-3">Employee Table</a></li>
        </ul>

        <div id="tabs-2">
            <form id="addForm">
                <h3>Add an Employee</h3>
                <label>Employee Full Name: </label><input id="fullname" type="text" name="fullname" required><br>
        
                <label>Address: </label><input id="address" type="text" name="address" required><br>
            
                <label>Birth Date: </label><input id="birthdate" type="text" name="birthdate" required><br>
            
                <label>Age: </label><input id="age" type="number" name="age" onkeydown="return event.keyCode !== 69" required><br>
            
                <label>Gender: </label><br>
                <div class="radio-group" id="gender">
                    <input type="radio" id="male" name="gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="Other">
                    <label for="other">Other</label>
                </div>
                <br/><br/>
            
                <label>Civil Status: </label><br>
                <div class="radio-group" id="civilstat">
                    <input type="radio" id="single" name="civilstat" value="Single" required>
                    <label for="single">Single</label>
                    <input type="radio" id="married" name="civilstat" value="Married">
                    <label for="married">Married</label>
                    <br/><br/>
                    <input type="radio" id="separated" name="civilstat" value="Separated">
                    <label for="separated">Separated</label>
                    <input type="radio" id="widowed" name="civilstat" value="Widowed">
                    <label for="widowed">Widowed</label>
                </div>
                <br/><br/>
            
                <label>Contact Number: </label>
                <input id="contactnum" type="tel" name="contactnum" pattern="[0-9]{10,}" title="Please enter a valid 10-digit phone number" required>
                <br/>
            
                <label>Salary: </label><input id="salary" type="number" name="salary" min="0" step="0.01" required><br>
            
                <label>
                    Is Active: <input type="checkbox" name="isactive" id="isactive" checked required value="1"> 
                </label>
                <br/><br/>
                <input class="form-button" name="add" value="Add" onclick="addEmp()">
            </form>
        </div>
        <div id="tabs-3">
        <input type="text" id="search_input" placeholder="Search...">
        <table id='empTable'>

        </table>

        <br>
        
        <input type="button" class="form-button" value="Export as CSV" onclick="exportTableToCSV('empTable')">
        </div>
    </div>
    <div class="popup" id="editPopup">
        <h3>Edit a Employee Details</h3>
        <form id="editForm">
            <fieldset>
                <input id="editrecid" type="text" name="recid" hidden>
                <br/>
                
                <label>Employee Full Name: </label>
                <input id="editfullname" type="text" name="fullname" required><br>
                
                <label>Address: </label>
                <input id="editaddress" type="text" name="address" required><br>
                
                <label>Birth Date: </label>
                <input id="editbirthdate" type="date" name="birthdate" required><br>
                
                <label>Age: </label>
                <input id="editage" type="number" name="age" onkeydown="return event.keyCode !== 69" required><br>
                
                <label>Gender: </label>
                <br/>
                <div class="radio-group" id="editgender">
                    <input type="radio" id="male" name="gender" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="Other">
                    <label for="other">Other</label>
                </div>
                <br/><br/>
                
                <label>Civil Status: </label><br>
                <div class="radio-group" id="editcivilstat">
                    <input type="radio" id="single" name="civilstat" value="Single" required>
                    <label for="single">Single</label>
                    <input type="radio" id="married" name="civilstat" value="Married">
                    <label for="married">Married</label>
                    <br/><br/>
                    <input type="radio" id="separated" name="civilstat" value="Separated">
                    <label for="separated">Separated</label>
                    <input type="radio" id="widowed" name="civilstat" value="Widowed">
                    <label for="widowed">Widowed</label>
                </div>
                <br/><br/>
                
                <label>Contact Number: </label><input id="editcontactnum" type="tel" name="contactnum" pattern="[0-9]{10,}" title="Please enter a valid 10-digit phone number" required><br>
                
                <label>Salary: </label><input id="editsalary" type="number" name="salary" min="0" step="0.01" required><br>
                
                <label>
                    Is Active: <input type="checkbox" name="isactive" id="editisactive" value="1"> 
                </label>
                
                <br/><br/>
                
                <input class="form-button" name="update" value="Update" onclick="updateEmp()">
                <button type="button" onclick="closePopup()">Cancel</button>
            </fieldset>
        </form>
    </div>
</div>
</body>

</html>