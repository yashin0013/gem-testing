// Flash message js

function notify(quote, type) {
  var notifyElement = $("<div />").addClass(type).html(quote);
  $(".notify").prepend(notifyElement);
  setTimeout(
    function (ele) {
      ele.remove();
    },
    3000,
    notifyElement
  );
}

// Report get krne ke liye

document.getElementById("ajax-form").onsubmit = function() {reportCall()};

function reportCall() {
  event.preventDefault();
    var url = $('#ajax-form').attr("action");

    let rId = document.getElementById('report_num').value;

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
            type:'POST',
            url: url,
            data: {rid:rId},
            success: (response) => {
              if (response.error) {
                $('.form-error-msg').css('display','block');
                $('.form-error-msg').html(response.message);
              }else{
                $(".modal-content").html(response);
                $("#reportModal").modal("show");
                $('.form-error-msg').css('display','none');
              }

            },
            error: function(response){
              console.log(response);
                $('.form-error-msg').css('display','block');
                $('.form-error-msg').html(response.responseJSON.errors.rid[0]);
            }
       });

};


//  Have Question ko submit krne ke liye

//  $('#contact-form').submit(function(e) {
    function contactSubmit() {
      event.preventDefault();

        var url = $('#contact-form').attr("action");
        let form = document.getElementById("contact-form");
        let formData = new FormData(form);

        $.ajax({
                type:'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                  console.log(response);
                  notify('Form submitted successfully', 'success');
                    $('#contact-form').trigger("reset");

                    $('#contact-form').find(".print-error-msg").find("ul").html('');
                    $('#contact-form').find(".print-error-msg").css('display','none');
                },
                error: function(response){
                    console.log(response.responseJSON.errors);
                    // $('#emp-form').find(".print-error-msg").find("ul").html('');
                    // $('#emp-form').find(".print-error-msg").css('display','block');
                    $.each( response.responseJSON.errors, function( key, value ) {
                      notify(value, 'error');
                        // $('#emp-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                }
           });
          }
    // });