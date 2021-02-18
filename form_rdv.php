<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prise de rendez vous</title>
    <link rel="stylesheet" href="rendez_vous.css">
</head>

<body>

    <!-- logo -->
    <div class="logo_quadran">
        <a href="https://www.quadran-immobilier.com/">
            <img src="https://zupimages.net/up/21/07/hg29.jpg" width="180px">
        </a>
    </div>

    <!-- formulaire de prise de rendez vous-->

    <div class="formulaire">
        <?php if (isset($_POST['modifier']) || isset($_POST['ajouter']) || isset($_POST['supprimer'])) {
            header('location:accueil.php');
        }
        ?>
        <!DOCTYPE html>
        <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>prise de rendez-vous</title>
            <link rel="stylesheet" href="form_rdv.css">

        </head>

        <body>
            <div class="titre">
                <h1>faire une demande de rendez-vous</h1>
            </div>
            <div class="demande_rdv">
                <form action="#" method="post" class="form">
                    <h3>numéro du mandat
                        <input type="text" name="numéro_mandat">
                        <h3>nom
                            <input type="text" name="nom">
                            <h3>prenom
                                <input type="text" name="prenom">
                                <h3>email
                                    <input type="text" name="email">
                                    <h3>numéro
                                        <input type="text" name="numéro">
                                    </h3>
                                    <h3>nom du conseiller souhaiter
                                        <input type="text" name="nom_du_conseiller">
                                    </h3>
                                    <form action="accueil_demande_valider.php">
                                        <button name="ajouter" class="button">
                                            envoyer ma demande
                                        </button>
                                    </form>
            </div>

            <?php

            // faire une demande de rendez-vous

            $bdd = new PDO('mysql:host=localhost;dbname=quadran;charset=utf8', 'admin', 'Simplon974&');
            $reponse = $bdd->query('SELECT * FROM formulaire_rdv');
            if (!empty($_POST['numéro_mandat']) & !empty($_POST['nom']) & !empty($_POST['prenom']) & !empty($_POST['email']) & !empty($_POST['numéro']) & !empty($_POST['nom_du_conseiller'])) {

                $requete = 'INSERT INTO formulaire_rdv VALUES(NULL, "' . $_POST['numéro_mandat'] . '", "' . $_POST['nom'] . '", "' . $_POST['prenom'] . '", "' . $_POST['email'] . '","' . $_POST['numéro'] . '" , "' . $_POST['nom_du_conseiller'] . '")';
                $resultat = $bdd->query($requete);
            }


            ?>
        </body>

        </html>