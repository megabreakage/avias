$(document).ready(function(){

  $("#login").submit(function(e){
    e.preventDefault();
    credentials = $(this).serialize();
    $.ajax({
      url: 'login_user',
      method: 'POST',
      dataType: 'json',
      data: credentials,
      success: function(data){
        if (data === false | data === 0) {
          $("#login_response").fadeIn(1000);
          $("#login_response").removeClass('hidden');
          $("#login_response").addClass('alert-danger');
          $("#login_response").fadeOut(5000);
        } else {
          window.location.href = "http://192.168.2.122/avia";
        }
      }
    });
  });
});
