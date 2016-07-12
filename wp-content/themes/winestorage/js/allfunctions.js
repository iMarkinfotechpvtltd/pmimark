/* POP UP Map */
jQuery(function () {
	
    jQuery("#myModal").on("shown.bs.modal", function(e) {
        				
				var myLatlng = new google.maps.LatLng(49.31995, -123.098594);
                var mapOptions = {
                    center: myLatlng,
                    zoom: 17,
					scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(jQuery("#map-canvas")[0], mapOptions);
				var marker = new google.maps.Marker({
					position: myLatlng,
					title:"Location"
				});
					 
				var contentString = '<p style="min-width:100px;display:block;">Griffin Business Centre,100,901 3rd St W,<br>North Vancouver, BC V7P 3P9<br/><a href="https://www.google.com/maps/place/Griffin+Business+Centre/@49.321055,-123.096856,15z/data=!4m2!3m1!1s0x0:0x9869e111951b9186?hl=en-US" target="_blank">View Larger Map </a>&nbsp;<a target="_blank" href="https://www.google.com/maps/place/Griffin+Business+Centre/@49.321055,-123.096856,15z/data=!4m2!3m1!1s0x0:0x9869e111951b9186?hl=en-US"> Directions </a>';

				var infowindow = new google.maps.InfoWindow({
				  content: contentString
			  });

				 google.maps.event.addListener(marker, 'click', function() {
				  infowindow.open(map,marker);
				});

				infowindow.open(map,marker);
				marker.setMap(map);

    });
	
});	