const TaskElement = document.getElementById("save");
TaskElement.addEventListener('click',myFunction);

document.getElementById("textarea").onkeyup = function(){myFunction()};

function myFunction() {
    let x = document.getElementById("textarea");
    x.value = x.value.trim();
}