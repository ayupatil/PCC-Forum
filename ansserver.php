<?php
session_start();
$answer="";	
$username="";
$uid;
$fname="";
	

$conn = mysqli_connect('localhost', 'root', '', 'myforum');

if (isset($_POST['answer'])) {
$answer = mysqli_real_escape_string($conn, $_POST['answer']);




$uid=$_SESSION['uid'];
$qid = $_GET['qid']; 
$t=mktime(date('h')+5,date('i')+30,date('sa'));
$time=date("y-m-d h:i:sa",$t);

	
$query= "INSERT INTO answers (uid, qid, ans,time)
								VALUES('$uid', '$qid', '$answer','$time')";
								

								
								
	mysqli_query($conn, $query);
	
	if($query){
  	header('location: answer.php?qid='.$qid);
    exit;
	}
}

?>