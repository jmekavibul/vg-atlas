<?php 
	session_start();
	if (!is_null($_SESSION['userId'])) {
		header("Location: http://localhost:9999/home.php"); /* Redirect browser */
	}
?>
<html lang="en">
   <head>
      <link rel="stylesheet" href="./Assets/reset.css" />
      <link rel="stylesheet" href="./Assets/styles.css" />
		<link rel="icon" href="./Assets/favicon.ico" />
		<style>
			div.login-form {
				background-color: white;
				width: min-content;
				box-shadow: 3pt 3pt 10pt gray;
				padding: 12pt;
				text-align: center;
				position: fixed;
				top: 50%;
				left: 50%;
				transform: translateY(-50%) translateX(-50%);
			}
			div.login-form input[type=submit] {
				width: 100%;
				background-color: dodgerblue;
				color: white;
			}
			div.login-form input {
				margin: 4pt 0pt;
			}
			a.signup-redirect {
				font-size: 7pt;
				
			}

		</style>
	</head>
   <body>
   		<?php
			$actionLinks = Array(
				"login.php" => "Login",
				"signup.php" => "Signup"
			);
			if (!is_null($_SESSION['userId'])) {
				$actionLinks = Array(
					"./Helpers/logout.php" => "Sign Out"
				);
			}
         	$pkg = Array(
            	"title" => "BackLog",
					"title_url" => "dashboard.php",
					"links" => Array(
						"maps.php" => "Maps",
						"create.php" => "Create"
					),
				"activeLink" => "",
               	"actionLinks" => $actionLinks
            );
        	include("./Components/header/header.php");
      	?>
		<div class="max-inline">
			<?php
				if ($_GET["redirect"]) {
					echo '<h1>you goofed, try again bozo</h1>';
				}
			?>
			<div class="login-form">
				<form action="./Helpers/submitLogin.php" method="POST">
					<input required type="text" placeholder="username" name="username">
					<input required type="password" placeholder="password" name="password">
					<input type="submit" value="Log In">
					<a href="./signup.php" class="signup-redirect">Don't have an account?</a>
				</form>
			</div>
		</div>
   </body>
</html>
