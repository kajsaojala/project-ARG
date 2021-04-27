<?php 
session_start();
include "../sections/header.php";
?>
<div id=homePageWrapper>
    <a class=navLink href='/admin/logout.php' class='logout'>Log out</a>
    <div id="mainview">
        <div id="mainview-top">
            <div class="top-box t-left">
                <div id="circle">Progress</div>
            </div>
            <div class="top-box t-right">
                <h1 id="top-time">13:37</h1>
                <h1 id="top-year">2130</h1>
                <h1 id="top-cord">8'24' 25.0848' N</h1>
            </div>
        </div>
        <div id="mainview-items">
            <div class="item-1 item-box"></div>
            <div class="item-2 item-box"></div>
            <div class="item-3 item-box"></div>
            <div class="item-4 item-box"></div>
            <div class="item-5 item-box"></div>
        </div>
        <div id="mainview-map">
            <div id="map-div"></div>
        </div>
        <div id="mainview-menu">
            <a href="#"><div class="b1 menu-button"></div></a>
            <a href="#"><div class="b2 menu-button"></div></a>
            <a href="#"><div class="b3 menu-button"></div></a>
        </div>
    </div>
</div>
<?php 
include "../sections/footer.php";
?>