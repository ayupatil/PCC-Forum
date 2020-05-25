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
   #btn{
	position:fixed;
    top:0;
	right:10;
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
   
   .tabs .indicator{
   background-color:orange !important;
   }
   
   .tabs .tab a{
   color:#ffd180;
   }
   
   .tabs .tab a.active{
   color:orange;
   }
   
   .tabs .tab a:hover{
   color:#ffa726;
   }
   
   .tabs .tab .one{
   color:#ff8a80 ;
   }
   .tabs .tab .two{
   color:#bbdefb;
   }
   .tabs .tab .three{
   color:#fff59d;
   }
   .tabs .tab .four{
   color:#b9f6ca;
   }
  
   .tabs .tab .one i:hover{
   color:red;
   }
   .tabs .tab .two i:hover{
   color:#ffeb3b;
   }
   .tabs .tab .three i:hover{
   color:#00c853;
   }
   .tabs .tab .four i:hover{
   color:#2196f3; 
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
      <a href="#!user"><img class="circle responsive-img"  src="<?php echo $dp_path ?>" style="height:150px; width:150px;"></a>
	  <?php } ?> 
	  <?php if(isset($_SESSION['firstname'])){ ?>
	<h6><b>Welcome! <?php echo $_SESSION['firstname']; 
         if(isset($_SESSION['adbit']) && $_SESSION['adbit']==1){
            echo " (Admin)";
         }?></b></h6>
    </div></li>
	
	<?php }  ?>
	
   <li class="z-depth-4"><a class="waves-effect waves-orange" href="askquestion.php"><i class="material-icons">forum</i>Ask Question</a></li>
	 <li><div class="divider"></div></li>
    <li  class=""><a href="index.php" class="waves-effect waves-orange"><i class="material-icons">home</i>Home</a></li>
	<li  class="active"><a href="home.php" class="waves-effect waves-orange"><i class="material-icons">star</i>Questions</a></li>
   	<li  class=""><a href="setting.php" class="waves-effect waves-orange"><i class="material-icons">settings</i>Profile</a></li>
	
	<?php 
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

<!-------------------------------------------------------------------------Notification Button------------------------------------------------------------------------------------>
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">one</a></li>
	</ul>
	


<!-------------------------------------------------------------------------Search bar------------------------------------------------------------------------------------->
<div class="row">
  <div class="col l3">
  </div>
  <div class="col s12 m12 l9" style="padding-right:5px;">
  <nav style="background-color:#fff3e0">
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search">
          <label class="label-icon" for="search"><i class="material-icons" style="color:#212121;">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
  </div>
  </div>


  
<!-------------------------------------------------------------------------------Questions------------------------------------------------------------------------------------>
<div class="row">
<div class="col l3">
</div>
<div class="col s12 m12 l9">

 <ul class="tabs">
        <li class="tab col s3"><a class=" one " href="#test1"> <i class="material-icons one">whatshot</i>Trending</a></li>
         <li class="tab col s3"><a class="two " href="#test3"><i class="material-icons three">star</i>Interests Based</a></li>
          <li class="tab col s3"><a class="three" href="#yourq"><i class="material-icons four">verified_user</i>Your Questions</a></li>
      <li class="tab col s3"><a class="four" href="#test2"><i class="material-icons two">flash_on</i>Your Answers</a></li>
     </ul>
    </div>
	
	<div class="col l3"></div>
	
	
<!--------------------------------------------------------------------------------------TEST 1-------------------------------------------------------------------------->	
	
	
    <div id="test1" class="col s12 m12 l9">
	<div class="z-depth-4" style="max-height:400px; overflow-y:scroll;">
	<?php

$question=array();
$answer = array();	

$query="SELECT MAX(qid) as qid from questions";

	$result = mysqli_query($conn,$query);
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$qid= $row['qid'];
	 }

$query1="SELECT time from questions WHERE qid='$qid'";

	$result = mysqli_query($conn,$query1);
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$cur_time= $row['time'];
	 }

$wt=strtotime("today");
?>


 <ul id="collection-id" class="collection">
 
 <?php
	$wt=strtotime("-1 week",$wt);
	$week_time=date("y-m-d h:i:sa",$wt);
	
