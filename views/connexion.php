<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/inscription.css">
    <title>Connexion</title>
</head>

<body>
    <div class="container">
        <form class="inscription" method="post">
            <h2>Connexion</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
        </form>
        <?php
        if (isset($error) && $error !== "") {
            echo $error;
        }
        ?>
    </div>
</body>

</html>