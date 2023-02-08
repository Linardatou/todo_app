
function triminput() {
    document.getElementById("save").disabled = true;
    tsk = document.getElementById("task").value.trimStart().trimEnd();
    if(tsk.length != 0){
      document.getElementById("save").disabled = false;
     }
    }

    $(function(){
      $(".save").on("click",function(event){
        event.preventDefault();
        const id = $(this).data("id")
        const title = $(this).data("title")
        const status = $(this).data("status")
        const _this = $(this)
        $.ajax({
          url: "insert.php",
          dataType: "json",
          type: "POST",
          data : {
            id: id,
            title: title,
            status: status,
          },
          success: function(data, textStatus, jqXHR){
            if(data.success == "ok")
            {
              _this.data("id", id)
              _this.data("title", title)
              _this.data("status", status)
            }
          },
          error: function(jqXHR, textStatus, errorThrown){}
        });
      })
    }) 
    
