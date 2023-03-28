<?php
session_start();
if(isset($_SESSION["userid"])){
    header("Location: index.php");
}
include "db.php";
?>
<html>
<head>
    <title>Sign Up Page for do to list</title>
    <link rel="stylesheet" href="style.css" type="text/css"> 
</head>
<body>
<div class="tapper1"> 
<h1 id="sign">This is a Sign Up Form</h1>
    <form id="signup-form">
        <label>Enter username:</label>
        <input type="text" id="username" placeholder="Enter username">
        <br><br>
        <label>Enter Email:</label>    
        <input type="text" id="email" placeholder="Enter email"> 
        <br><br>
        <label>Enter name:</label>    
        <input type="text" id="name" placeholder="Enter a name to adress you by in emails">
        <br><br>
        <label>Enter password:</label>
        <input type="password" id="password" placeholder="Enter password">
        <br><br>
        <label> password:</label>
        <input type="password" id="repassword" placeholder="Renter password">
        <br><br>
  <div id="check-submit">
        <input type=checkbox id="check" onclick="checks()">Agree with our</input>
        <a href="https://en.wikipedia.org/wiki/Terms_of_service">Terms and Conditions</a>
        <br><br>
        <button id="login" class="signup submitBtn" type="submit" disabled="true">Submit</button>
    </form>
    <p>You have an account?<a href="login.php">Login</a></p>
  </div>
  
<div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="checkbox.js"></script>
<script>
$(function() {
    $("#signup-form").on("submit",function(event){
        event.preventDefault();
        const username = $("#username").val();
        const password = $("#password").val();
        const repassword = $("#repassword").val()
        const email = $("#email").val()
        const name = $("#name").val()
        const _this = $(this)
    if(password.length >= 8){
          if(password != repassword){//an to password kai to passwords jana den einai ta idia,
            return;//kane return tipota.
          }
        $.ajax({
          url: "ajaxsignup.php",
          dataType: "json",
          type: "POST",
          data : {
            username : username,
            password : password,
            email: email,
            name: name
          },
          success: function(data, textStatus, jqXHR){
            if(data.success == "ok")
            {
              window.location.href = "index.php"; 
            }else{
              console.log(data.msg);
            }
          },
          error: function(jqXHR, textStatus, errorThrown){}
        });
    }else{
      $("h1").html("Password needs atleast 8 characters");
        console.log("password < 8");
        return;//so that the browser doesnt ask to save login, even tho it never goes through
    };
   })
});
  
</script>

</body>
</html>
