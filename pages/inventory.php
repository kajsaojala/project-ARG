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
                <h1 class="mainTitle">My items</h1>
                <div id=itemWrapper>
                    <div id='fullItem'></div>
                </div>
                <div id=inventory-items>
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
            </div>

        </div>

        <script>
            let userID = <?php echo json_encode($_SESSION["userID"], JSON_HEX_TAG);?>;
        </script>
        <script src='/admin/portalArr.js'></script>
        <script src="/js/inventory.js"></script>
        <script src="/js/common.js"></script>
        <script src="/js/functions.js"></script>
    </body>
</html>