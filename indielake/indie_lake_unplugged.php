<?php
ob_start();
error_reporting(0);
?>
<?php
if(!isset($_POST['submit'])) header('Location: events.html');

   $band_name = $no_of_members = $member_one = $member_two = $member_three = $member_four = $address = $accomodation = $url = $contact = $email = ""; 
   $flag=1;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $flag=0;
		  $band_name = test_input($_POST['bandname']);
		  $no_of_members = $_POST['instrument2'];
		  $member_one = $_POST['member1'];
		  $member_two = $_POST['member2'];
		  $member_three = $_POST['member3'];
		  $member_four = $_POST['member4'];
		  $address = $_POST['address'];
		  $accomodation = $_POST['accomodation'];
		  $url = $_POST['weblink'];
		  $contact = $_POST['contact'];
		  $email = $_POST['email'];
		 // echo $band_name." ".$no_of_members." ".$member_one." ".$address." ".$accomodation." ".$url." ".$contact." ".$email;
		  
		if (empty($band_name)){
			$flag=1;
			
		}
		
       if (!is_numeric($no_of_members)){
		   $flag=1;
		   	
	   }
       $member_one = test_input($_POST['member1']);   	   
       $member_two = test_input($_POST['member2']);   	   
       $member_three = test_input($_POST['member3']);
       $member_four = test_input($_POST['member4']);
   	   $address = test_input($_POST['address']);
	   if (empty($address)){
		   $flag=1;
		  
	   }
	    if (empty($email)) {
			$flag = 1;
				
		} 
		else {
			$email = test_input($email);
				// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$flag = 1; 	   
						
				}
		}
     if (!is_numeric($accomodation)){
		 $flag=1;
		 	
	 }
	 if (empty($url)) {
	 $flag = 1;
	 	
	}
	else {
		$url = test_input($url);
		// check if URL address syntax is valid
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
			$flag = 1;	   
				
		} 
		}
   if (empty($contact)) {
	   $flag = 1;
	   
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[-]?[0-9,]+$/",$contact)) {
		 $flag = 1;
		 	
     }
   }
   //echo $flag;	
    if ($flag==0){
	      $host = "localhost";
	   $username = "database-indie";
	   $password = "Indielake@1";
	   $database = "indie_lake";
	   $conn = mysqli_connect($host,$username,$password,$database);
	   $query = "INSERT INTO indie_lake_unplugged(band_name,no_of_members,member_one,member_two,member_three,member_four,address,accomodation,url,contact,email) VALUES ('".$band_name."',".$no_of_members.",'".$member_one."','".$member_two."','".$member_three."','".$member_four."','".$address."','".$accomodation."','".$url."','".$contact."','".$email."')";	  
	   mysqli_query($conn,$query);
	   mysqli_close($conn);	
	}
	
   }		   
  
   
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<!doctype html>
<html>
<head>
  <title>Indie Lake Registration</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background:url('assets/img/backgrounds/1.png');">
      <div class="">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                          <a class="logo" href="index.html" style="height:200px;"></a>
                            
<?php
if($flag==0){//welcome?>
    <h1><strong>Thank you!</strong><br>Submisssion Successful.</h1>
                                <div class="description" style="color:#dedede;">
                              <p>
                                
                                </center><img src="assets/img/redirect.gif" width=120 height=100></center><br/>
                                If you are not automatically redirected , click <a href="events.html">here</a>
                              </p>
                            </div>
<?php
header('Refresh:4; URL=events.html');
}
else if($flag==1){//error
 
?>
  <h1><strong>Sorry!</strong><br>Submission failed. Try again!</h1>
                              <div class="description" style="color:#dedede;">
                              <p>
                              	<h4>Possible Reason : Invalid contact number.</h4><br>
                              <a href="events.html">Go Back</a>
                              </p>
                            </div>
<?php
}
?>

                        </div>
                    </div>
                </div>
            </div>
            
      </div>
</body>
</html>
<?php
ob_end_flush();
?>