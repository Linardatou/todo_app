<?php 

//echo "This is a php message";
//print_r($_POST);
//$id = $_POST['metra'];
//f

//var_dump($task);

//datebase connection
$hostname = "localhost";
$username = "root";
$password = ""; 
$dbname = "todoapp";

$mysqli = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

?>

<html>
<head>

  <style>
    body{ 
      background-color: rgb(209, 209, 209);
      font-style: inherit; 
    }
    .hide {
      display: none;
    }

    .container{ 
      border-style: none;
      border-radius: 15px;
      background-color: rgb(247, 246, 246);
      padding-top: 12.5px;
      padding-bottom: 10px;
      width: 400px;
      text-align: center;
      margin: auto;
      margin-top: 200px;
      font-style: courier;
    }
    input[type=text]{
      width: 60%;
    }
    input[name=add]{
      background-color: rgb(0, 162, 255);
      color:aliceblue;
      border-radius: 4px;
      border: none;
      padding: 3px 6px;
      font-size: 14px;
    }
    input[name=up]{
      background-color: rgba(98, 184, 58, 0.966);
      color:aliceblue;
      border-radius: 4px;
      border: none;
      padding: 3px 6px;
      font-size: 14px;
    }
    input[name=del]{
      background-color: rgb(226, 62, 62);
      color:aliceblue;
      border-radius: 4px;
      border: none;
      padding: 3px 6px;
      font-size: 14px;
    }
    table{
      border-style: none;
      margin:auto;
      width: 450px;
      text-align: center;
      border-radius: 15px;
      background-color: rgb(241, 241, 241);
      padding: 20px 30px 20px 30px;
    }
    th,td {
    padding: 8px;
    text-align: center;
    border-bottom: 0.3px solid #DDD;
    }


  </style>
    <title>jereis</title>
    
</head>
<body>
  <div class="container">
       <h1>To do app</h1>
       <p>Enter a task to do and press save</p>

<form method="POST" name="sample"  action="./jereis.php">

    <input type="text" name="task" id="textarea">
    <input type="submit" name="add" value="Save" class="btn" id="save">
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
          
            </tbody>
        </table>
</form>    

<br>


<!--peirama gia auto 
<p id="duck">AE</p>
<button id="kubi" type="color: red;" onclick="red()">Quack</button> -->



    </body>
</html>
<?php $mysqli -> close(); ?>