$query1 = "
	           SELECT qid, COUNT(aid) AS a_cnt
	           FROM  answers 
			   GROUP BY qid
			   ORDER BY a_cnt DESC";
  
	$result1 = mysqli_query($conn,$query1);
	if (mysqli_num_rows($result1) > 0) {
	
	while($row = mysqli_fetch_array($result1, MYSQL_ASSOC)){
	
	$qid=$row['qid']; 
	
	$query = "SELECT * FROM questions 
			   WHERE qid='$qid'
               AND time BETWEEN '$wt' AND '$cur_time'";

	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0) {
	

	
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$question=$row['ques'];
	$qid=$row['qid'];
	$uid=$row['uid'];
	 $time=$row['time'];
	 

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
      
      <li class="collection-item dismissable avatar">
	  
	  <img src="<?php echo $dp_path ?>" alt="" class="circle">
<span><b><?php echo $firstname." ".$lastname;?></b></span> 
	  
	  <br><a href="answer.php?qid=<?php echo $qid ?>"><?php echo $question ;?></a><br><hr>
	  <span class="title"><?php echo $time; ?></span>
	
	
	   <?php if(isset($_SESSION['firstname'])){ 
	   
	   if(($uid==$_SESSION['uid']) || (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){
	   ?>
	  <a href="del.php?qid=<?php echo $qid ?>&val=2" class="secondary-content tooltipped" data-tooltip="Delete"><i class="material-icons">highlight_off</i></a>
	  <?php }
	   }	  ?>
	  
	  <table class="responsive-table">
	  <tr>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=1" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upvote"><i class="material-icons">thumb_up</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=2" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Downvote"><i class="material-icons">thumb_down</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=3" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Report"><i class="material-icons">report</i></a></td>
	  </tr>
	   </table> 
	  </li>
	 <?php 
	 
	 
	 }  
}
	
	}}
	
	
	?>
 
	 
	
	  
    </ul>
</div>
</div>
	
	
	
	
	
	
	<!------------------------------------------------------------------------------TEST 2-------------------------------------------------------------------------------->
	
	<div id="test2" class="col s12 m12 l9">
	<div class="z-depth-4" style="height:400px; overflow-y:scroll;">
		<?php
$uid=$_SESSION['uid'];
$question=array();
$answer = array();
$aid;
?>

<?php if(isset($_SESSION['uid'])){ 
$query2 = "SELECT questions.ques,answers.ans,answers.aid,questions.uid,questions.qid,answers.time FROM answers,questions WHERE answers.qid=questions.qid AND answers.uid='$uid' ORDER BY answers.aid DESC";

$result = mysqli_query($conn,$query2);
?>
 <ul id="collection-id" class="collection">
 <?php
if (mysqli_num_rows($result) > 0) {

	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$answer = $row['ans'];
	$question=$row['ques'];
	$aid = $row['aid'];
	$qid=$row['qid'];
	$uid=$row['uid'];
	$time=$row['time'];

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
      <li class="collection-item dismissable avatar">
	  <a><img src="<?php echo $dp_path ?>" alt="" class="circle"></a>

	  <span><b><?php echo $firstname." ".$lastname;?></b></span> 
	  
	  <br> <?php echo "Q: "; ?><a href="answer.php?qid=<?php echo $qid ?>"><?php echo $question ;?></a><?php echo "<br>A: ".$answer; ?><br><hr>
	  <span class="title"><?php echo $time; ?></span>

 <?php if(isset($_SESSION['firstname'])){ 
	   
	   if(($uid==$_SESSION['uid']) || (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){
	   ?>
	  <a href="del.php?qid=<?php echo $qid ?>&val=2" class="secondary-content tooltipped" data-tooltip="Delete"><i class="material-icons">highlight_off</i></a>
	  <?php }
	   }	  ?>	  
	 
	 <table class="responsive-table">
	  <tr>
	  <td><a href="voteans2.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=1" class="linkcolor tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upvote"><i class="material-icons">thumb_up</i></a></td>
	  <td><a href="voteans2.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=2" class="linkcolor tooltipped" data-position="bottom" data-delay="50" data-tooltip="Downvote"><i class="material-icons">thumb_down</i></a></td>
	  <td><a href="voteans2.php?qid=<?php echo $qid ?>&aid=<?php echo $aid ?>&val=3" class="linkred tooltipped" data-position="bottom" data-delay="50" data-tooltip="Report"><i class="material-icons">report</i></a></td>
	  </tr>
	   </table>
	  </li>
	 <?php 
	 
	 
	 
	 } ?> 
	 
	 

	
	  
    </ul>
<?php 
}
 } ?>
	</div>
	</div>
	
	
	
	
<!-------------------------------------------------------------------------------------------TEST 3--------------------------------------------------------------------------->	
	
	
    <div id="test3" class="col s12 m12 l9">
	<div class="z-depth-4" style="height:400px; overflow-y:scroll;">
	<?php
$uid=$_SESSION['uid'];
$question=array();
$answer = array();

?>

