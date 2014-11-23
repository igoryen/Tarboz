$(document).ready(function () {
    alert("Start");
  $('#entryCreateForm').validate({
    rules: {
      verbatim:{
        required: true
      },
      inputLang: {
        required: true
      },
      txtString2: {
        required: true
      },      
      inputAuthen:{
        required: true
      }
    }
  });

  $('#entryCreateForm select, textarea').on('change', function () {
    if ($('#entryCreateForm').valid()) {
      alert("Form Valid!!!");
      $('button.btn').prop('disabled', false);
    } else {
      alert("Form Invalid");
        $('button.btn').prop('disabled', 'disabled');
    }
  });

});