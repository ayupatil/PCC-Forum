<?php
session_start();


$conn = mysqli_connect('localhost', 'id5095025_root', 'toortoor', 'id5095025_myforum');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

		  <link href="https://fonts.googleapis.com/css?family=Varela Round" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css?family=Amiko" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css?family=Hind Madurai" rel="stylesheet">


		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<meta charset="utf-8">

<title>Parvatibai Chowgule College Forum</title>


<style type="text/css">
.input-field label {
     color: #000;
   }
   
.input-field input[type=text]:focus + label {
     color: #ff9800 !important;
   }
   
.input-field input[type=textarea]:focus + label {
     color: #ff9800 !important;
   }
#btn{
	position:fixed;
    top:0;
	right:10;
	} 

.input-field input[type=text]:focus {
     border-bottom: 1px solid #ff9800 !important;
     box-shadow: 0 1px 0 0 #e65100 !important;
   }

.input-field input[type=textarea]:focus {
     border-bottom: 1px solid #ff9800 !important;
     box-shadow: 0 1px 0 0 #e65100 !important;
   }

   
.input-field .prefix.active {
     color: #ff9800;
   }



.fbody {
    display: flex;
    min-height: 1vh;
    flex-direction: column;
  }

  .fmain {
    flex: 1 0 auto;
  }

</style>

</head>

<body>


 
<!----------------------------------------------------------------Nav Bar--------------------------------------------------------------------------------------------------->
<div class="col s12 m12 l12 ">
 
<div class="navbar-fixed"> 
	
 <nav style="background-color:black; height:90px; border-bottom:4px solid #de0e0e;" class="z-depth-5 ">
    <div class="nav-wrapper">

      <span class="brand-logo hide-on-med-and-down" style=" font-family:'Amiko'; line-height:45px; padding-left:10px;">Parvatibai Chowgule College of Arts & Science <br> Question & Answer Forum</span>
    </div>

  </nav>
 
	
	 
 </div>
 </div>
  </div>

 <!----------------------------------------------------------------------------Form----------------------------------------------------------------------------------> 
  
  <div class="row">
<div class="col l1">
</div>
<div class="col s12 m12 l9">
<div class="z-depth-4" style="height:500px; margin-left:80px; padding-left:80px; padding-top:10px; padding-right:20px; ">
<h4>Verification</h4>
<div class="divider"></div>

<h6>To verify your account please enter the verification code provided in your email address.</h6>
<div class="row">
<form class="s12 m12 l12" method="post" action="setting.php?">
  


<div class="input-field col s12 m12 l6">
<input type="text" class="validate" required>
<label>Enter the Verification code</label>

<div style="text-align:center">
<button type="submit" class="btn black"  name="reg_user" id="reg">Register</button>  
</div>

  <?php 
    $uid = $_SESSION['uid']; 
    
if (isset($_POST['hash'])) {
  $hash1 = mysqli_real_escape_string($conn, $_POST['hash']);

$query="SELECT hash from user where uid='$uid'";
$results = mysqli_query($conn, $query);
	if (mysqli_num_rows($results) == 1) {
  	 
	  while($row=$results->fetch_assoc()){
		 $hash=trim($row["hash"]);
		  
	  }
	
	
	if($hash==$hash1){
	    $query = "UPDATE user SET active=1";
				mysqli_query($conn,$query);
				
				$query1 = "SELECT * FROM user WHERE uid='$uid";
  	$results = mysqli_query($conn, $query1);
  	if (mysqli_num_rows($results) == 1) {
  	 
	  while($row=$results->fetch_assoc()){
		  $uid=trim($row["uid"]);
		  $_SESSION['uid'] = $uid;
		$firstname=trim($row["firstname"]);
		$_SESSION['firstname'] = $firstname;
	  }
				
				if($query1){
					header('location:setting.php');
					exit;	
				
	}
	else{
			 $message= 'Invalid hash code!! Account could not be verified';
			 echo "<script type='text/javascript'> alert('$message');</script>";
			 exit;
		}
  
}}
	}

}

?>


</form>


</div>
</div>
</div>
</div>
</div>


<!--------------------------------------------------------------------------Footer-------------------------------------------------------------------------------------->
<footer class="page-footer fbody z-depth-4" style="background-color:#3A3938">
   <div class="container">
      <div class="row">
	    <div class="col l3">
	    </div>
      <div class="col s12 m12 l9">
		<div class="footer-copyright fmain" style="background-color:#232221">
            <div class="container">
            <p style="text-align:center;">© Made by<br>Collin Ayushi Mehak Akash</p>
 
       </div>
 </div>
 </div>
 </div>
 </div>
 </footer>
 
 
 
 
 
 
 

<!-----------x-x-x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-------->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   
<script type="text/javascript">


  
 
  
  $(document).ready(function(){
    $('ul.tabs').tabs(
	);
  });
      
	  $(document).ready(function() {
    $('select').material_select();
  });
  
 

</script> 

</body>
</html>