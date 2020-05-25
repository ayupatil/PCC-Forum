<?php
session_start();
$question="";	
$description="";
$username="";
$fname="";
$lname="";


$conn = mysqli_connect('localhost', 'root', '', 'myforum');
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
.bb{
	position:fixed;
    top:0;
	right:10;
	} 

.input-field label {
     color: #000;
   }
   
      
.modal{
	max-height: 90% !important;
}
   
.input-field input[type=text]:focus + label {
     color: #ff9800 !important;
   }
   
.input-field input[type=textarea]:focus + label {
     color: #ff9800 !important;
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

   
.input-field input[type=search]:focus {
     border-bottom: 1px solid #ff9800 !important;
     box-shadow: 0 1px 0 0 #e65100 !important;
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
<!----------------------------------------------------------------Side Nav------------------------------------------------------------------------------------------------->
<div class="row">
  <div class="col l3">

<ul id="slide-out" class="side-nav fixed z-depth-4">
    <li><div class="user-view">
      <div class="background">
        <img src="preview.png">
      </div>
      <a href="#!user"><img class="circle" src="logo1.png"></a>
     <?php if(isset($_SESSION['firstname'])){ ?>
	
			<i class="material-icons prefix">person</i><span>
            Welcome! <?php echo $_SESSION['firstname']; ?></span>
	<?php } ?>
  
    </div></li>
  <?php 
	if(isset($_SESSION['firstname'])){ ?>
	 <li class="z-depth-4"><a class="waves-effect waves-orange" href="askquestion.php">Ask Question</a></li>
	 <?php } 
	 else { ?>
	  <li class="z-depth-4"><a class="waves-effect waves-orange modal-trigger" href="#modal1">Ask Question</a></li>
	 <?php } ?>
	 <li><div class="divider"></div></li>
    <li  class="active"><a href="index.php" class="waves-effect waves-orange"><i class="material-icons">home</i>Home</a></li>
	 <?php if(isset($_SESSION['firstname'])){ ?>
    <li  class=""><a href="home.php" class="waves-effect waves-orange"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="#" class="waves-effect waves-orange"><i class="material-icons">group</i>Users</a></li>
	<li  class=""><a href="#" class="waves-effect waves-orange"><i class="material-icons">local_offer</i>Tags</a></li>
	<li  class=""><a href="setting.php" class="waves-effect waves-orange"><i class="material-icons">settings</i>Settings</a></li>
	 <?php } 
	 else { ?>
    <li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">group</i>Users</a></li>
	<li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">local_offer</i>Tags</a></li>
	<li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">settings</i>Settings</a></li>
	 <?php } ?>
	<li  class=""><a href="#" class="waves-effect waves-orange"><i class="material-icons">help</i>Help</a></li>
	<li  class=""><a href="#" class="waves-effect waves-orange"><i class="material-icons">contact_mail</i>Contact Us</a></li>
   
    <li><div class="divider"></div></li>
    <li><a class="subheader">Interests</a></li>
    
  </ul>
  </div>

  
  
<!----------------------------------------------------------------Nav Bar--------------------------------------------------------------------------------------------------->
 

 <div class="col s12 m12 l9 navbar-fixed">
  
 <nav style="background-color:black; height:90px; border-bottom:4px solid #de0e0e;" class="z-depth-3">
 
    <div class="nav-wrapper">
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <span class="brand-logo hide-on-med-and-down" style=" font-family:'Amiko'; line-height:45px; padding-left:10px;">Parvatibai Chowgule College of Arts & Science <br> Question & Answer Forum</span>
  <ul  class="right">
    <div  class="bb fixed-action-btn"> 
	 <?php if(isset($_SESSION['firstname'])){ ?>
		<li style="padding-top:7px;"><a class="dropdown-button btn-floating btn-large waves-effect waves-light red"  data-activates="dropdown1"><i class="material-icons">notifications</i></a></li>
		
	 <li style="padding-top:10px;"><a class="waves-effect waves-light btn modal-trigger z-depth-4 red" style="color:#212121; " href="index.php?logout='1'">Logout</a></li>
	 <?php }else{ ?>
	 <li style="padding-top:10px;"><a class="waves-effect waves-light btn modal-trigger z-depth-4 red" style="color:#212121; " href="#modal1">Login</a></li>
	 <?php } ?>		
	  
</div>
</ul>	
</div>
</nav>
</div>
</div>  


<!-------------------------------------------------------------------------Notification Button------------------------------------------------------------------------------------>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
	 <li class="divider"></li>
    <li><a href="#!">two</a></li>
	</ul>

	
	
<!---------------------------------------------------------------------------QUE-Ans------------------------------------------------------------------------------------------------->
	<div class="row">
<div class="col l3">
</div>
<div class="col s12 m12 l9">
<div class="z-depth-4" style="height:400px; padding-left:20px; padding-top:10px; padding-right:20px; ">
<?php
$qid = $_GET['qid']; 
$query1="SELECT uid FROM questions where qid='$qid'";
$results= mysqli_query($conn,$query1);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$uid= trim($row["uid"]);
	
	}
}

