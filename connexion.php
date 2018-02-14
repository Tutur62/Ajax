<?php
session_start();
require ('config.db.php');
$pseudo = $_POST['pseudo'];
    if(empty($pseudo)){
        echo "erreur 2";
    }
    else{
        $bdd = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user);
        $query=$bdd->prepare('SELECT pseudo FROM utilisateur WHERE pseudo = :pseudo');
        $query->bindValue(':pseudo',$pseudo);
        $query->execute();
        $data=$query->fetchAll();
        if(count($data)==0){
            header("location:accueil.php");
        }
        else{
                $_SESSION['pseudo']=$pseudo;
                header("location:mur.php");
            }
        }
?>