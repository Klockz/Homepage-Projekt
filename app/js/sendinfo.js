(function() {
  'use strict';

  $('.sendinfo .btn').click(function(event) {
    event.preventDefault();
    var $that = $(this);
    var error = false;

    $('#inputMessage3, #inputSubject3').removeClass('form-control-error');
    $('#inputMessage3, #inputSubject3').parents('.form-group').removeClass('has-error');

    if($('#inputSubject3').val() === '') {
      $('#inputSubject3').addClass('form-control-error')
      $('#inputSubject3').parents('.form-group').addClass('has-error');
      error = true;
    }
    if($('#inputMessage3').val() === '') {
      $('#inputMessage3').addClass('form-control-error')
      $('#inputMessage3').parents('.form-group').addClass('has-error');
      error = true;
    }

    if(!error) {
      var $spinner = $('<img>');
      $spinner.attr('src', 'img/cogwheel.png');
      $spinner.addClass('spinner-icon');
      
      swal({
        title: "Sending...",
        showCancelButton: true,
        customClass: "swal--custom",
        imageUrl: "img/spinner_bg.jpg",
        showConfirmButton: false
      });
      $('.sa-custom').append($spinner);

      var mailData = {
        email : $('#inputEmail3').val(), 
        nick : $('#inputNick3').val(),
        phone : $('#inputPhone3').val(),
        subject: $('#inputSubject3').val(),
        message : $('#inputMessage3').val()
      };

      $.post(
        'ajax/sendinfomail.php',
        mailData,
        function(data, textStatus, xhr) {
          $('.sa-custom').empty();
          if(data === '0') {
            swal({
              title: "Message sent!",
              customClass: "swal--custom",
              imageUrl: "img/success_icon.jpg"
            });

            $that.attr('disabled', false);
            $('input, textarea').val('');
          } else {
            swal({
              title: "Message didn't send.",
              customClass: "swal--custom",
              imageUrl: "img/error_icon.jpg"
            });
          }
          $('#inputMessage3').removeClass('form-control-error');
          $('#inputMessage3').parents('.form-group').removeClass('has-error');
        }
      );
    }
  });
})();