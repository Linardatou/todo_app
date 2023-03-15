var checkBox = document.getElementById("check");
var text = document.getElementById("agree");
function checks() {
    if (checkBox.checked == true){
      text.disabled = false;
    }else {
       text.disabled =  true;
    }
  }