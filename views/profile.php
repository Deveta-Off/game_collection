<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/profile.css">
    <title>Mon Profil</title>
</head>

<body>
    <?php require './assets/components/header.php'; ?>
    <div class="page-content">
        <h1>Mon profil</h1>
        <form method="post" class="modifyAccountForm">
            <?php if ($action == "modify") { ?>
                <input type="hidden" name="sendChanges" />
                <div>
                    <label for="newName">Nom</label>
                    <input type="text" name="newName" value=<?php echo $user_infos['name_user']; ?> />
                </div>
                <div>
                    <label for="newSurname">Prénom</label>
                    <input type="text" name="newSurname" value=<?php echo $user_infos['surname_user']; ?> />
                </div>
                <div>
                    <label for="newMail">Email</label>
                    <input type="text" name="newMail" value=<?php echo $user_infos['email_user']; ?> />
                </div>
                <div>
                    <label for="newPass">Mot de passe</label>
                    <input type="text" name="pass" required />
                </div>
                <div>
                    <label for="confirmPass">Confirmer le mot de passe</label>
                    <input type="text" name="confirmPass" required />
                </div>
            <?php } else { ?>
                <p>Nom : <?php echo $user_infos['name_user']; ?></p>
                <p>Prénom : <?php echo $user_infos['surname_user']; ?></p>
                <p>Email : <?php echo $user_infos['email_user']; ?></p>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <button type="submit" name="action" value="modify"><?php echo $action != "modify" ? "Modifier mon compte" : "Modifier" ?></button>
            <button type="submit" name="action" value="delete">Supprimer mon compte</button>
            <button type="submit" name="action" value="logout">Se déconnecter</button>
        </form>
    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>