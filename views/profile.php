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
        Mon profil
        <form method="post">
            <?php if ($action == "modify") { ?>
                <input type="hidden" name="sendChanges" />
                <input type="text" name="newName" value=<?php echo $user_infos['name_user']; ?> />
                <input type="text" name="newSurname" value=<?php echo $user_infos['surname_user']; ?> />
                <input type="text" name="newMail" value=<?php echo $user_infos['email_user']; ?> />
                <input type="text" name="pass" required />
                <input type="text" name="confirmPass" required />
            <?php } ?>
            <button type="submit" name="action" value="modify"><?php echo $action != "modify" ? "Modifier mon compte" : "Modifier" ?></button>
            <button type="submit" name="action" value="delete">Supprimer mon compte</button>
        </form>
    </div>
    <?php require './assets/components/footer.php'; ?>
</body>

</html>