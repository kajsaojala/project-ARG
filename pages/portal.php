<?php 
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: /index.php");
    exit();
}

include "../sections/header.php";
?>

        <div class="portalWrapper">

            <?php if (empty($_GET)) { ?>
                <a href="home.php"><-</a>

                <div id="portalContainer" class="flexCenter">
                    <h2 class="portalTitle">Open Portal</h2>
                    <!--<p class="portalCoord">60.1282° N 18.6435° E</p>-->
                    <p class="codeText">Enter code</p>
                    <div id="codeContainer" class="flexCenter">
                        <input type="text" id="inputCode">
                    </div>
                    <button id="openPortalBtn" class="flexCenter">OPEN</button>
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
    
                <div id="portalPopup">
                    <div id="closePortalInfo">x</div>
                    <div id="portalPopupInfo">Loading...</div>
                </div>

                <div id="codePopup">
                    <div id="closeCodeInfo">x</div>
                    <div id="codePopupInfo">Your code is incorrect, please try again.</div>
                </div>

                <div id="infoPopup">
                    <div id="closeInfoInfo">x</div>
                    <div id="infoPopupInfo">Too enter a portal you have to be on the right location</div>
                </div>
            <?php } elseif (isset($_GET["openPortal"])) { 
                $portalID = $_GET["openPortal"]; //get id:et
                include "portal-open.php"; //Sidan för när man kommit in på en portal
            } ?>    
        
        </div>
        <script>
            let userID = <?php echo json_encode($_SESSION["userID"], JSON_HEX_TAG);?>;
        </script>  
        <script src='/admin/portalArr.js'></script>
        <script src='/js/gpsUtilities.js'></script>
        <script src='/js/classes.js'></script>
        <script src="/js/portal.js"></script>
        <script src="/js/portal-open.js"></script>
        <script src="/js/functions.js"></script>
    </body>
</html>