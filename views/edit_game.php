<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapayeVapeur</title>
    <link rel="stylesheet" href="./assets/styles/edit_game.css">
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <div class="page-content">
        <div class="left-div">
            <h1><?= $game["name_game"] ?></h1>
            <p><?= $game["description_game"] ?></p>
            <p>Temps de jeu : <?= $game["hours_played_game"] ?> h</p>
            <h2>Ajouter du temps passé sur le jeu</h2>
            <form method="POST">
                <div class="div-input">
                    <label for="hours_played">Temps passé sur le jeu</label>
                    <input type="number" name="hours_played" required />
                </div>
                <input type="hidden" name="name_game" value="<?= $game["name_game"] ?>" />
                <input class="btn-game-add" name='submit' type="submit" value="Ajouter" />
            </form>
            <form method="POST">
                <input type="hidden" name="name_game" value="<?= $game["name_game"] ?>" />
                <input class="btn-game-add" name='submit' type="submit" value="Supprimer le jeu de ma bibliothèque" />
            </form>
        </div>
        <div class="right-div">
            <img src=<?= $game["url_image_game"] ?> alt="" />
        </div>  
    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>