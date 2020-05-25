<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'myforum');

$sql="UPDATE answers SET answer_status=1 WHERE answer_status=0";	
$result=mysqli_query($conn, $sql);

$sql="SELECT * FROM answers ORDER BY aid DESC limit 5";
$result=mysqli_query($conn, $sql);

$response='';
while($row=mysqli_fetch_array($result)) {
	$response = $response . "<div>" .
	"<div>". $row["ans"] . "</div>" . 
	"</div>";
}
if(!empty($response)) {
	print $response;
}
?>