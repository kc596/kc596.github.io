<?php 

$name = $email = $heading_story = $story = $image = " ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $heading_story = $_POST['heading_story'];
   $story = $_POST['story'];
   $flag = 0;
   if (empty($name)){
	   $flag = 1;
   }
   else{
	   $name = test_input($name);
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$flag = 1;
		}
	}
	if (empty($email)) {
     $flag = 1;
   } else {
     $email = test_input($email);
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $flag = 1; 	   
     }
   }
   $heading_story = test_input($heading_story);
   $story = test_input($story);
   $story = $textToStore = nl2br(htmlentities($story, ENT_QUOTES, 'UTF-8'));
   //$flag=imageUpload();
   //image uploading start
   
   $target_dir = "images/uploads/";
				$file_name_extension = $_FILES["fileToUpload"]["name"];
				$filename = explode(".", $file_name_extension);
				$filename = end($filename);
				$_FILES["fileToUpload"]["name"] = "indie".time().".".$filename;
				$name_file = $_FILES["fileToUpload"]["name"];
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

			
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						//echo "File is an image - " . $check["mime"] . ".";
						
					} else {
						//echo "File is not an image.";
						$flag = 1;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					//echo "Sorry, file already exists.";
					$flag = 1;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 1048580) {
					//echo "Sorry, your file is too large.";
					$flag = 1;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$flag = 1;
				}
				// Check if $flag is set to 0 by an error
				if ($flag == 1) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					  //  echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
					   // echo "Sorry, there was an error uploading your file.";
					}
				}
   
   //image uploading ends
   
   if ($flag==0){
	   $host = "localhost";
	   $username = "database-indie";
	   $password = "Indielake@1";
	   $database = "indie_lake";
	   $conn = mysqli_connect($host,$username,$password,$database);
	   $query = "INSERT INTO stories(name,email,heading_story,story,image) VALUES ('".$name."','".$email."','".$heading_story."','".$story."','".$name_file."')";
	   mysqli_query($conn,$query);
	   mysqli_close($conn);
	   header('Location: stories.php?FORM_VALID=1');
   }
   else{
	   header('Location: stories.php?FORM_VALID=0');
   }
   
  }


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function imageUpload(){
				
				return $flag;
}
?>



