$query2="SELECT firstname,lastname FROM user WHERE uid='$uid'";
$result2= mysqli_query($conn,$query2);


if($result2->num_rows>0){
	while($row=$result2->fetch_assoc()){
		$firstname=trim($row["firstname"]);
		$lastname= trim($row["lastname"]);
	}
	
}

?>

<h5><?php echo $firstname." ".$lastname;?></h5> 
<div class="divider"></div>
	
	<form  method="post" action="ansserver.php?qid=<?php echo $qid; ?>" >

          <div class="row">
        <div class="input-field col s12 m12 l12">
		
          <i class="material-icons prefix">pets</i>
		  <?php
		  
		  $query3="SELECT ques from questions where qid='$qid'";
$result3= mysqli_query($conn,$query3);


if($result3->num_rows>0){
	while($row=$result3->fetch_assoc()){
	$question= trim($row["ques"]);
	
	}
}
		  ?>
		  <label for="icon_prefix"><b><?php echo $question; ?></b></label>
        </div>
         </div>
		 
		 <div class="row">
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix">chat</i>
		  <?php
		  
		  $query4="SELECT description from questions where qid='$qid'";
$result4= mysqli_query($conn,$query4);


if($result4->num_rows>0){
	while($row=$result4->fetch_assoc()){
	$desc= trim($row["description"]);
	
	}
}
		  ?>
          <label for="icon_prefix"><b><?php echo $desc; ?></b></label>
        </div>
         </div>
		 
		 <div ><br></div><div class="divider"></div>
		 <?php  
$query2 = "SELECT * FROM answers WHERE qid='$qid' ";

$result = mysqli_query($conn,$query2);
?>
 <ul id="collection-id" class="collection">
 <?php
if (mysqli_num_rows($result) > 0) {
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$answer = $row['ans'];
	$aid = $row['aid'];
	$uid = $row['uid'];
	?>
      <li class="collection-item dismissable avatar"><?php echo $answer; 
	    

if(isset($_SESSION['firstname'])){
	
	if($uid==$_SESSION['uid']){
	  ?> 
	  
	  
	  <a href="delans.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>" class="secondary-content"><i style="float:right" class="material-icons">close</i></a>
	  
<?php } ?>
	  
	  <table class="responsive-table">
	  <tr>
	  <td><a href="voteans.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=1" class="linkcolor tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upvote"><i class="material-icons">thumb_up</i></a></td>
	  <td><a href="voteans.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=2" class="linkcolor tooltipped" data-position="bottom" data-delay="50" data-tooltip="Downvote"><i class="material-icons">thumb_down</i></a></td>
	  <td><a href="voteans.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=3" class="linkred tooltipped" data-position="bottom" data-delay="50" data-tooltip="Report"><i class="material-icons">report</i></a></td>
	  </tr>
	   </table> 
	   <?php } ?> 
	  </li>
	 <?php } ?> 
     

	
	  
    </ul>
