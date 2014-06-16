$(document).ready(function() {
    var contactForm = {
  isValidEmail: function (input) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(input);
  },
  
// Valideer dat de postcode bestaat uit 4 cijfers.

  isValidPostcode: function (postcode) {
    
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
  $("#feedbackSubmit, #contactSubmit").after('<div id="emailAlert" class="alert alert-' + (isError ? 'danger' : 'success') + '" style="margin-top: 5px;">' + $('<div/>').text(msg).html() + '</div>');
  }
};
$("#feedbackSubmit, #contactSubmit").click(function() {
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
    if ("#feedbackSubmit"){

    var $terms = $('#terms');
    if ($terms.is(':checked')){
    }else{
       hasErrors = true;
       contactForm.addError($terms);
    }
    }
//   
//    //in geval van errors terugkeren zonder verzenden
    if (hasErrors) {
        return false;

    }
////    //verstuur de gegevens
    $.ajax({
      type: "POST",
      url: "actie.php",
      data: $("#feedbackForm").serialize(),
      success: function(data)
      {
        contactForm.addAjaxMessage(data.message, false);
        // Pagina vernieuwen 
        setTimeout("$(location.reload());",2000);
      },
      error: function(response)
      {
        contactForm.addAjaxMessage(response.responseJson.message, true);
      }
    });
    return false;
  });
});

