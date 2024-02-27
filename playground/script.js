$( function() {
  var dialog, form,

    // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
    name = $( "#name" ),
    email = $( "#email" ),
    password = $( "#password" ),
    allFields = $( [] ).add( name ).add( email ).add( password ),
    tips = $( ".validateTips" );

  function updateTips( t ) {
    tips
      .text( t )
      .addClass( "ui-state-highlight" );
    setTimeout(function() {
      tips.removeClass( "ui-state-highlight", 1500 );
    }, 500 );
  }
  // updateTips

  function checkLength( o, n, min, max ) {
    if ( o.val().length > max || o.val().length < min ) {
      o.addClass( "ui-state-error" );
      updateTips( "Length of " + n + " must be between " +
        min + " and " + max + "." );
      return false;
    } else {
      return true;
    }
  }
  // checkLength

  function checkRegexp( o, regexp, n ) {
    if ( !( regexp.test( o.val() ) ) ) {
      o.addClass( "ui-state-error" );
      updateTips( n );
      return false;
    } else {
      return true;
    }
  }
  // checkRegexp

  function addUser() {
    var valid = true;
    allFields.removeClass( "ui-state-error" );

    valid = valid && checkLength( name, "username", 3, 16 );
    valid = valid && checkLength( email, "email", 6, 80 );
    valid = valid && checkLength( password, "password", 5, 16 );

    valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
    valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
    valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );

    if ( valid ) {
      var formData = $("#addUser").serialize();
      console.log('form data', formData)
      $.post("userprocess.php", formData, function (data, status) {
        alert("Data: " + data + "\nStatus: " + status);
      })
      dialog.dialog( "close" );
    }
    loadUserList();
    updateAutocomplete();
    return valid;
  }
  // add user

  dialog = $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 400,
    width: 350,
    modal: true,
    buttons: {
      "Create an account": addUser,
      Cancel: function() {
        dialog.dialog( "close" );
      }
    },
    close: function() {
      form[ 0 ].reset();
      allFields.removeClass( "ui-state-error" );
    }
  });
  // dialog

  editdialog = $( "#edit-form" ).dialog({
    autoOpen: false,
    height: 400,
    width: 350,
    modal: true,
    buttons: {
      "Update User Info": updateUser,
      Cancel: function() {
        editdialog.dialog( "close" );
      }
    },
    close: function() {
      editform[ 0 ].reset();
      allFields.removeClass( "ui-state-error" );
    }
  });
  // dialog

  form = dialog.find( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    addUser();
  });
  // form

  editform = editdialog.find( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    updateUser();
  });
  // form

  $( "#create-user" ).button().on( "click", function() {
    dialog.dialog( "open" );
  });
  // open dialog

} );

const sortOptions = [
  "Record ID",
  "Username",
  "Email",
]

function loadUserList() {
  console.log('table reloaded')
  $.get("usersfile.php", function (data) {
    $("#usersTable").html(data);
    console.log(data)
  });
}

function searchByName() {
  var searchName = $("#tags").val()
  if (searchName != "") {
    console.log("searchName", searchName, tempHolder)
  $.ajax({
    type: "POST",
    url: "nameSearch.php",
    data: { 
      thisName: searchName, 
      //thisField: tempHolder 
    },
    success: function (response) {
      $("#usersTable").html(response);
    },
    error: function (error) {
      $("#usersTable").html("Error executing the query.");
      console.log(error);
    },
  });
  } else {
    alert('Field must not be empty');
  }
}

var tempHolder = ""
function sortBySelection() {
  x = $("#sortBy").val();
  if (x === "Record ID") {
    tempHolder = "recid";
  } else if (x === "Username") {
    tempHolder = "username";
  } else if (x === "Email") {
    tempHolder = "email";
  } else {
    x = "username";
  }
  console.log("auto complete sortBy", tempHolder);
  updateAutocomplete();
}

function updateAutocomplete() {
    var availableTags = []
    console.log('auto complete', tempHolder)
    
    $.ajax({
      type: "POST",
      url: "search_name_process.php",
      data: { 
        thisField: tempHolder 
      },
      success: function (response) {
        console.log('reponse', response);
        var nameAutoArray = JSON.parse(response);
        console.log('Names:', nameAutoArray);
        availableTags = nameAutoArray
  
        console.log(availableTags)
        
        $( "#tags" ).autocomplete({
          source: availableTags
        });
      },
      error: function (error) {
        console.log("Error executing the query.");
        console.log(error);
      },
    });
}

function populateDropdown(id, placeholderText, dropdownArray) {
  console.log(id, placeholderText, dropdownArray)
  var thisOne = $(id);
  thisOne.empty();
  if (placeholderText != '') {
    thisOne.append($("<option>").val("").text(placeholderText));
  }
  for (var i = 0; i < dropdownArray.length; i++) {
    var option = $("<option>", {
      value: dropdownArray[i],
      text: dropdownArray[i],
      class: dropdownArray[i], // Add a unique class for each option
    });
    thisOne.append(option);
  }
}

function editUser(recid, username, email) {
  console.log('edit', recid, username, email)
  $("#editrecid").val(recid);
  $("#editname").val(username);
  $("#editemail").val(email);
  editdialog.dialog( "open" );
  loadUserList();
}

function updateUser(){
  var formData = $("#editUser").serialize();
  console.log('update user', formData)
  $.post("updateprocess.php", formData, function (data, status) {
    // Refresh the character list after adding
    alert("Data: " + data + "\nStatus: " + status);
    loadUserList();
  });
  editdialog.dialog( "close" );
}

function deleteUser(userID) {
  console.log('delete')
  if (confirm("Are you sure you want to delete this character?")) {
    $.post(
      "deleteprocess.php",
      { delete: true, id: userID },
      function (data, status) {
        // Refresh the character list after adding
        alert("Data: " + data + "\nStatus: " + status);
        loadUserList();
      },
    );
  }
}

$(document).ready(function () {
  populateDropdown('#sortBy', 'Select Column Name to sort', sortOptions);

  // sortBySelection();
  
  $("#sortBy").change(function () {
    sortBySelection();
  });
  
  $( function() {
    $( "#tabs" ).tabs();
    // $("#tabs-3").load("../index.php");
  } );

  updateAutocomplete();

  loadUserList();
})