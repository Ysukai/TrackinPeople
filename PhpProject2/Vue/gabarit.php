<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <base href="<?= $racineWeb?>">
        <link href="Contenu/main.css" rel="stylesheet" />
        <title><?= $titre?></title>
    </head>
    <body>
        <div id="topBar">
            <div id="topText"><a href=""><h1 id="titre"><?= $titre ?></h1></a></div>
        </div>
        <?php
        if(isset($login) && $login != ""){
            echo "<form action=connexion/deconnecter>";
            echo "<button>Déconnecter</button>";
            echo "</form><br/>" . $login;
        }else{
            echo "<form action=connexion>";
            echo "<button>Se connecter</button>";
            echo "</form><br/>";
        }
        ?>
        <?= $contenu ?>
    </body>
</html>