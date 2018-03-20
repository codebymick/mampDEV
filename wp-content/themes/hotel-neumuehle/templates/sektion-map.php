<section id="karte" class="outer">
	<div class="karte">
		<div id="karte-map"></div>
	</div>
	<div class="anfahrt">
		<div class="text">
			<h2>Wo Sie uns Finden</h2>
			<hr>
			<p>Anreise: Von der A3 (Frankfurt a. M. – Würzburg) Ausfahrt Hösbach in Richtung Lohr/Gemünden/Hammelburg. Von der A7 (Kassel – Fulda – Würzburg) Ausfahrt Hammelburg. In Hammelburg-West stadteingangs nach der Brücke links, Richtung Bad Brückenau. An der Ampel (Post) wieder links in Richtung Diebach abbiegen, am Ortsende von Diebach nach links in Richtung Morlesau fahren. Nach 2 km sind Sie am Ziel. </p>
			<p><strong>GPS-Koordinaten: N50° 07’42.00’’ · O9° 49’23.00’’</strong></p>
		</div>
    </div>
</section>

<script>
	function initMap() {
        var myLatLng = {lat: 50.128450, lng: 9.823480};

        var map = new google.maps.Map(document.getElementById('karte-map'), {
          zoom: 15,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Romantik Hotel Neumühle'
        });
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCuV2NEVFo6--2nbz0Zayg3RMLwCsfYzlk&callback=initMap" async defer></script>