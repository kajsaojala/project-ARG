<?php
// Här förstörs sessionen och skickar tillbaka användaren till index.php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["userID"]);
unset($_SESSION["level"]);
session_destroy();
header("Location: /index.php");
exit();
?>