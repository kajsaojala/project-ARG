<?php
session_start();
include "../sections/header.php";
?>

		<div id="logregTopWrapper">
			<div class="logotyp">LOGGA</div>
			<h1>TELLUS</h1>
		</div>
		<div id="LoginRegWrapper">

		<?php if (isset($_GET["register"])) {?>
			<ul class="tabMenu">
				<li id="modalLoginBtn"class="tab"><p>Login</p></li>
				<li id="modalJoinBtn"class="tab active"><p>Sign up</a></li>
			</ul>

		<?php } else{?>

			<ul class="tabMenu">
				<li id="modalLoginBtn"class="tab active"><p>Login</p></li>
				<li id="modalJoinBtn"class="tab"><p>Sign up</a></li>
			</ul>
		<?php }?>


			<div id="contentWrapper">
				<!-- LOGIN-->
				<div id=loginWrapper class="logreg">
					<form id="login" action="/admin/login.php" method="POST">
						<h2 class="formTitle">Log in</h2>

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

				
				<!--REGISTER-->
				<div id="registerWrapper" class="logreg">
					<form id='register'>
						<h2 class="formTitle">Sign up</h2>
						<p id=feedback></p>
						<p class="formSmallTitle">Email</p>
						<input type="text" name="regEmail" placeholder="Email" id="regEmail">
						<p class="formSmallTitle">Phone number</p>
						<input type="text" name="regPhone" placeholder="Phone" id="regPhone">
						<p class="formSmallTitle">Password</p>
						<input type="text" name="regPassword" placeholder="Passsword" id="regPassword">
						<button id="register" type="submit">Register</button>
					</form>
				</div>
				<?php if (isset($_GET["register"])) {?>
					<script>
						document.getElementById('loginWrapper').style.cssText = 'display: none;';
						document.getElementById('registerWrapper').style.cssText = 'display: block;';
					</script>
				<?php } ?>
				
			</div>
		</div>

		<script src="/js/register.js"></script>
    </body>
</html>