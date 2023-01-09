<?php 
  //
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

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //$id = ;
  $title = $_POST['task'];
  //$button1 = "UPDATE tasks SET status='Complete' WHERE id= " ;
 // $button2 = "DELETE FROM tasks WHERE $row = ";
  

  
  //if(!empty($_POST['task'])){
  $sql = "INSERT INTO pinaka (`title`,`status`) VALUES ('$title', 0)";
  $cl = $mysqli->query($sql);

}

$results = $mysqli->query("SELECT * FROM tasks");

?>

<html>
<head>
<link rel="stylesheet" href="style.css">
    <title>jereis</title>
    
</head>
<body>
  <div class="container">
       <h1>To do app</h1>
       <p>Enter a task to do and press save</p>

<form method="POST" name="sample"  action="./jereis.php">

    <input type="text" name="task" id="textarea">
    <input type="submit" name="add" value="Save" class="btn" id="save" >
</form>

  </div>
<br><br>
        <table id="tbl" class="table">
            <thead>
              <th>No.</th> 
              <th>Task</th>
              <th>Status</th>
              <th>Button</th>             
            </thead>
            <tbody>
              <?php 
                if ($results->num_rows > 0) {
                  // output data of each row
                  while($row = $results->fetch_assoc()) {
                    echo '<tr>';
                echo '<td>'. $row["id"].'</td>';
                echo '<td>'. $row["title"] .'</td>';
                echo '<td>'. ($row["status"] == 0?"In Progress":"Complete") .'</td>';
                echo '<td><button name="up">Update</button> <button name="del">Delete</button></td>';
                echo '<tr>';  
                  }
                }

              //for($i = 0; $i < count($title); $i++)
                
              ?>
            </tbody>
        </table>
   

<br>

    </body>
</html>
<?php $mysqli -> close(); ?>
