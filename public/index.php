<?php 
include "db.php";
// Check connection
if ($mysqli->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
$results = $mysqli->query("SELECT * FROM tasks");

//onkeyup calls when user releases a key
//kantw vste to page na mhn kanei reload kaue fora poy patietai koybi
//AJAX request &&jQuerry
?>

<html>
<head>
<title>jereis</title>
<!--this will make the jquery work-->
<link rel="stylesheet" href="style.css">  
</head>
<body>

  <div class="container">
       <h1>To do app</h1>
       <p>Enter a task to do and press save</p>

<form method="POST" name="sample" action="./insert.php" id="form">

  <input type="text" name="task" id="task" onkeyup="triminput()">
  <input type="submit" name="add" value="save" class="save" id="save" disabled="true">

</form> 

  </div>
<br><br>
<?php
if($results->num_rows > 0) { ?> <!--write ajax here for when everything is table gets deleted to not show the table-->
        <table id="tbl" class="table">
            <thead>
              <th>No.</th>   
              <th>Task</th>
              <th>Status</th>
              <th>Button</th>             
            </thead>
            <tbody>
         <?php 
              $sn = 1;
              while($row = $results->fetch_assoc()) { ?>
              <tr>
                <td><?= $sn ?></td>
                <td><?= $row["title"] ?></td>
                <td class="status"><?= ($row["status"] == 0?"In Progress":"Complete")?></td>
                <!--returns the value of status the value of status is "In Progress" if 0 is TRUE 
                 else if the value of status is FALSE then status is "Complete!" -->
                <td><button class="button update" data-id="<?= $row["id"] ?>" data-status="<?= $row["status"] ? 0 : 1?>">Update</button>
                    <button class="button delete" data-id="<?= $row["id"] ?>">Delete</button> 
                </td>
              <tr>  
           <?php 
                $sn++; 
              }               
            ?>
            </tbody>
        </table>
<?php } ?>

<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="trim-submit.js"></script>
<!--<script type="text/javascript" src="filter.js"></script>-->

<script>
/*
*///function attempt sto na ginetai submit to form xvris na to kanei refresh 
//alla prepei na vrb tropo na kanv validate to form prota
  $(function() {
    $(".update").on("click",function(event){
      event.preventDefault();
      const id = $(this).data("id")
      const status = $(this).data("status")
      const _this = $(this)
      $.ajax({
        url : "update.php",
        dataType : "json", 
        type: "POST",
        data : {
          id: id,
          status: status,
        },
        success: function(data, textStatus, jqXHR)
        {
            if(data.success == "ok"){
              _this.parent().prev(".status").text(status? "Complete":"In Progress")
              _this.data("status", status? 0:1)
            }
        },
        error: function (jqXHR, textStatus, errorThrown){}
      });
    })

    $(".delete").on("click",function(event){
      event.preventDefault();
      const id = $(this).data("id")
      const _this = $(this)
      $.ajax({
        url : "delete.php",
        dataType : "json", 
        type: "POST",
        data : {
          id: id,
        },

        success: function(data, textStatus, jqXHR)
        {
            if(data.success == "ok"){
              _this.closest('tr').remove();
            }
            if(id == 0){
              $(".table").hide();//attempt at ahiding the table when you delete everything from it
            }
        },
        error: function (response){}
      });
    })
    
}); 

</script>
    </body>
</html>
<?php $mysqli -> close(); ?> 

<!--Make it so it doesn't accept blank space as input
it somehow outputs a blank?
-->
