var checkBox = document.getElementById("check");
var submitBtn = document.querySelector(".submitBtn");
function checks() {
    if (checkBox.checked == true){
      submitBtn.disabled = false;
    }else {
      submitBtn.disabled =  true;
    }
  }