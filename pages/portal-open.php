<?php 
session_start();
include "../sections/header.php";
?>
    <div class="portalWrapper">
        <a href="portal.php"><-</a>
        <div id="portalContainer" class="flexCenter">
            <h2 class="openPortalTitle">Portal</h2>
            <h3 id="portalYear">0000 - 0000</h3> <!--ska komma från js?-->
            <button id="portalGoBtn">GO</button>
        </div>

        <div id="receivedContainer">
            <h2 class="receivedTitle">Received in this portal</h2>
            <!--Här ska det ske en check vilka meddelanden spelaren har fått beroende på om portalen öppnats tidigare-->
            <!--om spelaren ej har öppnat portalen innan-->
            <p>Nothing received yet</p>
            <!--Annars skapa meddelanden utifrån databasen, i js?..-->
        </div>

        <div id="collectBtn"><span id="plus">+ </span><span>Collect item</span></div>
    </div>

<?php 
include "../sections/footer.php";
?>