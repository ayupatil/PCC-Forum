<?php
$conn = mysqli_connect('localhost', 'root', '', 'myforum');
extract($_POST);

$uid = $_SESSION['uid'];


$dislike_sql = "SELECT COUNT(*) FROM  rating_info WHERE uid = '$uid' and qid = '$qid' and rating_action = 2 ";
$result1 =mysqli_query($conn, $dislike_sql); 
$dislike_count=count($result1);

$like_sql = "SELECT COUNT(*) FROM  rating_info WHERE uid = '$uid' and qid = '$qid' and rating_action = 1 ";
$result2 = mysqli_query($conn, $like_sql);  
$like_count = count($result2);

if($act == '1'): //if the user click on "like"
	if(($like_count == 0) && ($dislike_count == 0)){
		$query1 = "INSERT INTO rating_info (uid, qid, rating_action)
											VALUES('$uid','qid', '1')";
				mysqli_query($conn, $query1);
	}
	if($dislike_count == 1){
		$query2 = "UPDATE rating_info SET rating_action = 1 WHERE qid = '$qid' and uid ='$uid'";
		mysqli_query($conn, $query2);
	}
endif;

if($act == '2'): //if the user click on "like"
	if(($like_count == 0) && ($dislike_count == 0)){
		$query3 = "INSERT INTO rating_info (uid, qid, rating_action ) 
											VALUES('$uid', 'qid', '2')";
							mysqli_query($conn, $query3);	
	}
	if($like_count == 1){
		$query4 = "UPDATE rating_info SET rating_action = 2 WHERE qid = '$qid' and uid ='$uid'";
		mysqli_query($conn, $query4);
	}
endif;
?>

?>