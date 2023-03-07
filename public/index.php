<?php 
session_start();//arxizei ena session kai ftiaxnei session id gia ton user meso to POST method
if(!isset($_SESSION["userid"])){//an o server den exei set to session variable userid tote
  header("Location: login.php");//redirects sthn selida login.php
}
include "db.php";//inserts the contents of the file db.php into this one.
//
$statement = $pdo->query("SELECT * FROM tasks");//sto statement variable mpainei to $pdo
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
$results = $statement->fetchAll(PDO::FETCH_ASSOC);//in the arrays result put statement variable 
//and accesses with the method fetchAll()
if($results && count($results)) { ?> <!--an to $results den einai FALSE h Null kai metra ta results array gia na ftiajei rows sto pinaka-->
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
              foreach($results as $row) {//gia kathe object mesa sto result valto sto variable row kai grapsto opow to html kvdika?>
              <tr>
                <td><?= $sn ?></td>
                <td><?= $row["title"] ?></td>
                <td class="status"><?= ($row["status"] == 0?"In Progress":"Complete")?></td>
                <!--returns the value of status the value of status is "In Progress" if 0 is TRUE 
                 else if the value of status is FALSE then status is "Complete!" -->
                <td><button class="button update" data-id="<?= $row["id"] ?>" data-status="<?= $row["status"] ? 0 : 1?>">Update</button>
                    <button class="button delete" data-id="<?= $row["id"] ?>">Delete</button> 
                    <!--to update button edv allazei to data- status-->
                </td>
              <tr>  
           <?php 
                $sn++;
              }     //kleinei foreach          
            ?>
            </tbody>
        </table>
<?php } //kleinei if?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="trim-submit.js"></script>
<!--<script type="text/javascript" src="filter.js"></script>-->

<script>
//function attempt sto na ginetai submit to form xvris na to kanei refresh 
//to parakatv ftiaxnei ena function pou leei oti otan ginei click save, to updata, delete koumpia
  $(function() {
    $(".save").on("click",function(event){//when button class save is clicked the function
        event.preventDefault();//stops the default action, the browser wont refresh to go to another page
        const title = $("#task").val()//the value of the input with the id "task" is set on title
        const _this = $(this)//
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
              _this.data("status", status? 0:1)//janagrafei to status sto html attribute
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

