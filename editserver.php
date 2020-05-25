<?php
session_start();
$_SESSION['msg']="";


$conn = mysqli_connect('localhost', 'root', '', 'myforum');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$fname = $conn->real_escape_string($_POST['fname']);
		$lname = $conn->real_escape_string($_POST['lname']);
		$email = $conn->real_escape_string($_POST['email']);
		$phone = $conn->real_escape_string($_POST['phone']);
		$dob = $conn->real_escape_string($_POST['dob']);
		$dp_path = $conn->real_escape_string($_FILES['dp']['name']);

		$tmp_file = $_FILES['dp']['tmp_name'];
		$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
	  
	  if(in_array($file_ext,$expensions)=== false){
        $msg="choose image format only";
		echo "<script type='text/javascript'> alert('$msg1');</script>";
      }
		move_uploaded_file($tmp_file, $dp_path);
		
		//if(preg_match("!image!", $_FILES['dp']['type'])){
					
		//	if(copy($_FILES['dp']['tmp_name'], $dp_path)){
				
				$_SESSION['firstname'] = $fname;
				$_SESSION['dp_path'] = $dp_path;
				$uid = $_SESSION['uid'];
				echo $uid;
				
				$query = "UPDATE user SET firstname='$fname', lastname='$lname', email='$email', phone='$phone', dob='$dob', dp='$dp_path' WHERE uid=$uid";
				mysqli_query($conn,$query);
				
				if($query){
					header('location:edit.php');
					exit;	
				//}
			//}
		}
}
?>