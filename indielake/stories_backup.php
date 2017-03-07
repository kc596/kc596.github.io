<!DOCTYPE html>
<html lang="en">
<head>
  <title>Indie Lake | Stories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="KUNAL CHAUDHARY, SATYAM SWARNKAR">
	<meta name="keywords" content="indie lake stories">
	
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/Lobibox.min.css"/>
	<link rel="stylesheet" href="css/form-elements1.css">
	<link rel="stylesheet" href="css/style-form.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="images/favi.png">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <style>
	h3.quote>a:link{
		color:#337ab7;
	}
	h3.quote>a:visited{
		color:#337ab7;
	}
	h3.quote>a:hover{
		color:#337ab7;
	}
	h3.quote>a:active{
		color:#337ab7;
	}
  </style>
</head>
<body>
     <nav class="navbar navbar-default originalnavigation" role="navigation">
        <div class="" style=" margin-left:2.6%; margin-right:2.6%;">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" id="navbutton">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav">
						<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
						<li>
							<a href="./">HOME</a>
						</li>
						<li>
							<a href="about">ABOUT</a>
						</li>
						<li>
							<a href="events">EVENTS</a>
						</li>
						<li>
							<a href="stories.php">STORIES</a>
						</li>
						<li>
							<a href="gallery">GALLERY</a>
						</li>
						<li>
							<a href="contact-us">CONTACT US</a>
						</li>
					</ul>
			</div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	
	<div class="row mynavigation" style="margin:0;">
			<div class="col-xs-1 cloud">
				<img class="img-responsive" src="images/home.png">
				<div class="text" style="left: 34%; bottom: 16%;"><a href="./#indie">home</a> </div>
			</div>
			<div class="col-xs-1 cloud"> 
				<img class="img-responsive" src="images/about.png">
				<div class="text" style="left: 34%; bottom: 24%;"> <a href="about">about </a></div>
			</div>
			<div class="col-xs-1 cloud"> 
				<img class="img-responsive" src="images/events.png">
				<div class="text" style="left: 31%; bottom: 15%;"> <a href="events">events</a> </div>
			</div>
			<div class="col-xs-2 mylogoimage"> 
				<center><img class="img-responsive" src="images/indie-lake.png" id="logoimage"></center>  
			</div>
			<div class="col-xs-1 cloud"> 
				<img class="img-responsive" src="images/stories.png">  
				<div class="text" style="left: 31%; bottom: 15%;"><a href="stories.php?id=0"> stories </a></div>
			</div>
			<div class="col-xs-1 cloud"> 
				<img class="img-responsive" src="images/gallery.png"> 
				<div class="text" style="left: 31%; bottom: 15%;"><a href="gallery"> gallery </a></div>
			</div>
			<div class="col-xs-1 cloud"> 
				<img class="img-responsive" src="images/contact-us.png"> 
				<div class="text" style="left: 23%; bottom: 15%;"> <a href="contact-us">contact-us</a> </div>
			</div>
		</div>

