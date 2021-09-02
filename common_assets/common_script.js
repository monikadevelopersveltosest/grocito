if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
    var href = "http://localhost/myproject/now50/refferal/";
}else{
    var href = "http://helpnow50.com/refferal";
}
function submitForm(formid){
  $("#"+formid+" .detail_submit_btn").attr('disabled', true);
  // Initiate Variables With Form Content
  // var href = "admin/"+formid;
  var form = $("#"+formid)[0];
  var data = new FormData(form);

  $.ajax({
      enctype: 'multipart/form-data',
      processData: false,  // Important!
      contentType: false,
      cache: false,
      type: "POST",
      dataType: "json",
      url: href+formid,
      data:data,
      success : function(data){
          if (data.status == 1){
              //formSuccess();
              // submitMSG(true,'Success');
              $.notify({
                  icon: 'ti-gift',
                  message: data.msg
              },{type: 'success',timer: 1000});
              //location.reload();
              
              setTimeout(function(){location.reload()},1000);
          } else {
              $(".detail_submit_btn").removeAttr('disabled');
              $.notify({
                  icon: 'ti-info-alt',
                  message: data.msg
              },{type: 'danger',timer: 1000});

          }
      },
      error: function(data) {
          $(".detail_submit_btn").removeAttr('disabled');
          $.notify({
                  icon: 'ti-info-alt',
                  message: data.msg
              },{type: 'danger',timer: 1000});
      },
  });
}

$(document).ready(function(){
    var form_ids = [ 
                'personalDetailSubmit','contactDetailSubmit','bankDetailSubmit','nomineeDetailSubmit','addressDetailSubmit']; // form ids for submit
    $.each( form_ids, function( index, id_val ){
        $("#"+id_val).validator().on("submit", function (event) {
            if (event.isDefaultPrevented()) {
                // console.log(event.isDefaultPrevented());
            } else {
                // everything looks good!
                event.preventDefault();
                submitForm(id_val);
            }
        });
    });
});