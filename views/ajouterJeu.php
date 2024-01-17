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
    <div class="page-content">
        <h1>Ajouter un jeu à sa bibliothèque</h1>
        <?php
        if ($games == null || count($games) <= 0) {
            require('./assets/components/addGameForm.php');
        } else {
            echo (
                '<form class="form-search" method="post">
                <input type="text" name="search" placeholder="Rechercher un jeu"/>
                <input type="submit" value="RECHERCHER" />
            </form>'
            );
            if ($search != "") {
        ?>
                <h1>Jeux trouvés</h1>
        <?php
            }

            require('./assets/components/gameList.php'); //gameList -- Si recherche vide, on affiche le form, sinon la liste
        }
        ?>
    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>