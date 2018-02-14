<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Mur type facebook</title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>

<body>
	<div id="boite">
		<form method="POST">
		<?php 
		session_start();
		echo "Mur de ";
		echo $_SESSION['pseudo'];
		?>
			<textarea id="texte" placeholder="Exprimez-vous…"></textarea>
			<input id="bouton" type="button" value="Publier" />
		</form>
	</div>
	<div id="messages">
	</div>
</body>
</html>