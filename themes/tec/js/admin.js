(function($){
	"use strict";
	$(function(){




		/*------------------------------------*\
			#ON LOAD
		\*------------------------------------*/




		/*------------------------------------*\
			#Triggered events
		\*------------------------------------*/




		/*------------------------------------*\
			#RESPONSIVE
		\*------------------------------------*/

	});
})(jQuery);

function postToWall(){
	console.log('go micho');
	if( typeof published_post_id !== 'undefined' ){
		console.log('go micho');

			FB.api(
			    "/me/feed",
			    "POST",
			    {
			        "message": "This is a test message",
			        access_token: "CAAKC1ebZA3wIBAIyzgdqrJRqGvgUVJDPjkBjx2kXpCghSV4633GFybaC6uGWMhMa3reO99sDxw7LHqZBx9FZA9zrndiZA3NV1O0UFnKvKXWDCmvJ5FZCBiqckgVED6ZCWnwbfz59sxhQ6eHj4OGv7BjoJW9YzZAlFg7cbLLTDi0xAlwq6GZCJeZC6RP9wfNb5kfPdqXfBm7ZAVFcMupOFFfZBXX"
			    },
			    function (response) {
			      if (response && !response.error) {
			        /* handle the result */
			      }
			      console.log(response);
			    }
			);
		
	}
}