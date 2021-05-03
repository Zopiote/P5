<?php
	if(isset($_SESSION['Connected'])) {
		$linkLogin = '<a href="/Logout">Deconnexion</a>';
	} 
	else {
		$linkLogin = '<a href="/Login">Connexion </a>/<a href="/Registration"> Inscription</a>';
	} 
?>

<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Titre de la page</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;600&display=swap" rel="stylesheet">
		<link href="Css/style.css" rel="stylesheet">
	</head>

	<body>
		<header id="header">
			<nav class="nav__container">
				<ul class="menu">
					<li class="menu__link"><a href="/">Accueil</a></li>
					<li class="menu__link"><a href="/listPost">Articles</a></li>
					<li class="menu__link"><?php if(isset($linkLogin)) echo $linkLogin ?></li>
				</ul>
			</nav>
		</header>

		<?= $content; ?>

		<footer id="footer">

		</footer>
	</body>
</html>