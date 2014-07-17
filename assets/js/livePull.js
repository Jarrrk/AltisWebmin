var failed = 0; 
var limit_failed = 5;
(
	function updatePlayers( waitTime ){

		waitTime = waitTime || 1000;

 		setTimeout(function(){
 			$.ajax(
 			{
 				url: '../assets/php/retrieveDBSchema.php',
 				success: function(response){
 					$('#table-loading').remove();
 					$('#table-section').html(response);
 					updatePlayers();
 		       },
 		       error: function(){           
 		       		if(++failed < limit_failed){
 		       			waitTime += 1000;
 		       			updatePlayers(waitTime);
 		       		}
 		       }
 		   });
 		}, waitTime);
	}
)();