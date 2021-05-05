<?php 
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: /index.php");
    exit();
}

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
                <h4 class="receivedTitle">Received in this portal</h2>
                <!--Här ska det ske en check vilka meddelanden spelaren har fått beroende på om portalen öppnats tidigare-->
                <!--om spelaren ej har öppnat portalen innan-->
                <p>Nothing received yet</p>
                <!--Annars skapa meddelanden utifrån databasen, i js?..-->
            </div>

            <div id="collectItemBtn" class="flexCenter"><span id="plus">+ </span><span>Collect item</span></div>
            <div id="collectBox" class="flexCenter">
                <h3 class="collectTitle">Collect item</h3>
                <div id="collectInputContainer">
                    <p>Item code</p>
                    <input type="text" id="collectInput" placeholder="item code">
                </div>
                <button id="collectBtn">Collect</button>
            </div>
        </div>
        <script src="/js/portal.js"></script>
    </body>
</html>