function triminput() {
    document.getElementById("save").disabled = true;
    tsk = document.getElementById("task").value.trimStart().trimEnd();
    if(tsk.length != 0){
      document.getElementById("save").disabled = false;
     }
    }
    
// //document.getElementById("save").disable = true;

// const TaskElement = document.getElementById("save");
// TaskElement.addEventListener('click',myFunction);

// document.getElementById("task").onkeyup = function(){myFunction()};

// function myFunction() {
//     let x = document.getElementById("textarea");
//     x.value = x.value.trim();
// }