<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/auth.css">
    <title>Inscription</title>
</head>

<body>
    <div class="page-content">
        <form class="auth" method="post">
            <h2>Inscription</h2>

            <div>
                <label for="firstname">Prénom:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>

            <div>
                <label for="lastname">Nom:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <label for="confirm-password">Confirmer le mot de passe:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>

            <button type="submit">S'inscrire</button>

            <a href="./connexion">Se connecter</a>
        </form>
        <?php
        if (isset($error) && $error !== "") {
            echo $error;
        }
        ?>
    </div>
</body>

</html>