<div class="header">
    <h1>Logo</h1>
    <div class="links">
        <a href="./">MA BIBLIOTHEQUE</a>
        <a href="./ajouterJeu">AJOUTER UN JEU</a>
        <a href="./leaderboard">CLASSEMENT</a>
        <a href=<?php echo $isLoggedIn ? "./profile" : "./connexion" ?>><?php echo $isLoggedIn ? "PROFIL" : "CONNEXION" ?></a>
    </div>
</div>