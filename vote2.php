<?php
session_start();
$cnt=0;

$conn = mysqli_connect('localhost', 'root', '', 'myforum');
$qid = $_GET['qid'];
$val = $_GET['val'];

if($val==1){
	$query1="SELECT no_of_upvote FROM questions where qid='$qid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_upvote"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE questions
         SET no_of_upvote='$cnt'
		 WHERE qid='$qid'";
								

								
								
	mysqli_query($conn, $query);

}

if($val==2){
	$query1="SELECT no_of_downvote FROM questions where qid='$qid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_downvote"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE questions
         SET no_of_downvote='$cnt'
		 WHERE qid='$qid'";
								

								
								
	mysqli_query($conn, $query);

}

if($val==3){
	$query1="SELECT no_of_report FROM questions where qid='$qid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_report"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE questions
         SET no_of_report='$cnt'
		 WHERE qid='$qid'";
								

								
								
	mysqli_query($conn, $query);

}

if($query){
  	header('location: home.php');
    exit;
	}


?>