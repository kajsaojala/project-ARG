<?php
session_start();
include "../sections/header.php";
?>
<div id="mapPageWrapper">
    <a href="home.php"><div class="back">Tillbaka</div></a>

    <h1>Map</h1>
    <div id="map"></div>
    <div id="mapIconsWrapper">
        <div class='icon'></div>
        <div class='icon'></div>
        <div class='icon'></div>
    </div>

</div>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjE0X9mjCLC6RfP52JpJNvR7-TpMuGhkA&callback=initMap&libraries=&v=weekly"
      async
></script>

<?php 
include "../sections/footer.php";
?>