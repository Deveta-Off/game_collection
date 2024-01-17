<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapayeVapeur</title>
    <link rel="stylesheet" href="./assets/styles/homepage.css">
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <div class="homepage-header">
        <h1>
            SALUT <?php echo $userName; ?>
            <br> PRÊT A AJOUTER DES
            <br> JEUX A TA COLLECTION ?
        </h1>
    </div>
    <div class="page-content">
        <h1>Mes jeux</h1>
        <?php
        if ($isLoggedIn) {
            require './assets/components/gameList.php';
        } else { ?>
            <p>Connecte toi pour voir ta collection</p>
        <?php }        ?>

    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>