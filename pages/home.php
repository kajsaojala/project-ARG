<?php 
session_start();

if (!isset($_SESSION["userID"])) {
    header("Location: /index.php");
    exit();
}

date_default_timezone_set("Europe/Stockholm"); // Ger rätt tidszon för server.log
$timeStamp = date("H:i"); //Inbyggd funktion php

include "../sections/header.php";
?>
        <div class=pageWrapper>
            <a class="navLink" href='/admin/logout.php'><div id="logoutBtn"></div></a>
            <div class="mainview">

                <?php include "../sections/collectBtn.php"; ?>

                <div id="mainview-top">
                    <div class="top-box t-left">
                        <div id="circle">
                            <div id="innerCircle">
                                <div class="quarter" id="quarter1"></div>
                                <div class="quarter" id="quarter2"></div>
                                <div class="quarter" id="quarter3"></div>
                                <div class="quarter" id="quarter4"></div>
                                <div id="progress" class="cutout">0%</div>
                            </div> <!--Procent ska kännas av beroende på nivå-->
                        </div>
                    </div>
                    <div class="top-box t-right">
                        <h1 id="top-time"><?php echo $timeStamp;?></h1>
                        <h1 id="top-year">2021</h1> <!--året ska ändras beroende på om man står i portal-->
                        <!--<h1 id="top-cord">55°36'21.13" N 13°00'2.63" E</h1>-->
                    </div>
                </div>
                <div id="mainview-items">
                    <div class="item-box flexCenter">
                        <div id="item-1" class="itemSmallPng" style='background-image: url("/images/items/id-card.png");'></div>
                    </div>
                    <div class="item-box flexCenter">
                        <div id="item-2" class="itemSmallPng"></div>
                    </div>
                    <div class="item-box flexCenter">
                        <div id="item-3" class="itemSmallPng"></div>
                    </div>
                    <div class="item-box flexCenter">
                        <div id="item-4" class="itemSmallPng"></div>
                    </div>
                    <div class="item-box flexCenter">
                        <div id="item-5" class="itemSmallPng"></div>
                    </div>
                </div>
                <div id="mainview-map">
                    <div id="map-div"></div>
                </div>
                <div id="mainview-menu">
                    <a href="inventory.php" id="inventoryBtn"><div class="b1 menu-button">I</div></a>
                    <a href="portal.php"><div class="b2 menu-button">P</div></a>
                    <a href="map.php"><div class="b3 menu-button">M</div></a>
                </div>
            </div>
        </div>
        <script>
            let userID = <?php echo json_encode($_SESSION["userID"], JSON_HEX_TAG);?>;
        </script>  

        <script src='/admin/portalArr.js'></script>
        <script src="/js/home.js"></script>
        <script src="/js/common.js"></script>
        <script src="/js/functions.js"></script>
    </body>
</html>