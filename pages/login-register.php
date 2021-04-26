<?php
session_start();
include "../sections/header.php";
?>
<div id="LoginRegWrapper">

<?php if (isset($_GET["register"])) {?>
	<ul class="tabMenu">
        <li class="tab"><p id="modalLoginBtn">Login</p></li>
		<li class="tab"><p class ="active"id="modalJoinBtn">Sign up</a></li>
    </ul>

<?php } else{?>

	<ul class="tabMenu">
        <li class="tab"><p class ="active" id="modalLoginBtn">Login</p></li>
        <li class="tab"><p id="modalJoinBtn">Sign up</a></li>
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
				<input type="text" name="regEmail" placeholder="Email" id="regEmail">
				<input type="text" name="regPhone" placeholder="Phone" id="regPhone">
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
<?php 
include "../sections/footer.php";
?>