<?php 
}
  if(isset($_SESSION['firstname'])){ ?>

<div ><br></div><div class="divider"></div>
		<div class="row">
        <div class="input-field col s12 m12 l12">
          <i class="material-icons prefix">border_color</i>
          <textarea  id="icon_prefix2" type="text" class="materialize-textarea"  class="validate" name="answer" required></textarea>
          <label for="icon_prefix2">Answer</label>
        </div>
      </div>
		   
		   <div style="text-align:center">
		   <button type="submit" class="btn black" style="text-align:center;" name="qu" action="ansserver.php?qid=<?php echo $qid; ?>">Submit</button>
		   </div>
<?php } ?>
		   
		   </form>
        </div>
		</div>
		</div>
	
	
	
	
	
	
	
	
	<!---------------------------------------------------------------------------Login Modal----------------------------------------------------------------------------------------->

 <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 class="center">Login or Sign up!</h4>
      <div class="row">
    <form class="col s12" method="post" action="server1.php?qid=<?php echo $qid ?>&val=<?php echo 11?>">
      <div class="row">
        <div class="input-field col s12 m12 l6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="username" required>
          <label for="icon_prefix">Username</label>
        </div>
        <div class="input-field col s12 m12 l6">
          <i class="material-icons prefix">lock</i>
          <input id="password" class="validate" type="password" name="password" required>
          <label for="password">Password</label>
        </div>
      </div>
	  
<button type="submit" class="btn" name="login_user">Login</button>

    </form>
	
  <div class="divider"></div>
 


 <h5 class="center">New to our Forum? Sign up!</h5>
    <div class="row">
    <form class="col s12" method="post" action="server.php" id="regform">
      <div class="row">
        <div class="input-field col s12 m12 l6">         
          <input type="text" class="validate" name="fname" required id="fname">
          <label>Firstname</label>
        </div>
        <div class="input-field col s12 m12 l6" >         
          <input id="lastname" class="validate" type="text" name="lname" required>
          <label for="lname">Lastname</label>
        </div>
      </div>
<div class="row">
<div class="input-field col s12 m12 l6">         
          <input id="email" type="email" class="validate" name="email" required>
          <label for="email">E-mail</label>
        </div>
		<div class="input-field col s12 m12 l6">         
          <input  type="text" class="validate" name="username" required>
          <label>Username</label>
        </div>
</div>	
<div class="row">
<div class="input-field col s12 m12 l6">         
          <input id="password" type="password" class="validate" name="password" required>
          <label for="password">Password</label>
        </div>
		<div class="input-field col s12 m12 l6">         
          <input id="confirm_password" type="password" class="validate" name="confirm_password" required onkeyup="checkpass(); return false;">
          <label for="password">Confirm Password</label>
		  <span id="message"></span>
        </div>
</div>
<button type="submit" class="btn"  name="reg_user" id="reg">Register</button>  

    </form>
<div style="text-align:center">
<!--<a class="waves-effect waves-orange btn-flat" name="reg_user">Sign up</a></div>-->
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
            <p style="text-align:center;">© Made with Love <br> by<br>Mehek  Ayushi Akash</p>
 
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


 $('.button-collapse').sideNav({

      menuWidth: 340, 
      edge: 'left', 
      closeOnClick: true,    
    }
  );
  
  $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, 
      hover: true, 
      gutter: 0, 
      belowOrigin: true, 
      alignment: 'right', 
      stopPropagation: false 
    }
  );
  
  
	     $(document).ready(function(){
    $('.modal').modal({
		startingTop: '4%',
		 endingTop: '10%',
	});
  });
	  
  
  $(document).ready(function(){
    $('ul.tabs').tabs(
	);
  });
      

</script> 

</body>
</html>