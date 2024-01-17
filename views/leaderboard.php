<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/leaderboard.css">
    <title>Document</title>
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <div class="page-content">
        <div id="leaderboard">
            <h1>Classement</h1>
            <table>
                <tr>
                    <th>Joueur</th>
                    <th>Temps passé</th>
                    <th>Jeu favori</th>
                </tr>
                <?php foreach ($leaderboard as $row) { ?>
                    <tr>
                        <td><?php echo ($row['name_user'] . " " . $row['surname_user']); ?></td>
                        <td><?php echo $row['hours_played_game'] . " h"; ?></td>
                        <td><?php echo $row['name_game']; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>