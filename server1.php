<?php
session_start();



$conn = mysqli_connect('localhost', 'root', '', 'myforum');

if (isset($_POST['username'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
if (isset($_POST['password'])) {
  $password = mysqli_real_escape_string($conn, $_POST['password']);


  
$qid = $_GET['qid']; 
$val = $_GET['val']; 

$password=md5($password);

$query="SELECT * from user where username='$username' AND password='$password'";
$results = mysqli_query($conn, $query);
	if (mysqli_num_rows($results) == 1) {
  	 
	  while($row=$results->fetch_assoc()){
		  $bit=trim($row["adbit"]);
		  $_SESSION['adbit'] = $bit;
		  $active=trim($row["active"]);
		   $uid=trim($row["uid"]);
		  $_SESSION['uid'] = $uid;
		$firstname=trim($row["firstname"]);
		$_SESSION['firstname'] = $firstname;
		  
	  }
	
	
	
	
	if($active==0){
		
		$message= 'Your account is not verified';
			 echo "<script type='text/javascript'> alert('$message');</script>";
			 
			 echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
			
	}
	else{

  	  
	 // if($bit==1){
		  header('location:index.php');
		  
	  //} else{
	  
	 if($val==10){
		  
	header('location: answer.php?qid='.$qid);
	}
	 if($val==11){
  	
header('location: index.php');
//}
	   
	 
}
	}
	
	  }else {
			 $message= 'Invalid username or password';
			 echo "<script type='text/javascript'> alert('$message');</script>";
			 
			 echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
			 
		}
  
}}


?>