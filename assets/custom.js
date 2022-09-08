$(document).ready(function() {
      load_comment();

      function load_comment() {
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
              comment_load_data: true
            },
            success: function(response) {
              console.log(response);
              $('.comment-container').html("");
              $.each(response,function(key, value){



              $('.comment-container').append("<div class='reply_box border p-2 mb-2'>\
                                   <h6 class='border-bottom d-inline username'>"+value.user['fullname']+":"+value.cmt['commented_on']+"</h6>\
                                   <p class='para'>"+value.cmt['msg']+"</p>\
                                   <button value="+value.cmt['id']+" class='bage btn-warning reply_btn'>Reply</button>\
                                   <button value="+value.cmt['id']+" class='bage btn-danger view_reply_btn'>View Reply</button>\
                                   <div class='ml-4 reply_section'>\
                                   </div>\
                                   </div>\
                ");
                });
              }


            });

        }

        $(document).on('click','.reply_btn',function(){
          var thisClicked = $(this);
          var cmt_id = thisClicked;
          thisClicked.closest('.reply_box').find('.reply_section').html("<input type='text' class='reply_msg form-control my-2' placeholder='Reply'>\
           <div class='text-end'>\
           <button type='button' class='btn btn-sm btn-primary reply_add_btn'>Reply</button>\
            <button type='button' class='btn btn-sm btn-danger reply_cancel_btn'>Cancel</button>\
            </div>\
            ");

        });

        $(document).on('click','.reply_cancel_btn',function(){
          $('.reply_section').html("");

        });

        $(document).on('click', '.reply_add_btn', function(){
          var thisClicked = $(this);
          var cmt_id = thisClicked.closest('.reply_box').find('.reply_btn').val();
          var reply = thisClicked.closest('.reply_box').find('.reply_msg').val();

          var data = {
            comment_id: cmt_id,
            reply_msg: reply,
            add_reply: true
          }

          $.ajax({
            type: "POST",
            url: "code.php",
            data: data,
            success: function(response){
              alert(response);
              $('.reply_section').html("");

            }

          })
        })

        $(document).on('click', '.view_reply_btn', function(){
          var thisClicked = $(this);
          var comment_id = thisClicked.val();
          $.ajax({
            type:"POST",
            url: "code.php",
            data: {
              comment_id : comment_id,
              view_data: true
            },
            success: function(response){
              $('.reply_section').html("");
              $.each(response, function(key,value){



              thisClicked.closest('.reply_box').find('.reply_section').html("<div class='sub_reply_box border-bottom p-2 mb-2'>\
                                   <h6 class='border-bottom d-inline username'>"+value.user['fullname']+"</h6>\
                                   <p class='para'>"+value.cmt['reply_msg']+":"+value.cmt['comment_on']+"</p>\
                                   <button value='' class='bage btn-warning sub_reply_btn'>Reply</button>\
                                   <div class='ml-4 sub_reply_section'>\
                                   </div>\
                                   </div>\
                                   ");
              });

            }

          });


        });





        $('.add_comment_button').click(function(e) {
          e.preventDefault();
          var msg = $('.comment_textbox').val();
          if ($.trim(msg).length == 0) {
            error_msg = "please type comment";
            $('#error_status').text(error_msg);
          } else {
            error_msg = "";
            $('#error_status').text(error_msg);
          }

          if (error_msg != "") {
            return false;


          } else {
            var data = {
              msg: msg,
              add_comment: true
            };

            $.ajax({
              type: "POST",
              url: "code.php",
              data: data,
              success: function(response) {
                alert(response);
                $('.comment_textbox').val("");
              }


            });

          }
        });

      });
