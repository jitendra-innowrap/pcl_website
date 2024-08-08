$(document).ready(function() {
    var invalidCls = "is-invalid";
    var formMessages = $(".form-messages");

    var today = new Date().toISOString().split('T')[0];
    // Set the min attribute to today's date
    $('#date').attr('min', today);

    // Validate form on submit
    $('#contactForm').on("submit", function(event) {
        event.preventDefault();
        if (contactValidateForm()) {
            submitContactForm();
        }
    });

    $('#houseOfVivaahForm').on("submit", function(event) {
        event.preventDefault();
        if (houseValidateForm()) {
            submitHouseForm();
        }
    });
    
    $('#eventFactoryForm').on("submit", function(event) {
        event.preventDefault();
        if (eventValidateForm()) {
            submitEventForm();
        }
    });
    
    $('#liveSpaceForm').on("submit", function(event) {
        event.preventDefault();
        if (spaceValidateForm()) {
            submitSpaceForm();
        }
    });
    
    $('#partyHouseForm').on("submit", function(event) {
        event.preventDefault();
        if (partyValidateForm()) {
            submitPartyForm();
        }
    });
    
    $('#franchiseForm').on("submit", function(event) {
        event.preventDefault();
        if (franchiseValidateForm()) {
            submitFranchiseForm();
        }
    });

    // Keyup validation for each input field
    $('#name').on('keyup', function() {
        validateName();
    });
    
    $('#eventType').on('keyup', function() {
        validateEventType();
    });
    
    $('#artistRequirement').on('keyup', function() {
        validateArtist();
    });

    $('#location').on('keyup', function() {
    validateLocation();
    });
    
    $('#companyname').on('keyup', function() {
    validateCompanyName();
    });

    $('#designation').on('keyup', function() {
    validateDesignation();
    });

    $('#contact').on('keyup', function() {
        validateContact();
    });

    $('#email').on('keyup', function() {
        validateEmail();
    });

    $('#date').on('change', function() { // Change event for date input
        validateDate();
    });

    $('#number').on('keyup', function() {
        validateNumberOfGuests();
    });

    $('#event').on('change', function() {
        validateEvent();
    });
    
    $('#occupation').on('change', function() {
        validateOccupation();
    });
    
    $('#franchiseType').on('change', function() {
        validateFranchiseType();
    });

    $('#otherEvent').on('change', function() {
        validateSubEvent();
    });
    $('#service').on('change', function() {
        validateService();
    });
    
    $('#venue').on('keyup', function() {
        validateVenue();
    });
    $('#venue').on('keyup', function() {
        validateService();
    });

    // Event dropdown change handler
    $('#event').on('change', function() {
        var selectedEvent = $(this).val();
        var subEventOptions = '';
        if (selectedEvent === 'other') {
            $('#otherEventContainer').show();
            $('#subEventContainer').hide();
        } else if (selectedEvent === 'wedding') {
        subEventOptions = '<option value="haldi">Haldi</option><option value="sangeet">Sangeet</option><option value="mehendi">Mehendi</option><option value="wedding">Wedding</option><option value="all of the above">All of the above</option>';
        $('#otherEventContainer').hide();
        $('#subEventContainer').show();
        $('#subEvent').html(subEventOptions);
    }else if(selectedEvent === 'birthday') {
        subEventOptions = '<option value="1 - 20 age">1 to 20 Age</option><option value="21 - 49 age">21 to 49 Age</option><option value="50 +">50 and Above</option>';
        $('#otherEventContainer').hide();
        $('#subEventContainer').show();
        $('#subEvent').html(subEventOptions);
    } else{
        $('#subEventContainer').hide();
        $('#otherEventContainer').hide();
    }  
    });

    // Function to validate the entire form
    function contactValidateForm() {
        var isValid = true;
        if (!validateName()) isValid = false;
        if (!validateLocation()) isValid = false;
        if (!validateContact()) isValid = false;
        if (!validateEmail()) isValid = false;
        if (!validateDate()) isValid = false;
        if (!validateNumberOfGuests()) isValid = false;
        if (!validateEvent()) isValid = false;
        if (!validateSubEvent()) isValid = false;
        if (!validateService()) isValid = false;
        return isValid;
    }
    
    function houseValidateForm() {
        var isValid = true;
        if (!validateName()) isValid = false;
        if (!validateLocation()) isValid = false;
        if (!validateContact()) isValid = false;
        if (!validateEmail()) isValid = false;
        if (!validateDate()) isValid = false;
        if (!validateVenue()) isValid = false;
        if (!validateEvent()) isValid = false;
        return isValid;
    }
    
    // Function to validate the entire form
  function eventValidateForm() {
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
  
  function spaceValidateForm() {
    var isValid = true;
    if (!validateName()) isValid = false;
    if (!validateLocation()) isValid = false;
    if (!validateContact()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validateDate()) isValid = false;
    if (!validateVenue()) isValid = false;
    if (!validateEventType()) isValid = false;
    if (!validateArtist()) isValid = false;
    return isValid;
  }
  
  function partyValidateForm() {
    var isValid = true;
    if (!validateName()) isValid = false;
    if (!validateLocation()) isValid = false;
    if (!validateContact()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validateDate()) isValid = false;
    if (!validateVenue()) isValid = false;
    if (!validateEvent()) isValid = false;
    if (!validateSubEvent()) isValid = false;
    return isValid;
  }
  
  function franchiseValidateForm() {
    var isValid = true;
    if (!validateName()) isValid = false;
    if (!validateLocation()) isValid = false;
    if (!validateContact()) isValid = false;
    if (!validateEmail()) isValid = false;
    if (!validateOccupation()) isValid = false;
    if (!validateFranchiseType()) isValid = false;
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
    
    function validateEventType() {
        var eventType = $('#eventType').val();
        if (!/^[a-zA-Z\s]+$/.test(eventType)) {
            $('#eventTypeError').text('Please enter event type.');
            $('#eventType').addClass(invalidCls);
            return false;
        } else {
            $('#eventTypeError').text('');
            $('#eventType').removeClass(invalidCls);
            return true;
        }
    }
    
    function validateArtist() {
        var artistRequirement = $('#artistRequirement').val();
        if (!/^[a-zA-Z\s]+$/.test(artistRequirement)) {
            $('#artistRequirementError').text('Please enter event type.');
            $('#artistRequirement').addClass(invalidCls);
            return false;
        } else {
            $('#artistRequirementError').text('');
            $('#artistRequirement').removeClass(invalidCls);
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

    function validateNumberOfGuests() {
        var numberOfGuests = $('#number').val();
        if (numberOfGuests < 1 || numberOfGuests > 100000) {
            $('#numberError').text('Please enter a number of guests between 0 and 100,000.');
            $('#number').addClass(invalidCls);
            return false;
        } else {
            $('#numberError').text('');
            $('#number').removeClass(invalidCls);
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
    function validateService() {
        var service = $('#service').val();
        if (!service) {
            $('#serviceError').text('Please select an service.');
            $('#service').addClass(invalidCls);
            return false;
        } else {
            $('#serviceError').text('');
            $('#service').removeClass(invalidCls);
            return true;
        }
    }
    
    function validateOccupation() {
        var occupation = $('#occupation').val();
        if (!occupation) {
            $('#occupationError').text('Please select Occupation.');
            $('#occupation').addClass(invalidCls);
            return false;
        } else {
            $('#occupationError').text('');
            $('#occupation').removeClass(invalidCls);
            return true;
        }
    }
    
    function validateFranchiseType() {
        var franchiseType = $('#franchiseType').val();
        if (!franchiseType) {
            $('#franchiseTypeError').text('Please select Franchise Type.');
            $('#franchiseType').addClass(invalidCls);
            return false;
        } else {
            $('#franchiseTypeError').text('');
            $('#franchiseType').removeClass(invalidCls);
            return true;
        }
    }

    function validateSubEvent() {
    var otherEvent = $('#otherEvent').val();
    var event = $('#event').val();
    if (event === 'other'){
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

    function submitContactForm() {
    var formData =  $('#contactForm').serialize();
    $.ajax({
        url : base_url+'console/add_contact',
        type: "POST",
        data: formData,
        success: function(data) {
            data = JSON.parse(data)
            if (data.code === 1) {
                formMessages.removeClass("error");
                formMessages.addClass("success");
                formMessages.text('Thank You!  We have received your event details and you will soon get a call from our team for further discussion.');
                $('#contactForm')[0].reset();
                $('#subEventContainer').hide();
                $('#otherEventContainer').hide();
            }else {
                formMessages.addClass("error");
                formMessages.text('Something went wrong!!');
            }
        }
    });
    }
    
    function submitHouseForm() {
        var formData =  $('#houseOfVivaahForm').serialize();
        $.ajax({
            url : base_url+'console/house_of_vivaah_form',
            type: "POST",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data.code === 1) {
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    formMessages.text('Thank You!  We have received your event details and you will soon get a call from our team for further discussion.');
                    $('#contactForm')[0].reset();
                }else {
                    formMessages.addClass("error");
                    formMessages.text('Something went wrong!!');
                }
            }
        });
    }
    
    function submitEventForm() {
        var formData =  $('#eventFactoryForm').serialize();
        $.ajax({
            url : base_url+'console/event_factory_form',
            type: "POST",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data.code === 1) {                    
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    formMessages.text('Thank You!  We have received your event details and you will soon get a call from our team for further discussion.');
                    $('#eventFactoryForm')[0].reset();
                    $('#otherEventContainer').hide();
                }else {
                    formMessages.addClass("error");
                    formMessages.text('Something went wrong!!');
                }
            }
        });
    }
    
    function submitSpaceForm() {
        var formData =  $('#liveSpaceForm').serialize();
        $.ajax({
            url : base_url+'console/live_space_form',
            type: "POST",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data.code === 1) {                    
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    formMessages.text('Thank You!  We have received your event details and you will soon get a call from our team for further discussion.');
                    $('#liveSpaceForm')[0].reset();
                }else {
                    formMessages.addClass("error");
                    formMessages.text('Something went wrong!!');
                }
            }
        });
    }
    
    function submitPartyForm() {
        var formData =  $('#partyHouseForm').serialize();
        $.ajax({
            url : base_url+'console/party_house_form',
            type: "POST",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data.code === 1) {                    
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    formMessages.text('Thank You!  We have received your event details and you will soon get a call from our team for further discussion.');
                    $('#partyHouseForm')[0].reset();
                    $('#subEventContainer').hide();
                    $('#otherEventContainer').hide();
                }else {
                    formMessages.addClass("error");
                    formMessages.text('Something went wrong!!');
                }
            }
        });
    }
    
    function submitFranchiseForm() {
        var formData =  $('#franchiseForm').serialize();
        $.ajax({
            url : base_url+'console/franchise_form',
            type: "POST",
            data: formData,
            success: function(data) {
                data = JSON.parse(data)
                if (data.code === 1) {                    
                    formMessages.removeClass("error");
                    formMessages.addClass("success");
                    formMessages.text('Thank You! We have received all your details and our team will connect with you.');
                    $('#franchiseForm')[0].reset();
                }else {
                    formMessages.addClass("error");
                    formMessages.text('Something went wrong!!');
                }
            }
        });
    }
    
    var input = document.querySelector('input[name=socialHandles]');
    new Tagify(input, {
        // options here
    });

});