//const execute = document.getElementById("task");//when textarea is used by user 
//execute.addEventListener('click',triminput)//calls triminput function 

function triminput() {
    document.getElementById("save").disabled = true;
    tsk = document.getElementById("task").value.trimStart().trimEnd();
    if(tsk.length != 0){
      document.getElementById("save").disabled = false;
     }
    $('.save').click(function(){
     $.ajax({
      type: "POST",
      url: "insert.php",
      dataType: "json",
      data:{title: title,},
       cache: false,
       success: function(data) {
        // if(data.success == "ok"){
         }
       })
      });
    }
    
