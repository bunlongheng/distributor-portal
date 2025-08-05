$(document).ready(function(){
    // exit if this is not the import progress page
    if(typeof product_import == 'undefined' || !product_import)
      return false;
    const eleBar = $('#import_progress');
    const elePercentage = $('#percentage');
    /*if(eleBar.length==0) {
        return false;
    }*/
    let {status} = product_import;   
    let {completed, total} = product_import.polls;   
    let completed_percentage = (completed / total) * 100;
    // eleBar.width(completed_percentage+'%');
    console.log({completed_percentage});

    if (status != 'completed') {
      process();
    }

    function process() {
      $.ajax({
          type : "POST",
          url : "/product_uploads/"+product_import.id+"/process",
          data : {
              "_token" : _token,
          },
          dataType : "json",
          cache : false,
          success : function(data) {
            if(data && data.status===false) {
                alert(data.message);
                return;
            }
            let {completed, total} = data.polls;   
            let completed_percentage = (completed / total) * 100;
            completed_percentage = Math.floor(completed_percentage);
            // eleBar.width(completed_percentage+'%');
            // elePercentage.text(completed_percentage+'%');
            if (data.status == 'completed') {
              window.location.reload();
              return;
            }
            process();
          }
      });
    }
});