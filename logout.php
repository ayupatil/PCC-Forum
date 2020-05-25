<?php

$conn = mysqli_connect('localhost', 'root', '', 'myforum');

if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['firstname']);
	unset($_SESSION['uid']);
  	header("location: index.php");
  }
?>