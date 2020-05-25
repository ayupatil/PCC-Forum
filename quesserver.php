<?php
session_start();
$question="";	
$description="";
$username="";
$uid;
$fname="";
$sid;	

$conn = mysqli_connect('localhost', 'root', '', 'myforum');

if (isset($_POST['qu'])) {
$sid = mysqli_real_escape_string($conn, $_POST['sid']);

if (isset($_POST['question'])) {
$question = mysqli_real_escape_string($conn, $_POST['question']);


if (isset($_POST['description'])) {
$description = mysqli_real_escape_string($conn, $_POST['description']);


$firstname=$_SESSION['firstname'];


	$query1= "SELECT uid FROM user WHERE firstname='$firstname'";

$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$_SESSION["uid"]= trim($row["uid"]);
	$uid=$_SESSION['uid'];
	}
}
else{echo "0 results";}
$t=mktime(date('h')+5,date('i')+30,date('sa'));
$time=date("y-m-d h:i:sa",$t);
$query= "INSERT INTO questions (uid, ques, description,time,sid)
								VALUES('$uid', '$question', '$description','$time','$sid')";
								

								
								
	mysqli_query($conn, $query);
	
	if($query){
  	header('location: index.php');
    exit;
	}
}}}

?>