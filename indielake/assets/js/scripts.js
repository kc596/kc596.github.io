      function callme(){
      $("#body-form1").css("display","block");
      $("#body-terms1").css("display","none");
    }
    $("#myButton1").click(function(){
      $("#body-form1").css("display","none");
      $("#body-terms1").css("display","block");
    });

      function callme2(){
      $("#body-form2").css("display","block");
      $("#body-terms2").css("display","none");
    }
    $("#myButton2").click(function(){
      $("#body-form2").css("display","none");
      $("#body-terms2").css("display","block");
    }); 
        $("document").ready(function(){
            var wid=$("#myButton2").width()+40;
            $("#myButton1").css("width",wid+"px");
            console.log(wid);
        });
    $("document").ready(function(){
  var wid=$("#myButton2").width()+40;
  $("#myButton1").css("width",wid+"px");
            
  $("#instrument2").change(function(){
        console.log($("#instrument2").val());
    $("#instrument2 option").each(function(){
     var aa=parseInt($(this).attr("value"));
     var bb=parseInt($("#instrument2").val());
     console.log("aa: "+aa+"bb: "+bb);
     if(aa<=bb){
       $("#member"+aa).css("display","block");
     }
     else
      $("#member"+aa).css("display","none");
    
      $("#member1").css("display","block");
    });       
  }); 
});
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
    $.backstretch("assets/img/backgrounds/1.png");
    
    /*
	    Modals
	*/
	$('.launch-modal').on('click', function(e){
		e.preventDefault();
		$( '#' + $(this).data('modal-id') ).modal();
	});
    
    /*
        Form validation
    */
   /* $('.registration-form input[type="text"], .registration-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
   $('.registration-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });*/
                    
    
});
        function validate(){
                    var email = $("#email").val();
                    var url = $("#url").val();
                    var instrument= $("#instrument").val();
					var name = $("#name").val();
					if (!validateName || (name=='')){
						event.preventDefault(); 
                                  //alert('Please select the Karaoke/Instrument');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please enter a valid name"
                                    });
                                  return;
					}
                    if (instrument!='karaoke' && instrument!='instrument'){
                                  event.preventDefault(); 
                                  //alert('Please select the Karaoke/Instrument');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please select the Karaoke/Instrument"
                                    });
                                  return;
                            }
                   if(!validateEmail(email)) {   
                   event.preventDefault(); 
                   //alert('please enter the valid email address');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please enter a valid email"
                                    });
                   return;
                   }
                    if(!validateUrl(url) || url=='') {   
                        event.preventDefault(); 
                        //alert('please enter the valid url');
                        Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                        {
                            msg: "Please enter valid URL of your demo recording"
                        });
                        return;
                 }                 
        }
        function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
        
        }
        
        function validateUrl($url) {
        var urlReg = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i;
        return urlReg.test($url);
        }
		function validateName($name){
			var nameReg = /^[a-zA-Z ]*$/;
			return nameReg.test($name);
		}



        function validate2(){
                    var email = $("#email2").val();
                    var url = $("#weblink2").val();
                    var instrument= $("#instrument2").val();
					var band_name = $("#band_name").val();
					if (band_name==''){
						event.preventDefault(); 
                                  //alert('Please select the Karaoke/Instrument');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please enter a band name"
                                    });
                                  return;
					}
                    if (instrument!='2' && instrument!='3' && instrument!='4'){
                                  event.preventDefault(); 
                                  //alert('Please select the Karaoke/Instrument');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please select number of members"
                                    });
                                  return;
                            }
                   if(!validateEmail(email)) {   
                   event.preventDefault(); 
                   //alert('please enter the valid email address');
                                    Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                    {
                                        msg: "Please enter a valid email"
                                    });
                   return;
                   }
                    if(!validateUrl(url) || url=='') {   
                        event.preventDefault(); 
                        //alert('please enter the valid url');
                        Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                        {
                            msg: "Please enter valid URL of your demo recording"
                        });
                        return;
                 }                 
        }