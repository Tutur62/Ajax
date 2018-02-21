<?php
session_start();
require ('config.db.php');
$texte = $_POST['msg'];
$date = date('Y-m-d');
$test = $_SESSION['id'];
$bdd = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user);
$req = $bdd->prepare('Insert Into fac_message2(mes_texte,mes_dates,id_user) values (:message,:date,:id)');
$req->bindParam(':date', $date);
$req->bindParam(':message', $texte);
$req->bindParam(':id', $test);
if (! empty($texte)) {
    $req->execute();
}
$sth = $bdd->prepare('SELECT * from fac_message2 order by mes_dates desc,mes_id');
$sth->execute(array());
$select = $sth->fetchAll();
foreach ($select as $s) {
    foreach ($bdd->query('SELECT pseudo from utilisateur where mes_id=' . $s['id_user'], PDO::FETCH_ASSOC) as $row) {
        foreach ($row as $index => $value) {
            $pseudo = $value;
        }
    }
    echo "<div class='fond'><h6>" . $s['mes_dates'] .$pseudo. "</h6><textarea class='msg' disabled>" . $s['mes_texte'] . "</textarea></div>";
}
?>
