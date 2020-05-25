<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'myforum');
$qid = $_GET['qid'];
$aid = $_GET['aid'];
$val = $_GET['val'];
if($val==1){
$query=  "DELETE FROM answers
		 WHERE aid='$aid'";
								

								
								
	mysqli_query($conn, $query);

if($query){
  	header('location: answer.php?qid='.$qid);
    exit;
	}
}

if($val==2){

 if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
    
	$query=  "DELETE FROM answers
		 WHERE qid='$qid'";
									
	mysqli_query($conn, $query);
	
	$query1=  "DELETE FROM questions
		 WHERE qid='$qid'";
									
	mysqli_query($conn, $query1);
	
	if($query){
  	header('location: index.php');
    exit;
	}
	
 }
	else{
	$query2="SELECT aid FROM answers WHERE qid='$qid'";
$result2= mysqli_query($conn,$query2);

if ($result2->num_rows==0){
	    
	
		
	$query=  "DELETE FROM questions
		 WHERE qid='$qid'";
								

								
								
	mysqli_query($conn, $query);
	

if($query){
  	header('location: index.php');
    exit;
	}
	} else {
			 $message= 'You cannot delete this Question because it already has answers!!!';
			 echo "<script type='text/javascript'> alert('$message');</script>";
			
		}
	
	}
	
}
	
	

?>