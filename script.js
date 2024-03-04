function addEmp() {
  console.log('add emp')
  if (validateForm() == true) {
    var formData = $("#addForm").serialize();
    console.log(formData)
    $.post("empprocess.php", formData, function (data, status) {
        // Refresh the list after adding
        console.log(data)
        alert("Data: " + data + "\nStatus: " + status);
        loadEmpList();
    })
    .fail(function(xhr, status, error) {
      console.error("Error:", error);
      alert("Error occurred while submitting the form. Please try again later.");
  });

  if ($('input[name="isactive"]').is(':checked')) {
    // If checked, get the value
    var checkboxValue = $('input[name="subscribe"]').val();
    console.log("Checkbox value when checked:", checkboxValue);
  } else {
    // If unchecked, handle accordingly
    console.log("Checkbox is unchecked");
  }

  $('#fullname').val(''),
  $('#address').val(''),
  $('#birthdate').val(''),
  $('#age').val(''),
  $('input[name=gender]:checked').val(''),
  $('input[name=civilstat]:checked').val(''),
  $('#contactnum').val(''),
  $('#salary').val('')
  // $('input[name=isactive]:checked').val('')
  // $('input[name="isactive"]').is(':checked')
  }
  console.log(
    'console.log',
    $('#fullname').val(),
    $('#address').val(),
    $('#birthdate').val(),
    $('#age').val(),
    $('input[name=gender]:checked').val(),
    $('input[name=civilstat]:checked').val(),
    $('#contactnum').val(),
    $('#salary').val(),
    // $('input[name=isactive]:checked').val(),
    // $('input[name="isactive"]').is(':checked')
  )
}

function validateForm() {
  console.log('validate form')
  var fullName = $("#fullname").val();
    var age = $("#age").val();
    var contactNum = $("#contactnum").val();
    var salary = $("#salary").val();
    
    if (fullName === "") {
        alert("Full name must be filled out");
        return false; // Prevent form submission
    }
    
    if (isNaN(age)) {
        alert("Age must be a number");
        return false; // Prevent form submission
    }
    
    if (!/^\d{11}$/.test(contactNum)) {
        alert("Contact number must be a valid 11-digit phone number");
        return false; // Prevent form submission
    }
    
    if (isNaN(salary) || salary < 0) {
        alert("Salary must be a non-negative number");
        return false; // Prevent form submission
    }
    
    return true; // Allow form submission
}

function loadEmpList() {
  $.get("emp.php", function (data) {
    $("#empTable").html(data);
    //user_table
    // $("#user_table").html(data);
  });
}

function editCharacter(recid, fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) {

  $("#editbirthdate").change(function () {
    console.log('check this one out', $( "#birthdate" ).val())
  });
  
  console.log(fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive);
  $('#editrecid').val(recid);
  $('#editfullname').val(fullname);
  $('#editaddress').val(address);
  $('#editbirthdate').val(birthdate);
  $('#editage').val(age);

  // Check gender radio button
  $('input[name=gender]').filter(`[value=${gender}]`).prop('checked', true);

  // Check civil status radio button
  $('input[name=civilstat]').filter(`[value=${civilstat}]`).prop('checked', true);

  $('#editcontactnum').val(contactnum);
  $('#editsalary').val(salary);
  
  // Check isactive radio button
  // $('input[name=isactive]').filter(`[value=${isactive}]`).prop('checked', true);

  if (isactive === "1") {
    $('#editisactive').prop('checked', true);
  } else {
    $('#editisactive').prop('checked', false);
  }

  $("#editPopup").show();
}

function updateEmp() {
    thisone = $("#editisactive").val()
    var formData = $("#editForm").serialize();
    
    $.post("empprocess.php", formData, function (data, status) {
        // Refresh the character list after adding
        console.log(formData)
        console.log('thisone', thisone)
        alert("Data: " + data + "\nStatus: " + status);
        loadEmpList();
        closePopup();
    });
}

