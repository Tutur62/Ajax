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
unset($pseudo);
require ('config.db.php');
session_start();
$bdd = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user);
foreach ($bdd->query('SELECT pseudo from utilisateur where mes_id=' . $_SESSION['id'], PDO::FETCH_ASSOC) as $row) {
    foreach ($row as $index => $value) {
        $pseudo = $value;
    }
}
echo "Mur de ";
echo $pseudo;

?>
			<textarea id="texte" placeholder="Exprimez-vous…"></textarea>
			<input id="bouton" type="button" value="Publier" />
		</form>
	</div>
	<div id="messages"></div>
</body>
</html>