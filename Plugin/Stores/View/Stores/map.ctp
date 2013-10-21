<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var infowindow = null;
$(document).ready(function () { initialize();  });

function initialize() {

	var centerMap = new google.maps.LatLng(<?php echo $center_map; ?>);

	var myOptions = {
		zoom: <?php echo $zoom_level; ?>,
		center: centerMap,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}

	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	setMarkers(map, sites);
	infowindow = new google.maps.InfoWindow({
		content: "loading..."
	});

}

var sites = [	
	<?php 
	for ($i=1; $i < sizeof($stores); $i++) {
		$details = '<h4>' . $stores[$i]['Store']['name'] . '</h4>' . $stores[$i]['Store']['address'] . ', ' . $stores[$i]['Store']['postal code'] . ' ' . $stores[$i]['Store']['town'] . ', ' . $stores[$i]['Store']['country'] . '<br>Coordinates: ' . $stores[$i]['Store']['latitude'] . ', ' $stores[$i]['Store']['longitude'];	
		echo "['Click for details', " . $stores[$i]['Store']['latitude'] . ',' . $stores[$i]['Store']['longitude'] . ", ".$i.", '" . $details . "'],";
	} 
	?>
];

function setMarkers(map, markers) {

	for (var i = 0; i < markers.length; i++) {
		var sites = markers[i];
		var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
		var marker = new google.maps.Marker({
			icon: <?php echo $marker_icon; ?>,
			position: siteLatLng,
			map: map,
			title: sites[0],
			zIndex: sites[3],
			html: sites[4]
		});

		var contentString = "Some content";

		google.maps.event.addListener(marker, "click", function (event) {
			infowindow.setContent(this.html);
			infowindow.open(map, this);
		});
		
	}
}
</script>

<div id="map_canvas" style="width: 800; height: 600px;"></div>
