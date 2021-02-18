<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>demande de rendez-vous</title>
    <link rel="stylesheet" href="demande_rdv.css">
</head>

<body>

</body>

</html>
<div>
    <p>vos demande de rendez-vous pour visiter un bien</p>
</div>
<?php

// afficher les donnes de la table

$bdd = new PDO('mysql:host=localhost;dbname=quadran;charset=utf8', 'admin', 'Simplon974&');
$reponse = $bdd->query('SELECT * FROM formulaire_rdv');
while ($donnees = $reponse->fetch()) {
    echo '<form class="affichage" action="#" method="post">';
    echo '<h3>numéro du mandat : ';
    echo '</h3>';
    echo $donnees['numéro_mandat'] . '<br>';
    echo '<h3>nom : ';
    echo '</h3>';
    echo $donnees['nom'] . '<br>';
    echo '<h3>prenom : ';
    echo '</h3>';
    echo $donnees['prenom'] . '<br>';
    echo '<h3>email : ';
    echo '</h3>';
    echo $donnees['email'] . '<br>';
    echo '<h3>numéro de tel : ';
    echo '</h3>';
    echo $donnees['numéro'] . '<br>';
    echo '<h3>nom du conseiller souhaiter : ';
    echo '</h3>';
    echo $donnees['nom_du_conseiller'] . '<br>';
}
?>