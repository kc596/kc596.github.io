<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="favicon.png">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="load.css">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<meta name="author" content="KUNAL CHAUDHARY, SATYAM SWARNKAR">
<meta name="keywords" content="incandescence nit silchar profile picture, incand dp, incandescence filter">
<meta property="og:url" content="http://incandescence.co.in/incand-dp/"/>
<meta property="og:title" content="Incandescence - Vintage Affair"/>
<meta property="og:type" content="website"/><meta property="og:image" content="http://incandescence.co.in/images/sunburn.png"/>
<meta property="og:description" content="Get your own Incandescence dp and promote the scintillant festival."/>
<title>Incandescence | NIT Silchar</title>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
html{
	height:100%;
}
body{
    background: -webkit-linear-gradient(#212731, #23293C, #212731);
    background: -moz-linear-gradient(#212731, #23293C, #212731);
    background: -ms-linear-gradient(#212731, #23293C, #212731);
    background: linear-gradient(#212731, #23293C, #212731);
    position:relative;
    height:100%;
}

a:link{
	color:#ffa413;
	text-decoration:none;
}
a:visited{
	color:#ffa413;
	text-decoration:none;
}
a:hover{
	color:yellow;
	text-decoration:none;
}
a:active{
	color:#ffa413;
	text-decoration:none;
}
.instructions{
	text-align:justify;
	color:#efefef;
	font-size:1.1em;
	line-height:2em;
	font-family:Roboto;
}
</style>

</head>
   <body>
      <?php if (isset($_SESSION[ 'name'])){?>
      
      <div class="col-md-12" style="background:transparent;">
      	<center><a href="http://incandescence.co.in/"><img src="logo.png" style="max-height:150px;"></a></center>
      </div>
      <hr style="display:block; width:100%; border-color:transparent;">
      <div id="baapkabaap" class="" style="text-align:center;">
      	<div id="load">
	  <div>G</div>
	  <div>N</div>
	  <div>I</div>
	  <div>D</div>
	  <div>A</div>
	  <div>O</div>
	  <div>L</div>
	</div>
      </div>
      		<div id="baap" class="container" style="display:none;">
      			<div class="col-md-6 " style="">
			<center>
		    		  <a href="#" id="download"><canvas id="myCanvas" style="border:1px solid #d3d3d3;">
		        	 	Your browser does not support the HTML5 canvas tag. Please update your browser.
		     		 </canvas>
		     		 </a>		      
		     	 </center>
		     	</div>
			  <div class="col-md-6 " style="">
			  		<hr style="display:block;">
			  		<h3 style="color:#efefef;"><i>Instructions:-</i></h3>
			  		<hr style="display:block;">
			  		<ul type="square" class="instructions">
			  		
			  		<li>Click on the image to download it.</li>
			  		<li>As facebook doesn&#39;t allow any app to change profile-picture directly without special permissions, you have to manually change your profile picture. </li>
			  		<li>Please share the link <span style="color:#ffa413;">http://incandescence.co.in/incand-dp/</span></li>
			  		</ul>
			 	 <hr style="display:block; border-color:transparent;">
			 	 <p style="font-size:0.9em; color:#dedede; text-align:center;">
			 	 	<i>Developed by</i> <a href="http://facebook.com/zyloc.0/" target="_blank">Satyam&nbsp;Swarnkar</a> <i>and</i> <a href="http://facebook.com/chaudhary.kc.kunal/" target="_blank">Kunal&nbsp;Chaudhary</a>
			 	 </p>
		   	 </div>
			 
		  </div>
		  <hr style="border-color:transparent; clear:both; width:100%;">
 
	     
     
      <script>
      $("document").ready(function(){     
    	    var c = document.getElementById("myCanvas");
             c.width = '500';
             c.height = '500';
             var ctx = c.getContext("2d");
             var image = new Image();
             var filter = new Image();
             image.setAttribute('crossOrigin', 'anonymous');
             filter.setAttribute('crossOrigin', 'anonymous');
             image.width = '500';
             image.height = '500';
             filter.src = 'filter.png';
             filter.onload=function(){
             image.src = "https://graph.facebook.com/<?php echo $_SESSION['id']; ?>/picture?width=600&height=600";     
             //image.src="https://graph.facebook.com//picture?width=600&height=600"; 
             image.onload = function() {
                 ctx.drawImage(image, 0, 0, image.width, image.height);
                 ctx.drawImage(filter, 0, 0, image.width, image.height);
                 $("#baapkabaap").hide();
	         $("#baap").css("display","block");

             }
             }
      });
         /*window.onload = function() {
         	$("#baapkabaap").css("display","none");
         	$("#baap").css("display","block");
         }*/
         
         function downloadCanvas(link, canvasId, filename) {
             link.href = document.getElementById(canvasId).toDataURL();
             link.download = filename;
         }
         
         /** 
          * The event handler for the link's onclick event. We give THIS as a
          * parameter (=the link element), ID of the canvas and a filename.
          */
         document.getElementById('download').addEventListener('click', function() {
             downloadCanvas(this, 'myCanvas', 'incand.png');
         }, false);
         
		 // triggering login button
		
      </script>
      <?php } if(!isset($_SESSION[ 'name'])){?>
      <script TYPE="text/javascript" src="fb.js"></script>
     
      <div class="container">
      		<div class="col-md-12" style="background:transparent;">
      		<center><a href="http://incandescence.co.in/"><img src="logo.png" style="max-height:150px;"></a></center>
      		</div>
      		<hr style="width:100%; clear:both; display:block; border-color:transparent;">
      		<div class="container" style="color:#efefef; text-align:center;"><h2>Login with facebook to continue...</h2></div>
      		<center><div id="" class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();">  </center>
      			</div>
      </div>
      <?php } ?>
      <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-73011493-1', 'auto');
  ga('send', 'pageview');

</script>
   </body>
</html>