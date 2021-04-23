<?php
session_start();
include "../sections/header.php";
?>
<div>
    <form id='register'>
        <input type="text" name="regEmail" placeholder="Email" id="regEmail">
        <input type="text" name="regPhone" placeholder="Phone" id="regPhone">
        <input type="text" name="regPassword" placeholder="Passsword" id="regPassword">
        <button id="register" type="submit">Register</button>
    </form>
</div>

<?php 
include "../sections/footer.php";
?>