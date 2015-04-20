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

function postToWall( fb_user_id, fb_user_token, message ){
	FB.api(
	    "/" + fb_user_id + "/feed",
	    "POST",
	    {
	        "message": message,
	        access_token: fb_user_token
	    },
	    function (response) {
	      if (response && !response.error) {
	        /* handle the result */
	      }
	      console.log(response);
	    }
	);
}// postToWall