<?php
session_start();
include "../sections/header.php";
?>
<div id=inventoryPageWrapper>
    <a href="home.php"><div class="back">Tillbaka</div></a>

    <h1>My items</h1>
    <div id=itemWrapper>
        <div id='item'></div>
    </div>
    <div id=itemIconWrapper>
        <div class='itemsIcon'></div>
        <div class='itemsIcon'></div>
        <div class='itemsIcon'></div>
        <div class='itemsIcon'></div>
    </div>

</div>

<?php 
include "../sections/footer.php";
?>