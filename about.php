<?php
session_start();


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
        <img src="preview.png" style="height: 300px;">
      </div>
      <?php if(isset($_SESSION['firstname'])){ 
		  $firstname=$_SESSION['firstname'];
		  $query="SELECT * FROM user WHERE firstname='$firstname'";
		 $results= mysqli_query($conn,$query);


if($results->num_rows>0){
	while($row=$results->fetch_assoc()){
	$dp_path= trim($row["dp"]);
	
	}
}?>
      <a href="#!user"><img class="circle responsive-img"  src="<?php echo $dp_path ?>" style="height:100px; width:100px;"></a>
	  <?php } ?> 
	  <?php if(isset($_SESSION['firstname'])){ ?>
	<h6><b>Welcome! <?php echo $_SESSION['firstname']; 
         if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
            echo " (Admin)";
         }?></b></h6>
    </div></li>
	
	<?php } ?>
	
   <li class="z-depth-4"><a class="waves-effect waves-orange" href="askquestion.php"><i class="material-icons">forum</i>Ask Question</a></li>
	 <li><div class="divider"></div></li>
    <li  class=""><a href="index.php" class="waves-effect waves-orange"><i class="material-icons">home</i>Home</a></li>
	<li  class=""><a href="home.php" class="waves-effect waves-orange"><i class="material-icons">star</i>Questions</a></li>
   	<li  class=""><a href="setting.php" class="waves-effect waves-orange"><i class="material-icons">settings</i>Profile</a></li>
	<li  class=""><a href="contact.php" class="waves-effect waves-orange"><i class="material-icons">contact_mail</i>Contact Us</a></li>
	<li  class="active"><a href="about.php" class="waves-effect waves-orange"><i class="material-icons">group</i>About</a></li>

  
    
  </ul>

  
  </div>
  

  
  
<!----------------------------------------------------------------Nav Bar--------------------------------------------------------------------------------------------------->
<div class="col s12 m12 l9 ">
 
<div class="navbar-fixed"> 
	
 <nav style="background-color:black; height:90px; border-bottom:4px solid #de0e0e;" class="z-depth-5 ">
    <div class="nav-wrapper">
	 <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      <span class="brand-logo hide-on-med-and-down" style=" font-family:'Amiko'; line-height:45px; padding-left:10px;">Parvatibai Chowgule College of Arts & Science <br> Question & Answer Forum</span>
    </div>

  </nav>
 
	 <?php if(isset($_SESSION['firstname'])){ ?>
	<ul class="" style="position:fixed; right:10px; float:right;">
	 <li style="padding-top:10px;"><a class="waves-effect waves-light btn modal-trigger z-depth-4 red " style="color:#212121; " href="index.php?logout='1'">Logout</a></li>
	 <?php }else{ ?>
	 <li style="padding-top:10px;"><a class="waves-effect waves-light btn modal-trigger z-depth-4 red " style="color:#212121; " href="#modal1">Login</a></li>
	 </ul>
	 <?php } ?>
	
	 
 </div>
 </div>
  </div>

 <!-----------------------------------------------------------------------------About----------------------------------------------------------------------------------> 
  
  <div class="row">
<div class="col l3">
</div>
<div class="col s12 m12 l9">
<div class="z-depth-4" style="height:950px; padding-left:20px; padding-top:10px; padding-right:20px; ">
<h4>About Us</h4>
<div class="divider"></div>

<div class="row">
  <div class="col s3 m3 l3">
 <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="ayushi2.jpg" >
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Ayushi <i class="material-icons right">more_vert</i></span>
      <p><a href="https://www.facebook.com/ayushi.patil.7549">facebook.com/Ayushi</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
      <p><b>Ayushi Patil</b> <br>abp003@chowgules.ac.in <br> Head of our Coding Department </p>
    </div>
  </div>
  </div>
  
  
  <div class="col s3 m3 l3">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="mehek.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Mehak <i class="material-icons right">more_vert</i></span>
      <p><a href="https://www.facebook.com/mehak.shaikh.96592">facebook.com/Mehak</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
  </div>
  
  <div class="col s3 m3 l3">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="collin.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Collin <i class="material-icons right">more_vert</i></span>
      <p><a href="https://www.facebook.com/collin.t.pereira">facebook.com/Collin</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
  </div>
  
  <div class="col s3 m3 l3">
  <div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="akash.jpg">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">Akash<i class="material-icons right">more_vert</i></span>
      <p><a href="https://www.facebook.com/AkashDesai.1010">facebook.com/Akash</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
      <p>Here is some more information about this product that is only revealed once clicked on.</p>
    </div>
  </div>
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


 $('.button-collapse').sideNav({

      menuWidth: 340, 
      edge: 'left', 
      closeOnClick: true,    
    }
  );
  
 
  
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