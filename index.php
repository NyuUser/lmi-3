<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMI - 3</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.3/xlsx.full.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.11/jquery.csv.min.js"></script>
</head>

<body>
    <script src="script.js?v=<?php echo time(); ?>"></script>
    <form id="addForm">
        <h3>Add an Employee</h3>
        <label>fullname: </label><input id="fullname" type="text" name="fullname" required><br>
        <label>address: </label><input id="address" type="text" name="address" required><br>
        <label>birthdate: </label><input id="birthdate" type="date" name="birthdate" required><br>
        <label>age: </label><input id="age" type="text" name="age" required><br>
        <label>gender: </label><input id="gender" type="text" name="gender" required><br>
        <label>civilstat: </label><input id="civilstat" type="text" name="civilstat" required><br>
        <label>contactnum: </label><input id="contactnum" type="text" name="contactnum" required><br>
        <label>salary: </label><input id="salary" type="text" name="salary" required><br>
        <p>isactive:</p>
        <input type="radio" id="isactive" name="isactive" value="1">
        <label for="isactive">YES</label><br>
        <input type="radio" id="isactive" name="isactive" value="0">
        <label for="isactive">NO</label><br>
        <input name="add" value="Add" onclick="addEmp()">
    </form>

    <div class="popup" id="editPopup">
        <h3>Edit a Character</h3>
        <form id="editForm">
            <label>recid: </label><input id="editrecid" type="text" name="recid" hidden><br>
            <label>fullname: </label><input id="editfullname" type="text" name="fullname" required><br>
            <label>address: </label><input id="editaddress" type="text" name="address" required><br>
            <label>birthdate: </label><input id="editbirthdate" type="date" name="birthdate" required><br>
            <label>age: </label><input id="editage" type="text" name="age" required><br>
            <label>gender: </label><input id="editgender" type="text" name="gender" required><br>
            <label>civilstat: </label><input id="editcivilstat" type="text" name="civilstat" required><br>
            <label>contactnum: </label><input id="editcontactnum" type="text" name="contactnum" required><br>
            <label>salary: </label><input id="editsalary" type="text" name="salary" required><br>
            <p>isactive:</p>
            <input type="radio" id="editisactive" name="isactive" value="1">
            <label for="editisactive">YES</label><br>
            <input type="radio" id="editisactive" name="isactive" value="0">
            <label for="editisactive">NO</label><br>
            <input name="update" value="Update" onclick="updateEmp()">
            <button type="button" onclick="closePopup()">Cancel</button>
        </form>
    </div>

    <table id='empTable'>

    </table>
</body>

</html>