function deleteCharacter(recid) {
  // alertify js library
    if (confirm("Are you sure you want to delete this character?")) {
      $.post(
        "empprocess.php",
        { delete: true, recid: recid },
        function (data, status) {
          // Refresh the character list after adding
          alert("Data: " + data + "\nStatus: " + status);
          loadEmpList();
          closePopup();
        },
      );
    }
  }

function closePopup() {
    $("#editPopup").hide();
  }

// function to export HTML table to CSV file
function exportTableToCSV(tableID, filename = '') {
  var csv = []; // array to store CSV data
  var rows = document.querySelectorAll('#' + tableID + ' tr'); // select all rows of the table
  console.log('#' + tableID + ' tr')

  // loop through each row
  rows.forEach(function (row) {
    console.log('row', row)
    var rowData = []; // array to store data of each row
    var cells = row.querySelectorAll('th, td'); // select all cells in the row
    
    // loop through each cell
    cells.forEach(function (cell) {
      console.log('230', cell.textContent)
      const action = cell.textContent
      if (action == "Action") {
        console.log('remove')
      } else {
        if (!cell.classList.contains('action-buttons')) { // Check if cell does not have 'action-buttons' class
          rowData.push('"' + cell.textContent.replace(/"/g, '""') + '"');
        }
      }
    });
    console.log(rowData)
    // combine cell data for the row into CSV format and push it into the CSV array
    csv.push(rowData.join(','));
  });

  // Combine rows into CSV format
  var csvContent = csv.join('\n');

  // Create a blob object with UTF-8 encoding
  var blob = new Blob([new Uint8Array([0xEF, 0xBB, 0xBF]), csvContent], { type: 'text/csv;charset=utf-8;' });

  // Create a download link
  var downloadLink = document.createElement('a');
  downloadLink.href = window.URL.createObjectURL(blob);

  // Specify file name
  filename = filename ? filename + '.csv' : 'excel_data.csv';
  downloadLink.download = filename;

  // Append the link to the body
  document.body.appendChild(downloadLink);

  // Trigger the download
  downloadLink.click();

  // Cleanup: remove download link from the body
  document.body.removeChild(downloadLink);
}


$(document).ready(function () {
  $( function() {
    $( "#tabs" ).tabs();
    // $("#tabs-3").load("../index.php");
  } );
  $('#search_input').keyup(function(){
    var query = $(this).val().toLowerCase();
    console.log(query,'query')
    // empTable
    $('#empTable tr').each(function(){
      var username = $(this).find('td:eq(1)').text().toLowerCase();
      var address = $(this).find('td:eq(2)').text().toLowerCase();
      console.log(username, 'username', address, 'address')
      if (username.indexOf(query) === -1 && address.indexOf(query) === -1) {
          console.log(username.indexOf(query), 'this is hidden')
          console.log(address.indexOf(query), 'this is hidden')
          $(this).hide();
      } else {
          console.log(username.indexOf(query), 'this is shown')
          console.log(address.indexOf(query), 'this is shown')
          $(this).show();
      }
  });
    /*
    $('#user_table tbody tr').each(function(){
        var username = $(this).find('td:eq(1)').text().toLowerCase();
        var address = $(this).find('td:eq(2)').text().toLowerCase();
        console.log(username, 'username', address, 'address')
        if (username.indexOf(query) === -1 && address.indexOf(query) === -1) {
            console.log(username.indexOf(query), 'this is hidden')
            console.log(address.indexOf(query), 'this is hidden')
            $(this).hide();
        } else {
            console.log(username.indexOf(query), 'this is shown')
            console.log(address.indexOf(query), 'this is shown')
            $(this).show();
        }
    });
    */
});
    loadEmpList();
    $("#birthdate").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });

    // birthdate
    // editbirthdate
    
    $("#birthdate").change(function () {
      console.log('check this one out', $( "#birthdate" ).val())
    });

    $("#editbirthdate").change(function () {
      console.log('check this one out', $( "#birthdate" ).val())
    });
})