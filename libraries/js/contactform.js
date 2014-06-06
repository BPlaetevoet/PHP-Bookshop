$(document).ready(function() {
    var contactForm = {
  isValidEmail: function (input) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(input);
  },
  
// Valideer dat de postcode bestaat uit 4 cijfers.

  isValidPostcode: function (postcode) {
    postcode = postcode.replace(/[^0-9]/g, '');
    return (postcode.length === 4);
  },
  clearErrors: function () {
    $('#emailAlert').remove();
    $('#feedbackForm .help-block').hide();
    $('#feedbackForm .form-group').removeClass('has-error');
  },
  addError: function ($input) {
    $input.siblings('.help-block').show();
    $input.parent('.form-group').addClass('has-error');
  },
  addAjaxMessage: function(msg, isError) {
    $("#feedbackSubmit").after('<div id="emailAlert" class="alert alert-' + (isError ? 'danger' : 'success') + '" style="margin-top: 5px;">' + $('<div/>').text(msg).html() + '</div>');
  }
};

   $("#feedbackSubmit").click(function() {
//    //clear fouten
    contactForm.clearErrors();
//
    //controleer dat de velden ingevuld zijn
    var hasErrors = false;
    $('#feedbackForm input,textarea').not('.optional').each(function(){
      if (!$(this).val()) {
        hasErrors = true;
        contactForm.addError($(this));
      }
    });
    
    //controleer of bepaalde velden correct zijn ingevuld
    var $mail = $('#mail');
    if (!contactForm.isValidEmail($mail.val())) {
      hasErrors = true;
      contactForm.addError($mail);
    }
    var $postcode = $('#postcode');
    if(!contactForm.isValidPostcode($postcode.val())){
        hasErrors = true;
        contactForm.addError($postcode);
    }
    var $terms = $('#terms');
    if ($terms.is(':checked')){
    }else{
       hasErrors = true;
       contactForm.addError($terms);
    }
//   
//    //in geval van errors terugkeren zonder verzenden
    if (hasErrors) {
      contactForm.addError('foutje');
    }
////    //verstuur de gegevens
    $.ajax({
      type: "POST",
      url: "actie.php",
      data: $("#feedbackForm").serialize(),
      success: function(data)
      {
        contactForm.addAjaxMessage(data.message, false);
        
      },
      error: function(response)
      {
        contactForm.addAjaxMessage(response.responseJSON.message, true);
      }
    });
    return false;
  });
});

  

//simpele validatie van gegevens

// valideer e-mail adres


