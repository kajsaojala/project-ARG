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
                    <div id="inventory-item1" class='item-box'></div>
                    <div id="inventory-item2" class='item-box'></div>
                    <div id="inventory-item3" class='item-box'></div>
                    <div id="inventory-item4" class='item-box'></div>
                </div>
            </div>

        </div>

        <script src="/js/inventory.js"></script>
    </body>
</html>