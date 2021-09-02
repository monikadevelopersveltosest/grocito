if (location.hostname === "localhost" || location.hostname === "127.0.0.1"){
    var href = "http://localhost/myproject/5levelmlm/refferal/";
}else{
    var href = "http://helpnow50.com/crowdfunding/refferal/";
}
function submitForm(formid){
  // $("#"+formid+" .detail_submit_btn").attr('disabled', true);
  // Initiate Variables With Form Content
  // var href = "adminnew/"+formid;
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
              // $.notify({
              //     icon: 'ti-gift',
              //     message: data.msg
              // },{type: 'success',timer: 1000});
              $.notify(data.msg, "success");
              //location.reload();
              
              setTimeout(function(){location.reload()},1000);
          } else {
              // $(".detail_submit_btn").removeAttr('disabled');
              $.notify(data.msg, "error");

          }
      },
      error: function(data) {
          //$(".detail_submit_btn").removeAttr('disabled');
          $.notify("Oops something went wrong please try again", "error");
      },
  });
}

$(document).ready(function(){
    var form_ids = ['personalDetailSubmit','contactDetailSubmit','bankDetailSubmit','nomineeDetailSubmit','addressDetailSubmit','otherDetailSubmit','applicant_identification_detail_edit','changetransactionpassword','changeprofilepassword','ticket','addreply','otp_send']; // form ids for submit
    $.each( form_ids, function( index, id_val){
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

    function preview_thumb(input, thumb_id) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#'+thumb_id).attr('src', e.target.result);
          // alert(thumb_id);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
    $("[type=file]").change(function() {
        var thumb_id = $(this).data('id');
        preview_thumb(this,thumb_id);
    });

    $(".delete").click(function(){
        var id = $(this).attr('href-id');
        var table = $(this).attr('href-table');
        var colname = $(this).attr('href-colname');
        //alert(id);
        $.ajax({
            data:{id:id,table:table,colname:colname},
            type: "POST",
            url: href+"deleterecord",

            dataType: "json",
         success: function(data){
            // alert(data);
            // $("#statelist").html(data);
            // country_isd_code(cname);
            $.notify(data.msg, "success");
              //location.reload();
              
            setTimeout(function(){location.reload()},1000);
        }});
    });
});