function addEmp() {
    var formData = $("#addForm").serialize();
    console.log(formData)
    $.post("empprocess.php", formData, function (data, status) {
        // Refresh the list after adding
        alert("Data: " + data + "\nStatus: " + status);
        loadEmpList();
    });
    
    $('#fullname').val('')
    $('#address').val('')
    $('#birthdate').val('')
    $('#age').val('')
    $('#gender').val('')
    $('#civilstat').val('')
    $('#contactnum').val('')
    $('#salary').val('')
    $('#isactive').val('')
}

function loadEmpList() {
    $.get("emp.php", function (data) {
        $("#empTable").html(data);
    });
}

function editCharacter(recid, fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive) {
    console.log(fullname, address, birthdate, age, gender, civilstat, contactnum, salary, isactive)
    $('#editrecid').val(recid)
    $('#editfullname').val(fullname)
    $('#editaddress').val(address)
    $('#editbirthdate').val(birthdate)
    $('#editage').val(age)
    $('#editgender').val(gender)
    $('#editcivilstat').val(civilstat)
    $('#editcontactnum').val(contactnum)
    $('#editsalary').val(salary)
    $('#editisactive').val(isactive)
    $("#editPopup").show();
}

function updateEmp() {
    thisone = $("#editisactive").val()
    var formData = $("#editForm").serialize();
    $.post("empprocess.php", formData, function (data, status) {
        // Refresh the character list after adding
        console.log(formData, thisone)
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
})