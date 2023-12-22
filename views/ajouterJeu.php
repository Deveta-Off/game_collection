<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/ajouterJeu.css">
    <title>Ajouter un jeu</title>
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <h1>Ajouter un jeu à sa bibliothèque</h1>
    <form method="post">
        <input type="text" name="search"/>
        <input type="submit" />
    </form>
    <?php
        if($games == null || count($games) <= 0) {
            require('./assets/components/addGameForm.php');
        }else {
            require('./assets/components/addGameForm.php'); //gameList -- Si recherche vide, on affiche le form, sinon la liste
        }
    ?>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>