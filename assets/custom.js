$(document).ready(function(){
  $('.add_comment_button').click(function(e){
    e.preventDefault();
    var msg = $('.comment_textbox').val();
    if($.trim(msg).length == 0){
      error_msg = "please type comment";
      $('#error_status').text(error_msg);
    }else{
      error_msg = "";
      $('#error_status').text(error_msg);
    }

    if(error_msg != ""){
      return false;


    }else{
      var data = {
        msg: msg,
        add_comment: true
      };

      $.ajax({
        type: "POST",
        url: "code.php",
        data: data,
        success: function(response){
          alert(response);
          $('.comment_textbox').val("");
        }


      });

    }
  });

});
