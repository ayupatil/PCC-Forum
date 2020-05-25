<!DOCTYPE html>
<html lang="en">
	<head>


<?php 
session_start();
  include'logout.php';

  $_SESSION['message'] = "";
$conn = mysqli_connect('localhost', 'root', '', 'myforum');
  
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $conn->real_escape_string($_POST['username']);
	$email = $conn->real_escape_string($_POST['email']);
		$query1 = "SELECT username FROM user WHERE username='$username'";
		$results = mysqli_query($conn, $query1);
		if (mysqli_num_rows($results) == 0) {
			
			
	$query2 = "SELECT email FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $query2);
	if (mysqli_num_rows($result) == 0){
	
	$email = $conn->real_escape_string($_POST['email']);
	if(strpos($email, "@chowgules.ac.in", "@")==true){
		
	if($_POST['password'] == $_POST['confirm_password']){
		
		$fname = $conn->real_escape_string($_POST['fname']);
		$lname = $conn->real_escape_string($_POST['lname']);
		$email = $conn->real_escape_string($_POST['email']);
		$username = $conn->real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		
		$_SESSION['username'] = $username;
		$_SESSION['fname'] = $fname;
		$hash = rand(100000,999999);
		
$query= "INSERT INTO user (firstname, lastname, email, username, password,hash)
								VALUES('$fname', '$lname', '$email', 

'$username', '$password','$hash')";
								
								if($conn->query($query) === true){
							
								
									 $to = $email;
  $subject= 'Signup|Verification';
   $msg='Thank you for signing up. Your one time validation code is :'.$hash.
   'Enter the same code for verification of your account ' ;
 $headers='From:noreply@chowgules.ac.in'."\r\n";
 mail($to,$subject,$msg,$headers); 
 $query3 = "SELECT uid FROM user WHERE email='$email'";
	$result = mysqli_query($conn, $query3);
	if (mysqli_num_rows($result) == 0){
	    $uid=trim($row["uid"]);
	    echo '$uid';
	$_SESSION['uid'] = $uid;
	}
 	header("location: hash.php?uid=".$uid);
 	
								}
								else{ ?>
							<script>
									$(document).ready(function() {
										$('#regform').on('submit', function(event) {
											event.preventDefault();
															});
														});
		</script>	
							
							<?php	}
	}
	else{
		
		
		
		
		
		$msg1 = "two passwords do not match";
		echo "<script type='text/javascript'> alert('$msg1');</script>";
	
		
	}
	}
	else{
	$msg = "email not valid";
		echo "<script type='text/javascript'> alert('$msg');</script>";
		
		
	}
	
	}
	else{
		$msg3="Email already exists";
		echo "<script type='text/javascript'> alert('$msg3');</script>";
	}
	
		}
		else{
		$msg2="Username already exists";
			echo "<script type='text/javascript'> alert('$msg2');</script>";
			
		}
}




 ?>


	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  

media="screen,projection"/>
		  <link rel="stylesheet" 

href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		  
		  
		  <link href="https://fonts.googleapis.com/css?family=Varela Round" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css?family=Amiko" rel="stylesheet">
		  <link href="https://fonts.googleapis.com/css?family=Hind Madurai" rel="stylesheet">


				<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
				<meta charset="utf-8">

				                                                          

<title>Parvatibai Chowgule College Forum</title>
 
 <style type="text/css">
#btn{
	position:fixed;
    top:0;
	right:10;
	} 
.input-field label {
     color: #000;
   }
   
.input-field input[type=text]:focus + label {
     color: #ff9800 !important;
   }
   
.input-field input[type=password]:focus + label {
     color: #ff9800 !important;
   }

.input-field input[type=text]:focus {
     border-bottom: 1px solid #ff9800 !important;
     box-shadow: 0 1px 0 0 #e65100 !important;
   }

