<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<style>
body{
    background: -webkit-linear-gradient(#111,#394B67);
    background: -moz-linear-gradient(#111,#394B67);
    background: -ms-linear-gradient(#111,#394B67);
    background: linear-gradient(#111,#394B67);
    
}
</style>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
   <body>
      <?php if (isset($_SESSION[ 'name'])){?>
	  <div class="col-md-6 " style="margin-top: 5%;">
      <canvas id="myCanvas" style="border:1px solid #d3d3d3;">
         Your browser does not support the HTML5 canvas tag.
      </canvas>
      <br>
      <div class="col-sm-offset-3" style="margin-bottom:10%; margin-top: 2%;"><a href="#" id="download"><button type="button" class="btn btn-warning">Download</button> </a> </div>
     </div>
	<div class="col-md-6 " style="margin-top: 5%;">
      <canvas id="myCanvas2" style="border:1px solid #d3d3d3;">
         Your browser does not support the HTML5 canvas tag.
      </canvas>
      <br>
      <div class="col-sm-offset-3" style="margin-bottom:10%; margin-top: 2%;"><a href="#" id="download2"><button type="button" class="btn btn-warning">Download</button> </a> </div>
     </div>
      <script>
         window.onload = function() {
             var c = document.getElementById("myCanvas");
             var c2 = document.getElementById("myCanvas2");
             c.width = '500';
             c.height = '500';
			 c2.width = '500';
             c2.height = '500';
             var ctx = c.getContext("2d");
             var ctx2 = c2.getContext("2d");
             var image = new Image();
             var filter = new Image();
             var filter2 = new Image();
             image.setAttribute('crossOrigin', 'anonymous');
             filter.setAttribute('crossOrigin', 'anonymous');
             filter2.setAttribute('crossOrigin', 'anonymous');
             image.width = '500';
             image.height = '500';
             image.src = "https://graph.facebook.com/<?php echo $_SESSION['id']; ?>/picture?width=600&height=600";
             filter.src = 'filter.png';
             filter2.src = 'filter2.png';
             image.onload = function() {
                 ctx.drawImage(image, 0, 0, image.width, image.height);
                 ctx.drawImage(filter, 0, 0, image.width, image.height);
                 ctx2.drawImage(image, 0, 0, image.width, image.height);
				 ctx2.drawImage(filter2, 0, 0, image.width, image.height);
             }
         
         }
         
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
          document.getElementById('download2').addEventListener('click', function() {
             downloadCanvas(this, 'myCanvas2', 'incand.png');
         }, false);
		 // triggering login button
		
      </script>
      <?php } if(!isset($_SESSION[ 'name'])){?>
      <script TYPE="text/javascript" src="fb.js"></script>
     
      <div id="login-kela" class="fb-login-button" data-scope="public_profile,email" onlogin="checkLoginState();">  
      </div>
      <?php } ?>
   </body>
</html>