$(document).ready(function() { 
    $('[data-toggle="tooltip"]').tooltip();
	$(".loginModal").on("click", function() { 
	    $('#loginModal').modal('show');
	});
	$(".sign_up").on("click", function(){
	  $('#login').addClass('d-none');
	  $('#signup').removeClass('d-none');
	  $('#forgat').addClass('d-none');
	  $('#loginotp').addClass('d-none'); 
    });
	$(".signin").on("click", function() {
	  $('#login').removeClass('d-none');
	  $('#signup').addClass('d-none');
	  $('#forgat').addClass('d-none'); 
	});
	// <>
	$(".forget_pass").on("click", function() {
	  $('#forgat').removeClass('d-none');
	  $('#login').addClass('d-none');
	  $('#signup').addClass('d-none');
      // $('#forgototpmodel').addClass('d-none');
	});
    
	// <>
	$(".loginbyotp").on("click", function(){
	  $('#loginotp').removeClass('d-none');
	  $('#login').addClass('d-none');
      $('#forgat').addClass('d-none');
      $('#signup').addClass('d-none'); 
	  // $('#signup').addClass('d-none'); 
	});
    $(".cls1").click(function(){
	   $(".sec1").addClass("d-none")
	});
	$(".cls2").click(function(){
	   $(".sec2").addClass("d-none")
	});
	$(".cls3").click(function(){
	   $(".sec3").addClass("d-none")
	});
	$(".close_btn").click(function(){
	   $(".ddd").css("display", "none");
	});
	$(".cart").click(function(){
	   $(".ddd").css("display", "block");
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

    $(".submitregister").on("click", function(){
    	// alert("hi");
        $(".submitregister").attr('disabled', true);
        $(".submitregister").addClass('buttonload'); 
        $(".submitregister").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        // Initiate Variables With Form Content
        var first_name = $(".rfirstname").val();
        var last_name = $(".rlastname").val();
        var password = $(".rpassword").val();
        var mobile_no = $(".rmobilenumber").val();
        // alert(first_name);
		var href = base_url+"home/registerajax";
		$.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: { 
                    first_name:first_name,
                    last_name:last_name,
                    password:password,
                    mobile_no:mobile_no
                },
            success : function(data){
                if(data.status == 1){
                    $.notify(data.msg, "success");
                     // setTimeout(function(){window.location.href="<?php echo base_url();?>refferal"},1000);
                    $('#signup').addClass('d-none');

                    $('#registerotp').removeClass('d-none');
                    $(".submitregister").removeAttr('disabled');
                    $(".submitregister").removeClass('buttonload');
                    $(".submitregister").html('Submit');

                } else {
                    $.notify(data.msg, "error");
                    $(".submitregistermsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    
                    $(".submitregister").removeAttr('disabled');
                    $(".submitregister").removeClass('buttonload');
                    $(".submitregister").html('Submit');
                }
            },
            error: function(data){
                $.notify(data.msg, "error");
                $(".submitregistermsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".submitregister").removeAttr('disabled');
                $(".submitregister").removeClass('buttonload');
                $(".submitregister").html('Submit');
            },
        });
    });

    $(".submitregisterotp").on("click", function(){
        // Initiate Variables With Form Content
        var registerinputopt = $(".registerinputopt").val();
        // alert(first_name);
        var href = base_url+"home/confirmregisterajax";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: { 
                    otp:registerinputopt
                },
            success : function(data){
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    setTimeout(function(){window.location.href=base_url},1000);
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $(".submitregisterotpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $.notify(data.msg, "error");
                    
                }
            },
            error: function(data) {
                $(".submitregisterotpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $.notify(data.msg, "error");
            },
        });
    });

    $(".submitloginbypassword").on("click", function(){
        $("#loginformpassword .submitloginbypassword").attr('disabled', true);
        $("#loginformpassword .submitloginbypassword").addClass('buttonload'); 
        $("#loginformpassword .submitloginbypassword").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        // Initiate Variables With Form Content
        var loginmoibleno = $(".loginmoibleno").val();
        var loginpassword = $(".loginpassword").val();
        var clickbutton = $(".clickbutton").val();
        // alert(first_name);
        var href = base_url+"home/loginbypassword";
        $.ajax({
            type: "POST",
            url: href,
            data: { mobile_no:loginmoibleno,password:loginpassword},
           dataType: "json",
            success : function(data){
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    if(clickbutton == "continueshipping"){
                        // var current_page_url = base_url+"addshippinginfo";
                        setTimeout(function(){window.location.href=base_url+"addshippinginfo"},1000);
                    }else{
                        setTimeout(function(){window.location.href=current_page_url},1000);
                    }
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".submitloginbypassworderror").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".submitloginbypassword").removeAttr('disabled');
                    $(".submitloginbypassword").removeClass('buttonload');
                    $(".submitloginbypassword").html('Submit');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".submitloginbypassworderror").html(data.msg);
                $(".submitloginbypassworderror").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".submitloginbypassword").removeAttr('disabled');
                $(".submitloginbypassword").removeClass('buttonload');
                $(".submitloginbypassword").html('Submit');
            },
        });
    });

    $(".fogotpasswordsubmit").on("click",function(){
        $("#forgotpasswordform .fogotpasswordsubmit").attr('disabled', true);
        $("#forgotpasswordform .fogotpasswordsubmit").addClass('buttonload'); 
        $("#forgotpasswordform .fogotpasswordsubmit").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        // Initiate Variables With Form Content
        var moibleno = $("#fomrsphonenoforgot").val();
        // alert(moibleno);
        // alert(first_name);
        var href = base_url+"home/forgotpasswordsubmit";
        $.ajax({
            type: "POST",
            url: href,
            data: { moibleno:moibleno},
            dataType: "json",
            success : function(data){
                // alert(data);
                if (data.status == 1){

                    $(".fogotpasswordsubmiterror").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".fogotpasswordsubmit").removeAttr('disabled');
                    $(".fogotpasswordsubmit").removeClass('buttonload');
                    $(".fogotpasswordsubmit").html('Submit');
                    $.notify(data.msg, "success");
                    $('#forgat').addClass('d-none');
                    $('#forgototpmodel').removeClass('d-none');
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".fogotpasswordsubmiterror").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".fogotpasswordsubmit").removeAttr('disabled');
                    $(".fogotpasswordsubmit").removeClass('buttonload');
                    $(".fogotpasswordsubmit").html('Submit');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".fogotpasswordsubmiterror").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".fogotpasswordsubmit").removeAttr('disabled');
                $(".fogotpasswordsubmit").removeClass('buttonload');
                $(".fogotpasswordsubmit").html('Submit');
            },
        });
    });

    $(".verifyForgotOtp").on("click", function(){
        $(".verifyForgotOtp").attr('disabled', true);
        $(".verifyForgotOtp").addClass('buttonload'); 
        $(".verifyForgotOtp").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        
        // Initiate Variables With Form Content
        var forgototpval = $("#forgototpval").val();
        // alert(forgototpval);
        var href = base_url+"home/verifyForgotOtp";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: {otp:forgototpval},
            success : function(data){
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    $(".verifyForgotOtpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".verifyForgotOtp").removeAttr('disabled');
                    $(".verifyForgotOtp").removeClass('buttonload');
                    $(".verifyForgotOtp").html('Verify');
                    $('#forgototpmodel').addClass('d-none');
                    $('#changeforgotpassword').removeClass('d-none');
                    // setTimeout(function(){window.location.href=base_url},1000);
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".verifyForgotOtpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".verifyForgotOtp").removeAttr('disabled');
                    $(".verifyForgotOtp").removeClass('buttonload');
                    $(".verifyForgotOtp").html('Verify');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".verifyForgotOtpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".verifyForgotOtp").removeAttr('disabled');
                $(".verifyForgotOtp").removeClass('buttonload');
                $(".verifyForgotOtp").html('Verify');
            },
        });
    });

    $(".changeforgotpasswrodsubmit").on("click", function(){
        $(".changeforgotpasswrodsubmit").attr('disabled', true);
        $(".changeforgotpasswrodsubmit").addClass('buttonload'); 
        $(".changeforgotpasswrodsubmit").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        
        // Initiate Variables With Form Content
        var fnewpassword = $("#fnewpassword").val();
        var fcpassword = $("#fcpassword").val();
        // alert(forgototpval);
        var href = base_url+"home/changeforgotpasswrodsubmit";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: {fnewpassword:fnewpassword,fcpassword:fcpassword},
            success : function(data){
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    $(".changeforgotpasswrodmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".changeforgotpasswrodsubmit").removeAttr('disabled');
                    $(".changeforgotpasswrodsubmit").removeClass('buttonload');
                    // $(".changeforgotpasswrodsubmit").html('submit');
                    // $('#forgototpmodel').addClass('d-none');
                    // $('#changeforgotpassword').removeClass('d-none');
                    setTimeout(function(){window.location.href=base_url},1000);
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".changeforgotpasswrodmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".changeforgotpasswrodsubmit").removeAttr('disabled');
                    $(".changeforgotpasswrodsubmit").removeClass('buttonload');
                    $(".changeforgotpasswrodsubmit").html('submit');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".changeforgotpasswrodmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".changeforgotpasswrodsubmit").removeAttr('disabled');
                $(".changeforgotpasswrodsubmit").removeClass('buttonload');
                $(".changeforgotpasswrodsubmit").html('submit');
            },
        });
    });

    $(".loginbyotpsubmit").on("click",function(){
        $(".loginbyotpsubmit").attr('disabled', true);
        $(".loginbyotpsubmit").addClass('buttonload'); 
        $(".loginbyotpsubmit").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        // Initiate Variables With Form Content
        var moibleno = $("#loginbyotpmobile").val();
        // alert(moibleno);
        // alert(first_name);
        var href = base_url+"home/loginbyotpsubmit";
        $.ajax({
            type: "POST",
            url: href,
            data: { moibleno:moibleno},
            dataType: "json",
            success : function(data){
                // alert(data);
                if (data.status == 1){

                    $(".loginbyotpsubmitmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".loginbyotpsubmit").removeAttr('disabled');
                    $(".loginbyotpsubmit").removeClass('buttonload');
                    $(".loginbyotpsubmit").html('Submit');
                    $.notify(data.msg, "success");
                    $('#loginotp').addClass('d-none');
                    $('#verifyloginotpmodel').removeClass('d-none');
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".loginbyotpsubmitmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".loginbyotpsubmit").removeAttr('disabled');
                    $(".loginbyotpsubmit").removeClass('buttonload');
                    $(".loginbyotpsubmit").html('Submit');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".loginbyotpsubmitmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".loginbyotpsubmit").removeAttr('disabled');
                $(".loginbyotpsubmit").removeClass('buttonload');
                $(".loginbyotpsubmit").html('Submit');
            },
        });
    });

    $(".verifyloginotp").on("click", function(){
        $(".verifyloginotp").attr('disabled', true);
        $(".verifyloginotp").addClass('buttonload'); 
        $(".verifyloginotp").html('<i class="fa fa-spinner fa-spin"></i>Loading');
        
        // Initiate Variables With Form Content
        var loginotpval = $("#loginotpval").val();
        var clickbutton = $(".clickbutton").val();
        // alert(first_name);
        var href = base_url+"home/loginbypassword";
        // alert(forgototpval);
        var href = base_url+"home/verifyloginOtp";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: {otp:loginotpval},
            success : function(data){
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    $(".verifyloginotpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    if(clickbutton == "continueshipping"){
                        // var current_page_url = base_url+"addshippinginfo";
                        setTimeout(function(){window.location.href=base_url+"addshippinginfo"},1000);
                    }else{
                        setTimeout(function(){window.location.href=current_page_url},1000);
                    }
                    // setTimeout(function(){window.location.href=base_url},1000);
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                    $(".verifyloginotpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                    $(".verifyloginotp").removeAttr('disabled');
                    $(".verifyloginotp").removeClass('buttonload');
                    $(".verifyloginotp").html('Verify');
                    
                }
            },
            error: function(data) {
                $.notify(data.msg, "error");
                $(".verifyloginotpmsg").html("<div class='alert alert-warning alert-dismissible fade show' role='lert'>"+data.msg+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>");
                $(".verifyloginotp").removeAttr('disabled');
                $(".verifyloginotp").removeClass('buttonload');
                $(".verifyloginotp").html('Verify');
            },
        });
    });
    

    $("#support_message").on("click", function(){
      var form = $("#support_message_form")[0];

      $("#support_message_form #support_message").attr('disabled', true);
      $("#support_message_form #support_message").addClass('buttonload'); 
      $("#support_message_form #support_message").html('<i class="fa fa-spinner fa-spin"></i>Loading');
          
        // alert(form);
        var href = base_url+"shop/support_ticket";
        var data = new FormData(form);
        // alert(data);

        $.ajax({
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        type: "POST",
        url: href,
        data:data,
        dataType: "html",
        success : function(data){
          // alert(data);
          $.notify(data, "success");
          setTimeout(function(){ window.location.href = href; }, 3000);
          
        },
        error: function(data) {
            $("#support_message").removeAttr('disabled');
            $("#support_message").removeClass('buttonload');
            $("#support_message").html('Submit');
        },
      });
    });

    $("#support_messagee").on("click", function(){
      var form = $("#support_message_formm")[0];

      $("#support_message_formm #support_messagee").attr('disabled', true);
      $("#support_message_formm #support_messagee").addClass('buttonload'); 
      $("#support_message_formm #support_messagee").html('<i class="fa fa-spinner fa-spin"></i>Loading');
          
        // alert(form);
        var href = "http://localhost/myproject/multivendor/deliveryboy/support_ticket";
        var data = new FormData(form);
        // alert(data);

        $.ajax({
        enctype: 'multipart/form-data',
        processData: false,  // Important!
        contentType: false,
        cache: false,
        type: "POST",
        url: href,
        data:data,
        dataType: "html",
        success : function(data){
          // alert(data);
          $.notify(data, "success");
          setTimeout(function(){ window.location.href = href; }, 3000);
          
        },
        error: function(data) {
            $("#support_messagee").removeAttr('disabled');
            $("#support_messagee").removeClass('buttonload');
            $("#support_messagee").html('Submit');
        },
      });
    });


    $(".saveReview").on("click", function(){
        // Initiate Variables With Form Content
        // alert('hi');
        var form = $("#ratingForm")[0];

        $("#ratingForm .saveReview").attr('disabled', true);
        $("#ratingForm .saveReview").addClass('buttonload'); 
        $("#ratingForm .saveReview").html('<i class="fa fa-spinner fa-spin"></i>Loading');
         
        var rating = $("#rating").val();
        var comment = $("#comment").val();
        var shop_id = $("#shop_id").val();
        var order_id = $("#order_id").val();
        // alert(first_name);
        var href = base_url+"home/saveReview";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: {'rating':rating,'comment':comment,'shop_id':shop_id,'order_id':order_id},
            success : function(data){
                $(".saveReview").removeAttr('disabled');
                $(".saveReview").removeClass('buttonload');
                $(".saveReview").html('Submit');
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    setTimeout(function(){window.location.href=current_page_url},1000);
                    // $('#signup').addClass('d-none');
                    // $('#registerotp').removeClass('d-none');

                } else {
                    $.notify(data.msg, "error");
                }
                
            },
            error: function(data) {
                $(".saveReview").removeAttr('disabled');
                $(".saveReview").removeClass('buttonload');
                $(".saveReview").html('Submit');
            },
        });
    });

    $(".saveProductReview").on("click", function(){
        // Initiate Variables With Form Content
        // alert('hi');
        var form = $("#productratingForm")[0];

        $("#productratingForm .saveProductReview").attr('disabled', true);
        $("#productratingForm .saveProductReview").addClass('buttonload'); 
        $("#productratingForm .saveProductReview").html('<i class="fa fa-spinner fa-spin"></i>Loading');
         
        var rating = $(".prating").val();
        var comment = $(".comment").val();
        var product_id = $("#product_id").val();
        var order_id = $("#order_id").val();
        // alert(first_name);
        var href = base_url+"home/saveProductReview";
        $.ajax({
            type: "POST",
            dataType: "json",
            url: href,
            data: {'rating':rating,'comment':comment,'product_id':product_id,'order_id':order_id},
            success : function(data){
                $(".saveProductReview").removeAttr('disabled');
                $(".saveProductReview").removeClass('buttonload');
                $(".saveProductReview").html('Submit');
                if (data.status == 1){
                    $.notify(data.msg, "success");
                    setTimeout(function(){window.location.href=current_page_url},1000);

                } else {
                    $.notify(data.msg, "error");
                    
                }
                
            },
            error: function(data) {
                $(".saveProductReview").removeAttr('disabled');
                $(".saveProductReview").removeClass('buttonload');
                $(".saveProductReview").html('Submit');
            },
        });
    });
    
    // $("#contact").on("click", function(){
    //   var form = $("#contactinfoform")[0];
      
    //   $("#contactinfoform #contact").attr('disabled', true);
    //   $("#contactinfoform #contact").addClass('buttonload'); 
    //   $("#contactinfoform #contact").html('<i class="fa fa-spinner fa-spin"></i>Loading');
          
    //     alert(form);
    //     var href = base_url+"contact";
    //     var data = new FormData(form);
    //     // alert(data);

    //     $.ajax({
    //     enctype: 'multipart/form-data',
    //     processData: false,  // Important!
    //     contentType: false,
    //     cache: false,
    //     type: "POST",
    //     url: href,
    //     data:data,
    //     dataType: "html",
    //     success : function(data){
    //     alert(data);
    //     // $.notify(data, "success");
    //     // setTimeout(function(){ window.location.href = base_url+"thankyou"; }, 3000);
    //     // window.location.href = "base_url().thankyou"; 
    //         if(data.status==1){
    //             $.notify(data.msg, "success");
    //             // setTimeout(function(){ window.location.href = base_url+"contact"; }, 3000);
    //         }else{
    //             $("#contact").removeAttr('disabled');
    //             $("#contact").removeClass('buttonload');
    //             $("#contact").html('Submit');
    //             $.notify(data.msg, "error");
    //         }
        
          
    //     },
    //     error: function(data) {
    //         $("#contact").removeAttr('disabled');
    //         $("#contact").removeClass('buttonload');
    //         $("#contact").html('Submit');
    //     },
    //   });
    // });
});