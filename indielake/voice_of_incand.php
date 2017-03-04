<?php
ob_start();
error_reporting(0);
?>
<?php
if(!isset($_POST['submit'])) header('Location: events.html');

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $contactErr = $instrumentErr ="";
$name = $email = $gender = $address = $weblink = $contact = $instrument = $accomodation = ""  ;
$flag = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag = 0;
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
	 $flag = 1;
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed in Name"; 
	   $flag = 1;
     }
   }
	 echo $nameErr;
   if (empty($_POST["contact"])) {
     $contactErr = "Plese fill the contact no.";
	 $flag = 1;
   } else {
     $contact = test_input($_POST["contact"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[-]?[0-9,]+$/",$contact)) {
       $contactErr = "Only numbers are allowed in contact number"; 
	   $flag = 1;
     }
   }
     //echo $contactErr;
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
	 $flag = 1;
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format";
       $flag = 1; 	   
     }
   }
   //echo $emailErr;
     
   if (empty($_POST["weblink"])) {
     $weblinkErr = "Please enter the link of recording.";
	 $flag = 1;
   } else {
     $weblink = test_input($_POST["weblink"]);
     // check if URL address syntax is valid
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$weblink)) {
       $websiteErr = "Invalid URL of demo recording";
       $flag = 1;	   
     } 
   }
   echo $websiteErr;
   if (empty($_POST["address"])) {
     $address = "";
   } else {
     $address = test_input($_POST["address"]);
   }
   if (empty($_POST["instrument"])) {
     $instrumentErr = "Please select your instrument";
	 $flag = 1;
   } else {
     $instrument = test_input($_POST["instrument"]);
   }
   echo $instrumentErr;
   if  ($flag==0){
       $host = "localhost";
	   $username = "database-indie";
	   $password = "Indielake@1";
	   $database = "indie_lake";
	   $conn = mysqli_connect($host,$username,$password,$database);
     if(!$conn){
      $flag=1;
     }
 	// Testing connection
		if(mysqli_connect_errno())
			{
			die("Connection to database failed:".mysqli_connect_error()."(".mysqli_connect_errno().")");
			}    
 
	   $query = "INSERT INTO voice_of_incand(name,instrument,address,accomodation,link,phone_no,email) VALUES ('".$name."','".$instrument."','".$address."',".$_POST['accomodation'].",'".$weblink."','".$contact."','".$email."')";
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
  $error_Message=$nameErr." ".$emailErr." ".$genderErr." ".$websiteErr." ".$contactErr." ".$instrumentErr;
?>
  <h1><strong>Sorry!</strong><br>Submission failed. Try again!</h1>
                              <div class="description" style="color:#dedede;">
                              <p>
                                <?php
                                  echo "Error Message: ".$error_Message."<br/>";
                                ?>
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