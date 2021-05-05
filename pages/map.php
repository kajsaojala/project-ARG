<?php
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: /index.php");
    exit();
}

include "../sections/header.php";
?>

        <div class="pageWrapper">
            <a class="navLink backLink" href='home.php'><div id="backBtn"><-</div></a>
            
            <div class="mainview">
                <h1 class="mainTitle">Map</h1>
                <div id="mapWrapper">
                    <div id=map></div>
                </div>
                <div id=map-icons>
                    <div id="mapIcon3" class='mapIcon'></div>
                    <div id="mapIcon2" class='mapIcon'></div>
                    <div id="mapIcon3" class='mapIcon'></div>
                </div>
            </div>

        </div>

        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjE0X9mjCLC6RfP52JpJNvR7-TpMuGhkA&callback=initMap&libraries=&v=weekly"
            async
        ></script>

        <script src="/js/maps.js"></script>
    </body>
</html>