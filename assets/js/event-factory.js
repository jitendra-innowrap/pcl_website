$(document).ready(function() {
  var form = "#eventFactoryForm";
  var invalidCls = "is-invalid";
  var $email = '[name="email"]';
  var $validation = '[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]';
  var formMessages = $(".form-messages");
  
  var today = new Date().toISOString().split('T')[0];
  // Set the min attribute to today's date
  $('#date').attr('min', today);

  // Validate form on submit
  $(form).on("submit", function(event) {
      event.preventDefault();
      if (validateForm()) {
          sendContact();
      }
  });

  // Keyup validation for each input field
  $('#name').on('keyup', function() {
      validateName();
  });
  
  $('#companyname').on('keyup', function() {
    validateCompanyName();
  });

  $('#designation').on('keyup', function() {
    validateDesignation();
  });
  
  $('#location').on('keyup', function() {
    validateLocation();
  });

  $('#contact').on('keyup', function() {
      validateContact();
  });

  $('#email').on('keyup', function() {
      validateEmail();
  });
  
  $('#venue').on('keyup', function() {
    validateVenue();
  });

  $('#date').on('change', function() { 
      validateDate();
  });

  $('#event').on('change', function() {
      validateEvent();
  });
  
  $('#event').on('change', function() {
    var selectedEvent = $(this).val();
    var subEventOptions = '';
    if (selectedEvent === 'Other') {
        $('#otherEventContainer').show();
    }else{
    $('#otherEventContainer').hide();
  }  
  });

  $('#otherEvent').on('change', function() {
    validateSubEvent();
  });

  // Function to validate the entire form
  function validateForm() {
      var isValid = true;
      if (!validateName()) isValid = false;
      if (!validateLocation()) isValid = false;
      if (!validateContact()) isValid = false;
      if (!validateCompanyName()) isValid = false;
      if (!validateDesignation()) isValid = false;
      if (!validateEmail()) isValid = false;
      if (!validateDate()) isValid = false;
      if (!validateVenue()) isValid = false;
      if (!validateEvent()) isValid = false;
      if (!validateSubEvent()) isValid = false;
      return isValid;
  }

  // Individual validation functions
  function validateName() {
      var name = $('#name').val();
      if (!/^[a-zA-Z\s]+$/.test(name)) {
          $('#nameError').text('Please enter name.');
          $('#name').addClass(invalidCls);
          return false;
      } else {
          $('#nameError').text('');
          $('#name').removeClass(invalidCls);
          return true;
      }
  }
  
  function validateCompanyName() {
    var companyname = $('#companyname').val();
    if (!/^[a-zA-Z\s]+$/.test(companyname)) {
        $('#companynameError').text('Please company name.');
        $('#companyname').addClass(invalidCls);
        return false;
    } else {
        $('#companynameError').text('');
        $('#companyname').removeClass(invalidCls);
        return true;
    }
  }
  function validateDesignation() {
    var designation = $('#designation').val();
    if (!/^[a-zA-Z\s]+$/.test(designation)) {
        $('#designationError').text('Please designation.');
        $('#designation').addClass(invalidCls);
        return false;
    } else {
        $('#designationError').text('');
        $('#designation').removeClass(invalidCls);
        return true;
    }
  }
  
  function validateLocation() {
    var location = $('#location').val().trim(); // Trim whitespace from the input
    if (location === '') {
      $('#locationError').text('Please enter location.');
      $('#location').addClass(invalidCls);
      return false;
    } else {
        $('#locationError').text('');
        $('#location').removeClass(invalidCls);
        return true;
    }
  }
  
  function validateVenue() {
    var venue = $('#venue').val().trim(); // Trim whitespace from the input
    if (venue === '') {
      $('#venueError').text('Please enter venue.');
      $('#venue').addClass(invalidCls);
      return false;
    } else {
        $('#venueError').text('');
        $('#venue').removeClass(invalidCls);
        return true;
    }
  }

  function validateContact() {
      var contact = $('#contact').val();
      if (!/^\d{10}$/.test(contact)) {
          $('#contactError').text('Please enter a valid number.');
          $('#contact').addClass(invalidCls);
          return false;
      } else {
          $('#contactError').text('');
          $('#contact').removeClass(invalidCls);
          return true;
      }
  }

  function validateEmail() {
      var email = $('#email').val();
      var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (!emailPattern.test(email)) {
          $('#emailError').text('Please enter a valid email address.');
          $('#email').addClass(invalidCls);
          return false;
      } else {
          $('#emailError').text('');
          $('#email').removeClass(invalidCls);
          return true;
      }
  }
  
  function validateSubEvent() {
    var otherEvent = $('#otherEvent').val();
    var event = $('#event').val();
    if (event === 'Other'){
        if (!otherEvent) {
            $('#otherEventError').text('Please enter an sub event.');
            $('#otherEvent').addClass(invalidCls);
            return false;
        } else {
            $('#otherEventError').text('');
            $('#otherEvent').removeClass(invalidCls);
            return true;
        }
    } else {
        $('#otherEventError').text('');
        $('#otherEvent').removeClass(invalidCls);
        return true;
    }
  }

  function validateDate() {
      var date1 = $('#date').val();;
      var date = new Date($('#date').val());
      var today = new Date();
      today.setHours(0, 0, 0, 0); // Compare dates only, not times
     if (date1 === '') {
        $('#dateError').text('Please enter date.');
        $('#date').addClass(invalidCls);
        return false;
      } else if (date < today) {
        $('#dateError').text('Please select a date that is not in the past.');
        $('#date').addClass(invalidCls);
        return false;
      } else {
          $('#dateError').text('');
          $('#date').removeClass(invalidCls);
          return true;
      }
  }

  function validateEvent() {
      var event = $('#event').val();
      if (!event) {
          $('#eventError').text('Please select an event.');
          $('#event').addClass(invalidCls);
          return false;
      } else {
          $('#eventError').text('');
          $('#event').removeClass(invalidCls);
          return true;
      }
  }  

  function sendContact() {
      var formData = $(form).serialize();
      var valid;
      valid = validateContact();
      if (valid) {
          jQuery
              .ajax({
                  url: $(form).attr("action"),
                  data: formData,
                  type: "POST",
              })
              .done(function (response) {
                response = JSON.parse(response);
                if(response.code === 1){
                   // Make sure that the formMessages div has the 'success' class.
                   formMessages.removeClass("error");
                   formMessages.addClass("success");
                   // Set the message text.
                   formMessages.text('Thank you!!');
                   // Clear the form.
                   $(form)[0].reset();
                   $('#otherEventContainer').hide();
                }else{
                  formMessages.addClass("error");
                  formMessages.text('Something wents Wrong!!');
                }
              })
              .fail(function (data) {
                  // Make sure that the formMessages div has the 'error' class.
                  formMessages.removeClass("success");
                  formMessages.addClass("error");
                  // Set the message text.
                  if (data.responseText !== "") {
                      formMessages.html(data.responseText);
                  } else {
                      formMessages.html("Oops! An error occurred and your message could not be sent.");
                  }
              });
      }
  }
});