<?php
session_start();
include "../sections/header.php";
?>
<div id=mapPageWrapper>
    <div class="back">Tillbaka</div>

    <h1>Map</h1>
    <div id=map></div>
    <div id=mapIconsWrapper>
        <div class='icon'></div>
        <div class='icon'></div>
        <div class='icon'></div>
    </div>

</div>

<?php 
include "../sections/footer.php";
?>