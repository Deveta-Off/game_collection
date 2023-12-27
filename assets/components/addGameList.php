<link rel="stylesheet" href="./assets/styles/components/addGameList.css">
<h1>Jeux trouvés</h1>
<div class="games">
<?php foreach ($games as $game) {
    $platforms = getPlatforms($game["name_game"]);
    $text_platforms = "";
    foreach ($platforms as $platform) {
        $text_platforms .= $platform["name_platform"] . ", ";
    }
    $text_platforms = substr($text_platforms, 0, -2);
?>

    <div class=game>
        <div class="game-image">
            <img src=<?= $game["url_image_game"] ?> alt="" />
        </div>
        <div class="game-infos">
            <h1><?= $game["name_game"] ?></h1>
                <div class="game-platforms">
                    <p><?= $text_platforms ?></p>
                </div>
                <form method="post">
                    <input type="hidden" name="name_game" value="<?= $game["name_game"] ?>" />
                    <input class="btn-game-add" name='submit' type="submit" value="Ajouter à la bibliothèque" />
                </form>
        </div>
    </div>
<?php } ?>
</div>