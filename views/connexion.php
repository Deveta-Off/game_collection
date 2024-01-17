<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/auth.css">
    <title>Connexion</title>
</head>

<body>
    <div class="page-content">
        <form class="auth" method="post">
            <h2>Se connecter à Game Collection</h2>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="./inscription">S'inscrire</a>

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