<?php 

session_start();

	$sid;
	$sname="";
	$results=array();
	$json_array = array();

$conn = mysqli_connect('localhost', 'root', '', 'myforum');
	$JSON = "{";
    if(isset($_POST) && sizeof($_POST)){
        $value = $_POST['value'];
       $query1= "SELECT sid,subname FROM sub_categories WHERE cid='$value'";

$results= mysqli_query($conn,$query1);


	if (mysqli_num_rows($results)) {
	
	 while($row=$results->fetch_assoc()){
	
	 
	$json_array[] = $row;
	}
}
    }
	echo json_encode($json_array);
	

?>