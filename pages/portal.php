<?php 
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: /index.php");
    exit();
}

include "../sections/header.php";
?>

        <div class="portalWrapper">
            <a href="home.php"><-</a>

            <div id="portalContainer" class="flexCenter">
                <h2 class="portalTitle">Open Portal</h2>
                <p class="portalCoord">60.1282° N 18.6435° E</p>
                <p class="codeText">Enter code</p>
                <div id="codeContainer" class="flexCenter">
                    <input type="text" id="inputCode">
                </div>
                <a href="portal-open.php" id="openPortalBtn" class="flexCenter">OPEN</a>
            </div>

            <div id="openPortalsContainer">
                <div class="openPortalTitle">
                    <h3>My open portals</h3>
                    <div id="infoButton" class="flexCenter">i</div>
                </div>
                <!--Här ska det ske en check vilka portaler spelaren har öppnat-->
                <!--om spelaren ej har öppnat någon portal-->
                <div id="openPortals"></div>
                <!--Annars skapa utifrån databasen, i js?..-->
            </div>
        </div>
        <script>
            let userID = <?php echo json_encode($_SESSION["userID"], JSON_HEX_TAG);?>;
            let userLevel = <?php echo json_encode($_SESSION["level"], JSON_HEX_TAG);?>;
        </script>  
        <script src='/admin/portalArr.js'></script>
        <script src='/js/classes.js'></script>
        <script src="/js/functions.js"></script>
        <script src="/js/portal.js"></script>
    </body>
</html>