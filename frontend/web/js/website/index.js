$(document).ready(function(){

/*for delete website */
    $(".delete-website-click").click(function(e){
        e.preventDefault();
        window.id  = $(this).attr('id');
        window.id = window.id.split('delete-');
        window.id = window.id[1];
        $("#delete-"+window.id ).hide();
        $("#loader-"+window.id ).show();
        $.ajax({
            url: $("#val-delete-url").val(),
            type: 'POST',
            //cache: false,
            data: {id_for_website: window.id},
            dataType: "json",
            success: function(result){
                if(result.code == 200){
                    $("#delete-"+window.id).parent().parent().parent().remove();
                   alert(result.message);
                }else{
                   alert(result.message);
                }
            },
            error: function(){

            },
            complete: function(){

            }
        });
    });

    /*for add comment */
    $(".add-comment-website").click(function (e) {
        e.preventDefault();
        window.text = $(this).parent().children('textarea').val();
       if(window.text==''){
           alert("please add comment then click link");
       }else{
           window.id=$(this).attr("id");
           window.id=window.id.split("website-");
           window.id=window.id[1];
           $.ajax({
               url: $("#val-comment-url").val(),
               type: 'POST',
               //cache: false,
               data: {website_id : window.id , comment: window.text},
               dataType: "json",
               success: function(result){
                   if(result.code == 200){
                       $("#comment-"+window.id).val('');
                       $("#comment-container-"+window.id).prepend('<div class="col-lg-11 put-border"><p>'+window.text+'</p><time class="right-time">now</time></div>');
                       alert(result.message);
                   }else{
                       alert(result.message);
                   }
               },
               error: function(){

               },
               complete: function(){

               }
           });
       }

       });

    /* for jax_for like website */
    $(".like-website").click(function (e) {
        e.preventDefault();
        window.id=$(this).attr('id');
        window.id=window.id.split('like-');
        window.id=window.id[1];
       $.ajax({
           url:$("#val-like-url").val(),
           type: 'post',
           data: {website_id : window.id },
           dataType: "json",
           success: function (result) {
               if (result.code==200) {
                   $("#like-container-"+window.id).prepend('<p>you like this website</p>');
                   alert(result.message);
               }else {
                   alert(result.message);
               }
           },
           error: function(){

           },
           complete: function(){

           }
       });
    });

    /*for delete comment */
    $(".delete-comment").click(function (e) {
        e.preventDefault();
       window.id=$(this).attr('id');
       window.id=window.id.split("delete-comment-");
       window.id=window.id[1];
       $.ajax({
           url:$("#val-delete-comment").val(),
           type: 'post',
           data: {comment_id : window.id},
           dataType: "json",
           success: function (result) {
               if (result.code==200) {
                   $("#delete-comment-"+window.id).parent().remove();
                   alert(result.message);
               }else {
                   alert(result.message);
               }
           },
           error: function(){

           },
           complete: function(){

           }

       });


    })

});