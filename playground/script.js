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

  form = dialog.find( "form" ).on( "submit", function( event ) {
    event.preventDefault();
    addUser();
  });
  // form

  $( "#create-user" ).button().on( "click", function() {
    dialog.dialog( "open" );
  });
  // open dialog

} );

function loadUserList() {
  $.get("usersfile.php", function (data) {
      $("#usersTable").html(data);
    });
}

function searchByName() {
  var searchName = $("#tags").val()
  console.log("searchName", searchName)
  $.ajax({
    type: "POST",
    url: "nameSearch.php",
    data: { thisName: searchName },
    success: function (response) {
      $("#usersTable").html(response);
    },
    error: function (error) {
      $("#usersTable").html("Error executing the query.");
      console.log(error);
    },
  });
}

function updateAutocomplete() {
    var availableTags = []
    
    $.ajax({
      type: "POST",
      url: "search_name_process.php",
      data: {  },
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

$(document).ready(function () {
  $( function() {
    $( "#tabs" ).tabs();
    // $("#tabs-3").load("../index.php");
  } );

  updateAutocomplete();

  loadUserList();
})