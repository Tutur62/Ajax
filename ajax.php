<?php
require ('config.db.php');
$texte = $_POST['msg'];
$date = date('Y-m-d');
    $bdd = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user);
    $req = $bdd->prepare('Insert Into fac_message(mes_texte,mes_dates) values (:message,:date)');
    $req->bindParam(':date', $date);
    $req->bindParam(':message', $texte);
    if (!empty($texte)) {
    $req->execute();
    }
    $sth = $bdd->prepare('SELECT * from fac_message order by mes_dates desc,mes_id');
    $sth->execute(array());
    $select = $sth->fetchAll();
    foreach ($select as $s){
        echo "<div class='fond'><h6>".$s['mes_dates']."</h6><textarea class='msg' disabled>".$s['mes_texte']."</textarea></div>";
    }
?>
