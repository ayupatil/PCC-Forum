<?php
session_start();
$cnt=0;

$conn = mysqli_connect('localhost', 'root', '', 'myforum');
$qid = $_GET['qid'];
$aid = $_GET['aid'];
$val = $_GET['val'];

if($val==1){
	$query1="SELECT no_of_upvote FROM answers where aid='$aid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_upvote"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE answers
         SET no_of_upvote='$cnt'
		 WHERE aid='$aid'";
								

								
								
	mysqli_query($conn, $query);

}

if($val==2){
	$query1="SELECT no_of_downvote FROM answers where aid='$aid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_downvote"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE answers
         SET no_of_downvote='$cnt'
		 WHERE aid='$aid'";
								

								
								
	mysqli_query($conn, $query);

}

if($val==3){
	$query1="SELECT no_of_report FROM answers where aid='$aid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$cnt= trim($row["no_of_report"]);
	
	}
}

$cnt=$cnt+1;
$query=  "UPDATE answers
         SET no_of_report='$cnt'
		 WHERE aid='$aid'";
								

								
								
	mysqli_query($conn, $query);

}

if($query){
  	header('location: home.php?qid='.$qid);
    exit;
	}


?>