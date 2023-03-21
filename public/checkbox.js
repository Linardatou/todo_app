let checkBox = document.getElementById("check");
let submitBtn = document.querySelector(".submitBtn");
function checks() {
    if (checkBox.checked == true){
      submitBtn.disabled = false;
    }else {
      submitBtn.disabled =  true;
    }
  }

