<?php include "db.php"; ?>
<!DOCTYPE html>
<head>
    <title>Login Page for do to list</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="tapper"> 
<h1 style="color: rgb(0, 162, 255); text-align: center;">Login to use this app</h1>

    <form method="POST" action="" id="login-form">
        Enter username:
        <input type="text" id="user_name" placeholder="Enter username">
        <br><br>
        Enter password:
        <input type="text" id="user_code" placeholder="Enter password">
        <br><br>
        <button id="login" onkeyup="">Submit</button>
    <form>
        <p>You have no account?<a href="">Login Up</a></p>
<div>

<script>
$(function() {
    $(".login").on("click",function(event){
        event.preventDefault();
       // const title = $("#task").val()//
       // const _this = $(this)
        $.ajax({
          url: "login_insert.php",
          dataType: "json",
          type: "POST",
          data : {
            user_name, user_name
          },
    //       success: function(data, textStatus, jqXHR){
    //         if(data.success == "ok")
    //         {
    //           location.reload()//log in system 

    //         }else{
    //           console.log(data)
    //         }
    //       },
    //       error: function(jqXHR, textStatus, errorThrown){}
         });
       })
    });
</script>

</body>
</html>