<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/inscription.css">
    <title>Inscription</title>
</head>

<body>
    <div class="container">
        <form class="inscription" method="post">
            <h2>Inscription</h2>

            <label for="firstname">Prénom:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="lastname">Nom:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <button type="submit">S'inscrire</button>
        </form>
        <?php
        if (isset($error) && $error !== "") {
            echo $error;
        }
        ?>
    </div>
</body>

</html>