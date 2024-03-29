<?php

	$sessionConnected = $_SESSION['Connected']??false;
	$sessionValid = $_SESSION['Valid']??false;

	if($sessionConnected) {
		$linkLogin = '<a href="/Logout">Deconnexion</a>';

		if($sessionValid && $sessionValid == "1") {
			$linkAdmin = '<li class="menu__link"><a href="/home/admin">Administration</a></li>';
		}
	} 
	else {
		$linkLogin = '<a href="/Login">Connexion </a>/<a href="/Registration"> Inscription</a>';
	}
?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>projet 5</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=delete">
		<link href="/Css/style.css" rel="stylesheet">
	</head>

	<body>
		<?php if(isset($message)) { echo $message; } ?>
		<header id="header">
			<nav class="nav__container">
				<ul class="menu">
					<li class="menu__link"><a href="/">Accueil</a></li>
					<li class="menu__link"><a href="/listPost">Articles</a></li>
					<?php if(isset($linkAdmin)) echo $linkAdmin ?>
					<li class="menu__link"><?php if(isset($linkLogin)) echo $linkLogin ?></li>
				</ul>
			</nav>
		</header>

		<?= $content; ?>

		<footer id="footer">

		</footer>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript" src="/Js/script.js"></script>
	</body>
</html>