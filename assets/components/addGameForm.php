<?php
$platforms = getAllPlatforms();
?>
<link rel="stylesheet" href="./assets/styles/components/addGameForm.css">
<p>Le jeu que vous souhaitez ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement ajouter à votre bibliothèque !</p>
<form method="post">
    <div class="div-input">
        <label for="game_name">Nom du jeu</label>
        <input type="text" name="game_name" placeholder="Nom du jeu" />
    </div>
    <div class="div-input">
        <label for="game_editor">Nom de l'éditeur</label>
        <input type="text" name="game_editor" placeholder="Nom de l'éditeur" />
    </div>
    <div class="div-input">
        <label for="game_release_date">Date de sortie</label>
        <input type="date" name="game_release_date" placeholder="Date de sortie" />
    </div>
    <h2>Plateformes</h2>
    <div class="platforms">
        <?php
        foreach ($platforms as $platform) {
            echo (
                '<div class="platform">
                    <input type="checkbox" name="platforms[]" value="' . $platform['name_platform'] . '" />
                    <label for="platforms[]">' . $platform['name_platform'] . '</label>
                </div>'
            );
        }
        ?>
    </div>
    <div class="div-input">
        <label for="game_description">Description du jeu</label>
        <textarea name="game_description" placeholder="Description du jeu"></textarea>
    </div>
    <div class="div-input">
        <label for="game_image">URL de la cover</label>
        <input type="text" name="game_image" placeholder="Image du jeu" />
    </div>
    <div class="div-input">
        <label for="url_site_game">URL du site</label>
        <input type="text" name="url_site_game" placeholder="URL du site" />
    </div>
    <input class="btn-game-add" name='submit' type="submit" value="Ajouter le jeu" />
</form>