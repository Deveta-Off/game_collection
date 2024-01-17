<div class="games">
    <?php
    $games_account = getUserGamesName();
    foreach ($games as $game) {
        if ($page != "homepage" && in_array($game["name_game"], $games_account)) {
            continue;
        }
        $platforms = getPlatforms($game["name_game"]);
        $text_platforms = "";
        foreach ($platforms as $platform) {
            $text_platforms .= $platform["name_platform"] . ", ";
        }
        $text_platforms = substr($text_platforms, 0, -2);
    ?>
        <?= $page == "homepage" ? '<a href="./edit_game?game=' . $game["name_game"] . '" class=game>' : '<div class=game>' ?>
        <div class="game-image">
            <img src=<?= $game["url_image_game"] ?> alt="" />
        </div>
        <div class="game-infos">
            <div class="game-name-hours">
                <h1><?= $game["name_game"] ?></h1>
                <h4><?= isset($game["hours_played_game"]) ? $game["hours_played_game"] . " h" : "" ?></h4>
            </div>
            <div class="game-platforms">
                <p><?= $text_platforms ?></p>
            </div>
            <?php if ($page != "homepage") { ?>
                <form method="post">
                    <input type="hidden" name="name_game" value="<?= $game["name_game"] ?>" />
                    <input class="btn-game-add" name='submit' type="submit" value="Ajouter à la bibliothèque" />
                </form>
            <?php } ?>
        </div>
        <?= $page == "homepage" ? "</a>" : "</div>" ?>
    <?php } ?>
</div>