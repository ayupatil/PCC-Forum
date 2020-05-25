$(document).ready(function(){

// if the user clicks on the like button ...
$('.like-btn').on('click', function(){
  var qid = $(this).data('id');
  $clicked_btn = $(this);
  if ($clicked_btn.hasClass('blue-text')) {
  	action = 'like';
  } else if($clicked_btn.hasClass('red-text')){
  	action = 'unlike';
  }
  $.ajax({
  	url: 'index.php',
  	type: 'post',
  	data: {
  		'action': action,
  		'qid': qid
  	},
  	success: function(data){
  		res = JSON.parse(data);
  		if (action == "like") {
  			$clicked_btn.removeClass('blue-text');
  			$clicked_btn.addClass('red-text');
  		} else if(action == "unlike") {
  			$clicked_btn.removeClass('red-text');
  			$clicked_btn.addClass('blue-text');
  		}
		
  		
  	}
  });		

});
});