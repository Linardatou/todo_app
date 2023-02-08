
function triminput() {
    document.getElementById("save").disabled = true;
    tsk = document.getElementById("task").value.trimStart().trimEnd();
    if(tsk.length != 0){
      document.getElementById("save").disabled = false;
     }
    }
    
