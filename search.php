<?php 
session_start();


 // $button = $_GET [ 'submit' ]; 
  $search = $_GET [ 'search' ]; 

//if( !$button ) echo "you didn't submit a keyword";
 //else { 
 if( strlen( $search ) <= 1 ) echo "Search term too short"; 
 else { echo "You searched for <b> $search </b> <hr size='1' > </ br > ";


mysqli_connect('localhost', 'root', '', 'myforum');
  
$search_exploded = explode ( " ", $search ); 
$x = 0; 
foreach( $search_exploded as $search_each ) {
	$x++; 
	$construct = "";
	if( $x == 1 ) 
		$construct .="keywords LIKE '%$search_each%'"; 
	else 
		$construct .="AND keywords LIKE '%$search_each%'"; 
	}
	$construct = " SELECT * FROM questions WHERE $construct "; 
	$run = mysqli_query( $construct );
	
	if (mysqli_num_rows($run) == 0) {
	
	 echo "Sorry, there are no matching result for <b> $search </b>. </br> </br> 1. Try more general words. for example: If you want to search 'how to create a website' then use general keyword like 'create' 'website' </br> 2. Try different words with similar meaning </br> 3. Please check your spelling"; 
	}else { echo "$foundnum results found !<p>";
	
	while( $runrows = mysqli_fetch_assoc( $run ) )
		{ $title = $runrows ['ques']; $desc = $runrows ['description'];
	
	echo "<a href='$url'> <b> $title </b> </a> <br> $desc <br> <a href='$url'> $url </a> <p>"; 


  }
                    }
 
 }
 
      // }
 ?>