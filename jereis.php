<?php 
echo "aaaaaaa"

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

<form method="POST" name="sample">

    <input type="text" name="task" id="textarea">
    <input type="button" name="add" value="Save" class="btn" id="save">
  </div>
<br><br>
        <table id="tbl" class="table hide">
            <thead>
              <th>No.</th> 
              <th>Task</th>
              <th>Status</th>
              <th>Button</th>             
            </thead>
            <tbody></tbody>
        </table>
</form>    

<br>


<!--peirama gia auto 
<p id="duck">AE</p>
<button id="kubi" type="color: red;" onclick="red()">Quack</button> -->

<script>

const bob = document.querySelector(".table")
let metra = 1;

const save = document.getElementById("save");
save.addEventListener("click", addResponse);

function addResponse()
    {  
        var no  = 1; 
        var task=document.sample.task.value; 

        let listask = {task:task, status: status="In Progress"}
        
        var tr = document.createElement('tr');

        let arr = [];
        arr.push(listask);
        console.log(arr);

        
      if(task.length == 0 || task == " "){
        alert("Give a task please")
        }else{

        for(let i = 0; i < arr.length; i++){
        bob.classList.remove("hide") 
        
        var td1 = tr.appendChild(document.createElement('td'));
        td1.innerHTML= metra;

        var td2 = tr.appendChild(document.createElement('td'));
        td2.innerHTML= task;

        var td3 = tr.appendChild(document.createElement('td'));
        td3.appendChild(document.createTextNode(arr[i].status));

        var td4 = tr.appendChild(document.createElement('td'));
        td4.innerHTML='<input type="button" name="up" value="Update" onclick="updt(this);" class="btn btn-primary"> <input type="button" name="del" value="Delete" onclick="dlt(this);" class="btn">'

        document.getElementById("tbl").appendChild(tr);
        metra++;
        }
      }
    }

    if(task.length == ""){
        bob.classList.add("hide")
      }


    function dlt(stud){
        var s=stud.parentNode.parentNode;
        s.parentNode.removeChild(s);
    }

    function updt(stud){
      var je = stud.parentNode;
      console.log(je)
      je.previousSibling.innerText = "Complete";
    }
  

</script>

    </body>
</html>