<?php if(isset($_SESSION['uid'])){ 
$query2 = "SELECT sid FROM interests WHERE uid='$uid'";

$result = mysqli_query($conn,$query2);
?>
 <ul id="collection-id" class="collection">
 <?php
if (mysqli_num_rows($result) > 0) {
	

	
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
		 $sid= $row['sid'];
		 
	$query2 = "SELECT * FROM questions WHERE sid='$sid' ORDER BY qid DESC";

$result = mysqli_query($conn,$query2);

if (mysqli_num_rows($result) > 0) {
	

	
	
	 while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
	$question=$row['ques'];
	$qid=$row['qid'];
	$uid=$row['uid'];
	 $time=$row['time'];

$query2="SELECT firstname,lastname,dp FROM user WHERE uid='$uid'";
$result2= mysqli_query($conn,$query2);


if($result2->num_rows>0){
	while($row=$result2->fetch_assoc()){
		$firstname=trim($row["firstname"]);
		$lastname= trim($row["lastname"]);
		$dp_path= trim($row["dp"]);
	}
	
}

?>
      
      <li class="collection-item dismissable avatar">
	  <img src="<?php echo $dp_path ?>" alt="" class="circle">
<span><b><?php echo $firstname." ".$lastname;?></b></span> 
	  
	  <br><a href="answer.php?qid=<?php echo $qid ?>"><?php echo $question ;?></a><br><hr>
	  <span class="title"><?php echo $time; ?></span>
	 
	    <?php if(isset($_SESSION['firstname'])){ 
	   
	   if(($uid==$_SESSION['uid']) || (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){
	   ?>
	  <a href="del.php?qid=<?php echo $qid ?>&val=2" class="secondary-content tooltipped" data-tooltip="Delete"><i class="material-icons">highlight_off</i></a>
	  <?php }
	   }	  ?>
	  
	  <table class="responsive-table">
	  <tr>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=1" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upvote"><i class="material-icons">thumb_up</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=2" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Downvote"><i class="material-icons">thumb_down</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=3" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Report"><i class="material-icons">report</i></a></td>
	  </tr>
	   </table> 
	  </li>
	 <?php 
	 
	 
	 
	 }  
}
	 
	 
	 
	 } ?> 
	 
	 

	
	  
    </ul>
<?php 
}
 } ?></div>
 
 </div>
	
	
	
	
	
<!-----------------------------------------------------------------------------------------YOURQ---------------------------------------------------------------------------->	
	

	<div id="yourq" class="col s12 m12 l9">
	
	
	
	<div class="z-depth-4" style="height:400px; overflow-y:scroll;">
	
	
	
	
	
	
	
	<?php
$uid = $_SESSION['uid']; 
$question = array();
$qid;

$sql = "SELECT COUNT(*) FROM questions  WHERE uid='$uid' ";
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
$sql = "SELECT * FROM questions  WHERE uid='$uid' ORDER BY qid DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($conn,$sql);



// while there are rows to be fetched...
while ($row = mysqli_fetch_assoc($result)) {
   $question = $row['ques'];
	$qid = $row['qid'];
	$time=$row['time'];
	?>
	<ul class="collection">
    <li class="collection-item avatar">
      
      <span class="title"><a href="answer.php?qid=<?php echo $qid ?>"><?php echo $question; ?></a ></span><br><hr>
	  <span class="title"><?php echo $time; ?></span>
	  <?php if(isset($_SESSION['firstname'])){ 
	   
	   if(($uid==$_SESSION['uid']) || (isset($_SESSION['adbit']) && $_SESSION['adbit']==1)){
	   ?>
	  <a href="del.php?qid=<?php echo $qid ?>&val=2" class="secondary-content tooltipped" data-tooltip="Delete"><i class="material-icons">highlight_off</i></a>
	  <?php }
	   }	  ?>
<table class="responsive-table">
	  <tr>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=1" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Upvote"><i class="material-icons">thumb_up</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=2" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Downvote"><i class="material-icons">thumb_down</i></a></td>
	  <td><a href="vote2.php?qid=<?php echo $qid ?>&val=3" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Report"><i class="material-icons">report</i></a></td>
	  </tr>
	   </table> 
	  </li> 
	 </ul>
	  <?php
} // end while

?>




<!----------------------------------------------------------------------------Pagination------------------------------------------------------------------------------->

  
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
		 <li class="waves-effect" style="background-color:orange;"><a href="?currentpage=<?php echo $x ?>"><?php echo $x ?></a></li>
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
</div>
	
	
	
	
	
	<!-- ______________________________________________________________________________________________________________________________________ -->
	
	
  



<!---------------------------------------------------------------------------Pagination--------------------------------------------------------------------------------->





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
    $('ul.tabs').tabs(
	);
  });
      
	  $(function() {
		var index='key';
		var dataStore = window.SessionStorage;
		try{
			
			var oldIndex = dataStore.getItem(index);
		} catch(e){
		var oldIndex = 0;
		}
		
		$('#tabs').tabs({
			active: OldIndex,
			activate : function(event, ui){
				var newIndex = ui.newTab.parent().children().index(ui,newTab);
			dataStore.setItem(index, newIndex)
			}
			
		});
	  });

</script>
</body>
</html> 