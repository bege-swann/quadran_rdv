<?php
if (isset($_POST['button']) & !empty($_POST['password']) & !empty($_POST['nom']) & !empty($_POST['prenom']) & !empty($_POST['email'])) {

    $bdd = new PDO('mysql:host=localhost;dbname=quadran;charset=utf8', 'admin', 'Simplon974&');
    $reponse = $bdd->query('SELECT * FROM sidentifier WHERE nom = "' . $_POST['nom'] . '"');
    while ($donnees = $reponse->fetch()) {
        $mdp = $donnees['password'];
        $nom = $donnees['nom'];
        $prenom = $donnees['prenom'];
        $email = $donnees['email'];
    }
    $mdpok =  password_verify($_POST['password'], $mdp);
    if (!$mdpok) {
        echo 'mauvais mot de passe';
    } else {
        //Si le mot de passe correspond, crée une session et récupérer les données de l'utilisateur 
        //puis le rediriger vers la page d'espace membre
        if ($mdpok) {
            session_start();
            $_SESSION['password'] = $mdp;
            $_SESSION['nom'] = $mdp;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            header('location:accueil_admin.php');
        } else {
            echo 'Mauvais identifiants ou mot de passe';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="connexion.css">
     <!-- police -->

     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@500&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Asap:ital,wght@1,500&display=swap" rel="stylesheet">
</head>

<body>

    <div class="login-form">
        <div class="logo_quadran">
            <img src="https://zupimages.net/up/21/07/dy8u.png" width="250px">
        </div>
        <h2 class="titre">
            Connexion
        </h2>
        <div class="form_groupe">
            <form action="" method="POST">

                <div class="form_groupe">
                    <label for="nom">Nom
                        <input id="nom" type="text" name="nom" class="form1" required="required" autocomplete="off">
                    </label>
                </div>
                <div class="form_groupe">
                    <label for="prenom">Prenom
                        <input id="prenom" type="text" name="prenom" class="form1" name="nom" required="required" autocomplete="off">
                    </label>
                </div>
                <div class="form_groupe">
                    <label for="password">Mot de passe
                        <input id="password" type="password" name="password" class="form1" required="required" autocomplete="off">
                    </label>
                </div>
                <div class="form_groupe">
                    <label for="email">Email
                        <input id="email" type="email" name="email" class="form1" required="required" autocomplete="off">
                    </label>
                </div>
                <button class="valider" name="button">
                    valider
                </button>
        </div>
        </form>

</body>

</html>