<div class="col-md-12" role="main" style="margin-top: 40px;"> 
	<div class="col-md-8"> 
					 <?php	
					      $host = "localhost";
	   $username = "database-indie";
	   $password = "Indielake@1";
	   $database = "indie_lake";
						   $count_templates = 0;
						   $conn = mysqli_connect($host,$username,$password,$database);
						   if (!$conn){
							   
						   }
						   
						   
							$row_count = mysqli_query($conn,"select count(id) as num_rows from stories WHERE publish=1" );
							$total_row = mysqli_fetch_array($row_count);
							$total = $total_row['num_rows'];
							
						   if (!isset($_GET['id']) or !ctype_digit($_GET['id'])){
							   $start_id = 0;
						   }
						   else{
							   $start_id = $_GET['id'];
						   }
						  if ($start_id>=$total){
							  header('Location: stories.php?id=0');
						  }
						   $story_query = mysqli_query($conn,"SELECT * FROM stories  WHERE publish=1 Limit ".$start_id.",3") or die('sorry'	);
						 while(($row = mysqli_fetch_assoc($story_query))){
						          $story_id  = $row['id'];
								  $name = $row['name'];
								  $heading_story = $row['heading_story'];
								  $story = $row['story'];
								  $image = $row['image'];
								  $count_templates++;
							?>	  
						   
  		<div class="col-md-12" style="padding:0;">
  			<div class="mdl-card amazing mdl-cell mdl-cell--11-col" style="margin-left:auto; margin-right:auto;">
            	<div class="mdl-card__title mdl-color-text--grey-50">
              		<h3 class="quote"><a href="#" class=" launch-modal" style="font-family:SquadaOne-Regular;" href="#" data-modal-id="<?php echo $story_id;?>" > <?php echo $heading_story; ?></a></h3>
            	</div>
           		<div class="mdl-card__supporting-text mdl-color-text--grey-600" style="width:100%; text-align:justify;">
              					<?php echo substr($story,0,333)." ...";?>
            	</div>
           		<div class="mdl-card__supporting-text meta mdl-color-text--grey-600" style="width:100%;">
              		<div class="minilogo"></div>
              		<div style="text-align: right;">
              			  <strong> by <?php echo $name;?></strong>
              		</div>
           		</div>
   			</div>
  		</div>
  		<div id="<?php echo $story_id;?>" class="modal fade" role="dialog" style="">
  			<div class="modal-dialog" style="width:90%; max-width:720px; overflow:none;">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title" style="color:#0082B5;"><?php echo $heading_story;?></h4>
			      </div>
			      <div class="modal-body">
				  <center><img style="max-height:400px; max-width:90%;" src="images/uploads/<?php echo $image;?>"></center>
				  <br>
			        <p style="font-family:Lato; text-align:justify;"><?php echo $story;?></p>
					<br>
					<p style="font-family:Lato; text-align:right;"> by <?php echo $name; ?>
			      </div>
			      <div class="modal-footer">
			        
			      </div>
			    </div>

  			</div>
		</div>

		<?php 
		}
		?>   
		<div class="col-md-12">
			<div class="mdl-cell mdl-cell--11-col" style="margin-left:auto; margin-right:auto; margin-top:0;">
				<div style="float:left;">
						<?php 
						$prev=$start_id-3;
						$next=$start_id+3;
						$showing_to = $start_id + $count_templates; 
						?>
						<span style="margin-top:0; line-height:2em; color:white; font-size:1.2em;">Showing <i style="color:#000"> <?php echo ($start_id+1)." - ".$showing_to."</i> of ".$total;?> </span>
				</div>
				<div style="float:right;">
						<?php
						if ($start_id!=0){
							
							?>
								<a href="stories.php?id=<?php echo $prev;?>" style="text-decoration: none; color: #000000;">
								<i class="fa fa-arrow-circle-left" style="font-size:48px;text-align: right"></i>          	
								</a>
						<?php
						}
						if (($total>($start_id+$count_templates))){
						?>	

								<a href="stories.php?id=<?php echo $next;?>" style="text-decoration: none; color: #000000;">
								<i class="fa fa-arrow-circle-right" style="font-size:48px;text-align: right"></i>          	
								</a>
							</center>
						<?php
						}
						?>
				</div>
				<hr style="width:100%; clear:both; border-top-color:transparent;">
			</div>
		</div>
	</div>
	<div class="col-md-4">
   		<div class="mdl-card amazing mdl-cell mdl-cell--12-col" style="margin-left:auto; margin-right:auto;">
   			<center><span style="display:block; color:#fff; background-color:#000;"><span style="font-family:Asfalto; font-size:2.5em; display:block; background:url('images/diag_pattern.png');">Submit your own story</span></span></center>
			<div class="mdl-card__supporting-text" style="font-family:cursive; font-size:1.2em;">
              Have your own story of Indie Lake or want to share something? Click below and publish.
            </div>
            <div class="col-md-12" style="margin-bottom:25px;">
                <center> <div class="top-big-link">
                            	<a class="btn btn-link-1 launch-modal" href="#" data-modal-id="modal-register">Submit Story</a>
                         </div>
                </center>
            </div>
    </div>
</div>


<!-- MODAL -->
        <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal">
        					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        				</button>
        				<h3 class="modal-title" id="modal-register-label">Submit you own story</h3>
        				<p>Please check the line breaks and spaces in your story content and submit it as you would like to display.</p>
        			</div>
        			
        			<div class="modal-body">
        				
	                    <form role="form" action="submit.php" method="post" class="registration-form" enctype="multipart/form-data">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="form-first-name">Name</label>
	                        	<input type="text" name="name" placeholder="Name..." class="form-first-name form-control" id="form-first-name">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-email">Email</label>
	                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
	                        </div>
							<div class="form-group">
	                        	<label class="sr-only" for="about">Heading of your story</label>
	                        	<input type="text" name="heading_story" placeholder="Heading of your story..." class="form-last-name form-control" id="form-last-name">
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="form-about-yourself">Your story</label>
	                        	<textarea name="story" placeholder="Your story..." 
	                        				class="form-about-yourself form-control" id="form-about-yourself"></textarea>
	                        </div>
	                        <span style="font-size:1.1em; margin-left:10px;">Upload Image</span>
							<div class="form-group">
							<label class="sr-only" for="upload-image">Upload Image </label>	
							<span class="btn btn-default btn-file">
								<input type="file" name="fileToUpload" id="fileToUpload" required>
							</span>
							</div>
	                        <button type="submit" class="btn">Submit</button>
	                    </form>
	                    
        			</div>
        			
        		</div>
        	</div>
        </div>
<!--/modal-->

 <!-- Modals for blog posts -->

<!-- Modal -->

<!--/modal-->
	<!--scripts-->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 <!--[if lt IE 10]>
            <script src="js/placeholder.js"></script>
        <![endif]-->
		<script src="js/Lobibox.min.js"></script>
      <!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
		<script src="js/messageboxes.min.js"></script>
      <!-- <script src="js/notifications.min.js"></script> -->
    <script src="js/scripts.js"></script>
<?php
	if(isset($_GET['FORM_VALID'])){
		if($_GET['FORM_VALID']==1){
			?>	<script>
					Lobibox.alert("success", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Thank You for submitting your story!"
                    });
				</script>
			<?php
		}
		else if($_GET['FORM_VALID']==0){
			?>
				<script>
					Lobibox.alert("error", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Submission error!"
                    });
				</script>
			<?php
		}
	}
?>
</body>
</html>