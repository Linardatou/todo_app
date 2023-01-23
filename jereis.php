<?php 
  $hostname = "localhost";
  $username = "root";
  $password = ""; 
  $dbname = "todoapp";
  
//create connection
$mysqli = new mysqli($hostname, $username,  $password, $dbname);
  
// Check connection
if ($mysqli->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
////

$results = $mysqli->query("SELECT * FROM tasks");

?>


<html>
  <title>Jereis</title>
<head>
<!--this will make the jquery work-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<link rel="stylesheet" href="style.css">

<script type="text/javascript" href="trim.js"></script>
    <title>jereis</title>
    
</head>
<body>

  <div class="container">
       <h1>To do app</h1>
       <p>Enter a task to do and press save</p>

<form method="POST" name="sample" action="./jereis.php">

  <input type="text" name="task" id="task" onkeyup="submitForm()">
  <input type="submit" name="add" value="save" class="btn" id="save" disabled="true">

</form> 

<script>
//this disables the save button by default.
function submitForm(){
const execute = document.getElementById("task");//when textarea is used by user 
execute.addEventListener('click',triminput)//calls triminput function 
}

function triminput() {
document.getElementById("save").disabled = true;
tsk = document.getElementById("task").value.trimStart().trimEnd();

ocument.getElementById("demo").innerHTML = tsk.length

if(tsk.length != 0){
  document.getElementById("save").disabled = false;
} 

}

</script>
<?php
//disable the button when textarea is empty 
//onkeyup calls when user releases a key
//kantw vste to page na mhn kanei reload kaue fora poy patietai koybi
//AJAX request &&jQuerry
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['task'];

  $sql = "INSERT INTO tasks (`title`,`status`) VALUES ('$title', 0)";
  $cl = $mysqli->query($sql);
  }
?>

  </div>
<br><br>
<?php
if($results->num_rows > 0) { ?>
        <table id="tbl" class="table">
            <thead>
              <th>No.</th>   
              <th>Task</th>
              <th>Status</th>
              <th>Button</th>             
            </thead>
            <tbody>
         <?php 
              $a = 0;
              $sn = 1;
              while($row = $results->fetch_assoc()) { ?>
              <tr>
                <td><?= $sn ?></td>
                <td><?= $row["title"] ?></td>
                <td><?= ($row["status"] == 0?"In Progress":"Complete")?></td>
                <!--returns the value of status the value of status is "In Progress" if 0 is TRUE 
                 else if the value of status is FALSE then status is "Complete!" -->
                <td> <a href="update.php?id=<?= $row["id"] ?>"> <button name="up">Update</button></a>
                     <a href="delete.php?id=<?= $row["id"] ?>"><button name="del">Delete</button></a> 
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

    </body>
</html>
<?php $mysqli -> close(); ?> 

<!--Make it so it doesn't accept blank space as input-->
<!--ekanes to updating monh sou!-->