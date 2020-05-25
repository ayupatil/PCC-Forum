<?php 
session_start();
  include'logout.php';
  
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

.linkcolor:visited{
	color:black;
	
}
.linkred:visited{
color:red;
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


<!--------------------------------------------------------------------------Side Nav------------------------------------------------------------------------------->
  <div class="row">
  <div class="col l3">
  <ul id="slide-out" class="side-nav fixed z-depth-4">
    <li><div class="user-view">
      <div class="background">
        
      </div>
      <a href="#!user"><img  style="height:230px; width:210px;" src="logo1.png"></a>
   <?php if(isset($_SESSION['firstname'])){ ?>
	<h6><b>Welcome! <?php echo $_SESSION['firstname']; ?> (admin)</b></h6>
    </div></li>
	
	<?php } 
	if(isset($_SESSION['firstname'])){ ?>
	 <li class="z-depth-4"><a class="waves-effect waves-orange" href="askquestion.php"><i class="material-icons">forum</i>Ask Question</a></li>
	 <?php } 
	 else { ?>
	  <li class="z-depth-4"><a class="waves-effect waves-orange modal-trigger" href="#modal1"><i class="material-icons">forum</i>Ask Question</a></li>
	 <?php } ?>
	 <li><div class="divider"></div></li>
    <li  class=""><a href="index.php" class="waves-effect waves-orange"><i class="material-icons">home</i>Home</a></li>
	 <?php if(isset($_SESSION['firstname'])){ ?>
    <li  class=""><a href="home.php" class="waves-effect waves-orange"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="setting.php" class="waves-effect waves-orange"><i class="material-icons">settings</i>Profile</a></li>
	 <?php } 
	 else { ?>
    <li  class=""><a href="#modal1"  class="waves-effect waves-orange modal-trigger"><i class="material-icons">star</i>Questions</a></li>
	<li  class=""><a href="#modal1" class="waves-effect waves-orange modal-trigger"><i class="material-icons">settings</i>Profile</a></li>
	 <?php } ?>
	<li  class="active"><a href="users.php" class="waves-effect waves-orange modal-trigger"><i class="material-icons">group</i>Users</a></li>

   
  </ul>
 
 </div>
 
 
 
 <!-------------------------------------------------------------------------Nav bar--------------------------------------------------------------------------------->
 
 <div class="col s12 m12 l9 ">
 
<div class="navbar-fixed"> 
	
 <nav style="background-color:black; height:90px; border-bottom:4px solid #de0e0e;" class="z-depth-5 ">
    <div class="nav-wrapper">
	 <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <span class="brand-logo hide-on-med-and-down" style=" font-family:'Amiko'; line-height:45px; padding-left:10px;">Parvatibai Chowgule College of Arts & Science <br> Question & Answer Forum</span>
    </div>

  </nav>
  
	 
	 <?php if(isset($_SESSION['firstname'])){ ?>
	 
	 <ul class="" style="position:fixed; right:70px;">
	 <li><a class="waves-effect waves-light btn modal-trigger z-depth-4 red " style="color:#212121; " href="index.php?logout='1'">Logout</a></li>
	 <?php }else{ ?>
	 <li style="padding-top:17px; position:fixed; right:10px;"><a class="waves-effect waves-light btn modal-trigger z-depth-4 red " style="color:#212121; " href="#modal1">Login</a></li>
	 </ul>
	 <?php } ?>
	
	 
 </div>
 &nbsp; 
   <img class="responsive-img" src="header.jpg">
  </div>
  </div>
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
   
   
<!----------------------------------------------------------------------------------------Users---------------------------------------------------------------->   
   
  <div class="row">
<div class="col l3">
</div>
<div class="col s12 m12 l8">
<div class="z-depth-4" style="max-height:1000px;">
<h3 style="font-family: 'Hind Madurai'; padding-left:10px;padding-top:10px;" class="flow-text">Users</h3>
<div class="divider"></div>

<ul class="collection">
<?php

$query2="SELECT * FROM user ORDER BY firstname ASC";
$result2= mysqli_query($conn,$query2);


if($result2->num_rows>0){
	while($row=$result2->fetch_assoc()){
		$uid=trim($row["uid"]);
		$firstname=trim($row["firstname"]);
		$lastname= trim($row["lastname"]);
		$dp_path=trim($row["dp"]);
		?>
		
		<li class="collection-item avatar">
      <a href="userview.php?uid=<?php echo $uid ?>"><img src="<?php echo $dp_path ?>" alt="" class="circle"></a>
	  <span  class="title"><b><?php echo $firstname." ".$lastname;?></b></span><a  href="#" >
	  <i class="material-icons right tooltipped" data-position="bottom" data-delay="50" data-tooltip="Suspend"">not_interested</i></a> 
	  
	  </li>
	  
	<?php }
	
 }
?>
    
	  </ul>


</div>
</div>
</div>



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
      <li><a href="https://www.facebook.com/chowgulecsdept" class="btn-floating blue darken-2"><img src="fb.png" style="height:25px; width:25px;" class="pos"></a></li>
      <li><a href="https://twitter.com/chowgulecompsci" class="btn-floating blue lighten-2"><img src="t.png" style="height:25px; width:30px;" class="pos"></a></li>
      <li><a href="https://www.instagram.com/chowgulecomputerscience/" class="btn-floating pink"><img src="i.png" style="height:25px; width:25px;" class="pos"></a></li>
      <li><a href="https://www.youtube.com/channel/UCyQFk3CO-umLId4vIE8cVsA" class="btn-floating red"><img src="y.png" style="height:25px; width:25px;" class="pos"></a></li>
           </ul>
  </div>
  

 
	<!-----------///////////////////////////x-x--x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x-x--x-x-x-x-x-x-x-x-x-x-//////////////////////------->





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

  
	  
	  
	  $(document).ready(function() {
   MaterializeCollectionActions.configureActions($('#collection-id'), [
        {
            name: 'delete',
            callback: function (collectionItem, collection) {
                $(collectionItem).remove();
            }
        }
    ]);
});





	</script>
</body>
</html> 