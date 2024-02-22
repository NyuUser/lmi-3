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

$(document).ready(function () {
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