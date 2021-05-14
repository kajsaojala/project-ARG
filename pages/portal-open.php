<div class="openPortalWrapper">
    <a href="portal.php" id="exitPortal">Exit portal</a>
    <div id="portalContainer" class="flexCenter">
        <h2 class="openPortalTitle">Portal</h2>
        <h3 id="portalYear"></h3> <!--får sitt innehåll i js-->
        <button id="portalGoBtn">GO</button>
    </div>

    <!--<div id="receivedContainer">
        <h4 class="receivedTitle">Received in this portal</h2>
        <!--Här ska det ske en check vilka meddelanden spelaren har fått beroende på om portalen öppnats tidigare-->
        <!--om spelaren ej har öppnat portalen innan-->
        <!--<p>Nothing received yet</p>
        <!--Annars skapa meddelanden utifrån databasen, i js?..-->
    <!--</div>-->

    <div id="collectItemBtn" class="collectItemBtnBig flexCenter"><span id="plus">+ </span><span>Collect item</span></div>
    <div id="collectBox" class="flexCenter">
        <div id="closeCollect">x</div>
        <h3 class="collectTitle">Collect item</h3>
        <div id="collectInputContainer">
            <p>Item code</p>
            <input type="text" id="collectInput" placeholder="item code">
        </div>
        <button id="collectBtn">Collect</button>
    </div>
    <div id="collectFeedbackBox">
        <p id="collectFeedback"></p>
        <button id="okFeedback">OK</button>
    </div>
</div>
<script>
    let portalID = <?php echo json_encode($_GET["openPortal"], JSON_HEX_TAG);?>;
</script>  