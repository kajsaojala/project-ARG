<?php
session_start();
include "sections/header.php";
?>

		<div id="indexWrapper">
			<div id="indexLogotyp">LOGGA</div>
			
			<div id="textIndex">
				<h1>TELLUS</h1>
				<p id="infoText">INFO</p>
			</div>

			<div id="buttonsIndex">
				<button id="loginBtn">Log in</button>
				<button id="registerBtn">Register</button>
			</div>

			<div id="popupLogin" class="popupIndex popup">
				<form id="loginForm" class="popupForm flexCenter" action="/admin/login.php" method="POST">
					<h2 class="formTitle">Log in<span id="closeLogin"> x</span></h2>

					<?php if (isset($_GET["error"])) { ?>
					<p class="error">Oh no, invalid username or password, please try again!</p>
					<?php } ?>
								
					<p class="formSmallTitle">Email</p>
					<input type="text" name="email" placeholder="Enter your email"><br>
					<p class="formSmallTitle">Password</p>
					<input type="password" name="password" placeholder="Enter your password"><br>
					<button type="submit">Log in</button>
				</form>
			</div>

			<div id="popupRegister" class="popupIndex popup">
				<form id='register' class="popupForm flexCenter">
					<h2 class="formTitle">Register<span id="closeRegister"> x</span></h2>
					<p id=feedback></p>
					<p class="formSmallTitle">Email</p>
					<input type="text" name="regEmail" placeholder="Email" id="regEmail">
					<p class="formSmallTitle">Password</p>
					<input type="text" name="regPassword" placeholder="Passsword" id="regPassword">
					<button type="submit">Register</button>
				</form>
			</div>

		</div>

		<script src="js/index.js"></script>
		<script src="js/register.js"></script>
    </body>
</html>