<?php
session_start();
include "sections/header.php";
?>

<div id="indexWrapper">
	<div id="indexLogotyp"></div>
	<p>INFO</p>
	<div id="buttonsIndex">
	<a href="pages/login-register.php"><button>Log in</button></a>
		<a href="pages/login-register.php?register"><button>Sign up</button></a>
	</div>

</div>
<?php 
include "sections/footer.php";
?>