<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PapayeVapeur</title>
    <link rel="stylesheet" href="./assets/styles/homepage.css">
    <link rel="stylesheet" href="./assets/styles/components/header.css">
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <div class="homepage-header">
        <h1>
            SALUT <?php echo $isLoggedIn ? $_SESSION['lastname'] : "" ?>
            <br> PRÊT A AJOUTER DES
            <br> JEUX A TA COLLECTION ?
        </h1>
    </div>
    <h1>
        Home
    </h1>
</body>

</html>