.input-field input[type=password]:focus {
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

   
.modal{
	max-height: 90% !important;
}
  <!--@media only screen and (max-width : 992px) {
   span.small{
   font-size: 10px;
   line-height:10px;
   font-family:'Amiko';	
   }
   }-->
   
 .error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
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


<!--------------------------------------------------------------------------Side 

Nav------------------------------------------------------------------------------->
  <div class="row">
  <div class="col l3">
  <ul id="slide-out" class="side-nav fixed z-depth-4">
    <li><div class="user-view">
      <div class="background">
        
      </div>
      <a href="#!user"><img  style="height:230px; width:210px;" src="logo1.png"></a>
   <?php if(isset($_SESSION['firstname'])){ ?>
	<h6><b>Welcome! <?php echo $_SESSION['firstname']; 
         if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
            echo " (Admin)";
         }?></b></h6>
    </div></li>
	
	<?php } 
	if(isset($_SESSION['firstname'])){ ?>
	 <li class="z-depth-4"><a class="waves-effect waves-orange" href="askquestion.php"><i class="material-icons">forum</i>Ask Question</a></li>
	 <?php } 
	 else { ?>
	  <li class="z-depth-4"><a class="waves-effect waves-orange modal-trigger" href="#modal1"><i class="material-icons">forum</i>Ask Question</a></li>
	 <?php } ?>
	 <li><div class="divider"></div></li>
    <li  class="active"><a href="index.php" class="waves-effect waves-orange"><i class="material-icons">home</i>Home</a></li>
	 <?php if(isset($_SESSION['firstname'])){ ?>
    <li  class=""><a href="home.php" class="waves-effect waves-orange"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="setting.php" class="waves-effect waves-orange"><i class="material-icons">settings</i>Profile</a></li>
	 <?php } 
	 
	 else { ?>
    <li  class=""><a href="#modal1"  class="waves-effect waves-orange modal-trigger"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">settings</i>Profile</a></li>
	 <?php }
     if(isset($_SESSION['firstname']) && (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){ ?>
	 
	<li  class=""><a href="users.php" class="waves-effect waves-orange modal-trigger"><i class="material-icons">group</i>Users</a></li>
	<?php } 
	 
	 else { ?>
	 <li  class=""><a href="contact.php" class="waves-effect waves-orange"><i class="material-icons">contact_mail</i>Contact Us</a></li>
	<li  class=""><a href="about.php" class="waves-effect waves-orange"><i class="material-icons">group</i>About</a></li>

	 <?php }
	 ?>
	
   
   
   
  </ul>
 
 </div>
 
 
 
 <!-------------------------------------------------------------------------Nav 

bar--------------------------------------------------------------------------------->
 
 <div class="col s12 m12 l9 ">
 
<div class="navbar-fixed"> 
	
 <nav style="background-color:black; height:90px; border-bottom:4px solid #de0e0e;" class="z-depth-5 ">
    <div class="nav-wrapper">
	 <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <span class="brand-logo hide-on-med-and-down" style=" font-family:'Amiko'; line-height:45px; 

padding-left:10px;">Parvatibai Chowgule College of Arts & Science <br> Question & Answer Forum</span>
    </div>

  </nav>
  
	 
	 <?php if(isset($_SESSION['firstname'])){ ?>
	 <div style="">
	 <a id="notification-icon" class="dropdown-button btn-floating" data-beloworigin="true" href="#" 

data-activates="dropdown1" style="float:right;"><i class="material-icons prefix" >notifications</i></a>
	</div>
	<ul id="dropdown1" class="dropdown-content" >
    <li href="#">fd</li>
	</ul>
	 <ul class="" style="position:fixed; right:70px;">
	 <li><a class="waves-effect waves-light btn modal-trigger z-depth-4 red " style="color:#212121; " 

href="index.php?logout='1'">Logout</a></li>
	 <?php }else{ ?>
	 <li style="padding-top:17px; position:fixed; right:10px;"><a class="waves-effect waves-light btn 
	 modal-trigger z-depth-4 red " style="color:#212121; " href="#modal1">Login</a></li>
	 </ul>
	 <?php } ?>
	
	 
 </div>
 &nbsp; 
   <img class="responsive-img" src="header.jpg">
  </div>
  </div>

  
  
  <!-------------------------------------------------------------------------Search 

bar----------------------------------------------------------------------------------->
  <div class="row">
  <div class="col l3">
  </div>
  <div class="col s12 m12 l9" style="padding-right:50px;">
  <nav style="background-color:#fff3e0">
    <div class="nav-wrapper">
      <form action = 'search.php' method = 'GET'>
        <div class="input-field">
          <input id="search" type="search" name="search">
          <label class="label-icon" for="search"><i type = 'submit' name = 'submit' class="material-icons" style="color:#212121;">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  </div>
  </div>
  


<!---------------------------------------------------------------------------Login 

Modal----------------------------------------------------------------------------------------->

 <div id="modal1" class="modal">
    <div class="modal-content">
      <h4 class="center">Login or Sign up!</h4>
      <div class="row">
    <form class="col s12" method="post" action="server1.php?qid=0&val=11">
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
	  
	  <div style="text-align:center">
<button type="submit" class="btn" name="login_user">Login</button>
</div>

    </form>
	
  &nbsp;
  &nbsp;
 


 <h5 class="center">New to our Forum? Sign up!</h5>
    <div class="row">
    <form class="col s12" method="post" action="index.php" id="regform">
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
          <label for="email">email@chowgules.ac.in</label>
        </div>
		<div class="input-field col s12 m12 l6">         
          <input  type="text" class="validate" name="username" required>
          <label>Username</label>
        </div>
</div>	
<div class="row">
<div class="input-field col s12 m12 l6">         
          <input id="password" type="password" class="validate" name="password" required minlength="6">
          <label for="password">Password</label>
        </div>
		<div class="input-field col s12 m12 l6">         
          <input id="confirm_password" type="password" class="validate" name="confirm_password" required>
          <label for="password">Confirm Password</label>
		  <span id="message"></span>
        </div>
</div>
<h6><?php echo $_SESSION['message'] ?></h6>

<div style="text-align:center">
<button type="submit" class="btn"  name="reg_user" id="reg">Register</button>  
</div>

    </form>
<div style="text-align:center">
<!--<a class="waves-effect waves-orange btn-flat" name="reg_user">Sign up</a></div>-->
  </div>
   </div>
    
  </div>
  
  </div>
   </div>
  
<!------------------------------------------------------------------------------

Questions----------------------------------------------------------------------------------->
<div class="row">
<div class="col l3">
</div>
<div class="col s12 m12 l8">
<div class="z-depth-4" style="max-height:1200px;">
<h3 style="font-family: 'Hind Madurai'; padding-left:10px;padding-top:10px;" class="flow-text">Recent 

Questions</h3>
<div class="divider"></div>





<?php 
$sql = "SELECT COUNT(*) FROM questions";
$result = mysqli_query($conn,$sql) ;
$r = mysqli_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$sql = "SELECT * FROM questions ORDER BY qid DESC LIMIT $offset, $rowsperpage 	";
$result = mysqli_query($conn,$sql);

?>
 <?php

// while there are rows to be fetched...
while ($row = mysqli_fetch_assoc($result)) {
   $question = $row['ques'];
	$qid = $row['qid'];
	$_SESSION['qid']=$qid;
	$uid=$row['uid'];
	$time=$row['time'];
	$likes=$row['no_of_upvote'];
	$dislikes=$row['no_of_downvote'];
	$reports=$row['no_of_report'];

$query2="SELECT firstname,lastname,dp FROM user WHERE uid='$uid'";
$result2= mysqli_query($conn,$query2);


if($result2->num_rows>0){
	while($row=$result2->fetch_assoc()){
		$firstname=trim($row["firstname"]);
		$lastname= trim($row["lastname"]);
		$dp_path=trim($row["dp"]);
	}	
}




?>
	<ul class="collection">
    <li class="collection-item avatar">
	
	 <?php if(isset($_SESSION['firstname'])){ ?>
	 <a href="userview.php?uid=<?php echo $uid ?>"><img src="<?php echo $dp_path ?>" alt="" class="circle"></a>
	  	 <?php } 
	 else { ?>
	 <img src="<?php echo $dp_path ?>" alt="" class="circle">
	  	 <?php } ?>
	
      <span><b><?php echo $firstname." ".$lastname;?></b></span> 
	  
	  <br>
      <span class="title"><a href="answer.php?qid=<?php echo $qid ?>"><?php echo $question; ?></a 

></span><br><hr>
	  <span class="title"><?php echo $time; ?></span>
	  
	   <?php if(isset($_SESSION['firstname'])){ 
	   
	   if(($uid==$_SESSION['uid']) || (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){
	   ?>
	   <a href="del.php?qid=<?php echo $qid ?>&val=2" class="secondary-content tooltipped" data-tooltip="Delete"><i class="material-icons">highlight_off</i></a>
	   <?php } ?>
	 
<div class="row">
	  <div class="col s12 m12 l12">
	  

	
	
			<button href="vote.php?qid=<?php echo $qid ?>&val=1" class="tooltipped like btn-flat" data-position="bottom" data-delay="50" data-tooltip="Upvote">
	  <i class="material-icons black-text" style="font-size:27px;">thumb_up</i></button>
	  <b style="color:#00F412;"><?php  echo $likes ?></b>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 
	  
	 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <button href="vote.php?qid=<?php echo $qid ?>&val=2" class="tooltipped dislike btn-flat" data-position="bottom" data-delay="50" data-tooltip="Downvote">
	  <i class="material-icons black-text" style="font-size:27px;">thumb_down</i></button>
	  <b style="color:orange;"><?php  echo $dislikes ?></b>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	  <button href="vote.php?qid=<?php echo $qid ?>&val=3" class="tooltipped report btn-flat" data-position="bottom" data-delay="50" data-tooltip="Report">
	  <i class="material-icons black-text" style="font-size:27px;">report</i></button>
	  <b style="color:red;"><?php  echo $reports ?></b>
	 
	   </div> 
	   </div>
	   
	  <?php } ?>
	  </li> 
	 </ul>
	  <?php
 } // end while

?>




<!----------------------------------------------------------------------------

Pagination------------------------------------------------------------------------------->

  
<ul class="pagination center">
<?php

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page?>
   
   <li class="waves-effect"><a href="?currentpage=<?php echo $prevpage ?>"><i class="material-icons">chevron_left</i></a></li>
   <?php
 //  echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page







for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) { 
         // 'highlight' it but don't make a link ?>
         <li class="waves-effect " style="background-color:orange;"><?php echo $x ?></li>
		 <?php
      // if not current page...
      } else {
         // make it a link
		 ?>
		 <li class="waves-effect" style="background-color:orange;"><a href="?currentpage=<?php 

echo $x ?>"><?php echo $x ?></a></li>
		 <?php
        // echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for

// if not on last page, show forward and last page links 





       
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
   ?>
   
   <li class="waves-effect"><a href="?currentpage=<?php echo $nextpage ?>"><i class="material-icons">chevron_right</i></a></li>
   <?php
    // echo forward link for next page 
  // echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
  
  
}?>

	
	
     

	</ul>
	  
      
</div>
</div>
</div>


 <!-----------------------------------------------------------------------------

delete modal------------------------------------------------------------------------------------->

<?php 
if(isset($_SESSION['qid'])) {
	$qid= $_SESSION['qid']; 
} ?>

<div id="delmodal" class="modal">
    <div class="modal-content">
  <form method="post">   
    <div class="row">
        <div class=" col s12 m12 l12">         
          <h5>Are you sure you want to delete this question?</h5>
        </div>
</div>

 <div class="row">

<div class="col s6" style="text-align:center">
<button type="submit" class="btn" 

 formaction="del.php?qid=<?php echo $qid ?>&val=2">Yes</button>  
</div>


<div class="col s6" style="text-align:center">
<button type="submit" class="btn" 

 formaction="index.php">No</button>  
</div>


   </div>

  </form>
  </div>
   </div>

  
 <!-----------------------------------------------------------------------------

Footer------------------------------------------------------------------------------------->
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
 
 
 <div class="fixed-action-btn">
    <a class="btn-floating btn-large orange darken-3">
      <i class="large material-icons">share</i>
    </a>
    <ul>
      <li><a href="https://www.facebook.com/chowgulecsdept" class="btn-floating blue darken-2"><img 

src="fb.png" style="height:25px; width:25px;" class="pos"></a></li>
      <li><a href="https://twitter.com/chowgulecompsci" class="btn-floating blue lighten-2"><img 

src="t.png" style="height:25px; width:30px;" class="pos"></a></li>
      <li><a href="https://www.instagram.com/chowgulecomputerscience/" class="btn-floating pink"><img 

src="i.png" style="height:25px; width:25px;" class="pos"></a></li>
      <li><a href="https://www.youtube.com/channel/UCyQFk3CO-umLId4vIE8cVsA" class="btn-floating red"><img 

src="y.png" style="height:25px; width:25px;" class="pos"></a></li>
           </ul>
  </div>
  

 
	<!-----------///////////////////////////x-x--x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-

x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-//////////////////////------->





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
	   
	     $(document).ready(function(){
    $('.modal').modal({
		
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '4%', // Starting top style attribute
      endingTop: '10%', // Ending top style attribute
      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
        
        console.log(modal, trigger);
      },
      complete: function(modal,trigger) { console.log(modal,trigger);  } // Callback for Modal close
    }
  );
	});

  
	  
	  
	 

$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

 $(document).ready(function() {
	$('.like').on('click', function(){
		console.log("hello");
	$(this).prop('disabled',true);
	$('.dislike').prop('disabled',true);
	$('.report').prop('disabled',true);
	});
 });
 
 $(document).ready(function() {
	$('.dislike').on('click', function(){
		console.log("hello");
	$(this).prop('disabled',true);
	$('.like').prop('disabled',true);
	$('.report').prop('disabled',true);
	});
 });
 
 $(document).ready(function() {
	$('.report').on('click', function(){
		console.log("hello");
	$(this).prop('disabled',true);
	$('.dislike').prop('disabled',true);
	$('.like').prop('disabled',true);
	});
 });
 

	</script>
</body>
</html> 