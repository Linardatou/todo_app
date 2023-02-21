<?php 
session_start();
if(!isset($_SESSION["userid"])){
  header("Location: login.php");
}
include "db.php";
// Check connection

$statement = $pdo->query("SELECT * FROM tasks");
?>

<html>
<head>
<title>jereis</title>
<!--the above is what will -->
<link rel="stylesheet" href="style.css">  
</head>
<body>

  <div class="container">
       <h1>To do app</h1>
       <p>Enter a task to do and press save</p>

<form method="POST" name="sample" id="form">

  <input type="text" name="task" id="task" onkeyup="triminput()">
  <input type="submit" name="add" value="save" class="save" id="save" disabled="true">

</form> 

  </div>
<br><br>
<?php
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if($results && count($results)) { ?> 
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
              foreach($results as $row) { ?>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="trim-submit.js"></script>
<!--<script type="text/javascript" src="filter.js"></script>-->

<script>
//function attempt sto na ginetai submit to form xvris na to kanei refresh 
//alla prepei na vrb tropo na kanv validate to form prota
  $(function() {
    $(".save").on("click",function(event){
        event.preventDefault();
        const title = $("#task").val()//
        const _this = $(this)
        $.ajax({
          url: "insert.php",
          dataType: "json",
          type: "POST",
          data : {
            title: title,
          },
          success: function(data, textStatus, jqXHR){
            if(data.success == "ok")
            {
              location.reload()//log in system 

            }else{
              console.log(data)
            }
          },
          error: function(jqXHR, textStatus, errorThrown){}
        });
      })
    
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
             let result = $("#tbl").find("tbody tr").length;
             if(result == 0){
              $("#tbl").hide();
             }
        },
        error: function (response){}
      });
    })   
}); 

</script>
    </body>
</html>

