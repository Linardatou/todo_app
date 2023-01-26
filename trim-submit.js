//const execute = document.getElementById("task");//when textarea is used by user 
//execute.addEventListener('click',triminput)//calls triminput function 

function triminput() {
    document.getElementById("save").disabled = true;
    tsk = document.getElementById("task").value.trimStart().trimEnd();
    if(tsk.length != 0){
      document.getElementById("save").disabled = false;
     }
    }
    
