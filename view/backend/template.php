<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="bloc_page">
            <header>
                <div id="logo"><img src="" alt="Logo"></div>
                <nav class="menu_gobal">
                    <ul>
                        <li><a href="index.php">accueil</a></li>
                        <li><a href="index.php?action=auth_Verify_Disconnect">Mission</a></li>
                    </ul>
                </nav>
                <nav class="menu_user">
                    <ul>
                        <li><a href="index.php?action=user_Account_Manage">Gerer mon compte : <?= $_SESSION['user_username']?></a></li>
                        <li><a href="">Déconnexion : <?= $_SESSION['user_username']?></a></li>
                    </ul>
                </nav>
            </header>

            <div id="content">
                <?= $content ?>
            </div>
        </div>
        
        

        <footer>
            <div>
                <p>Créé par Paul Ponnau pour OpenClassrooms dans le cadre du parcours Web Dev<br>Contact & Information: contact@paulponnau.fr.</p>
            </div>
        </footer>
    </body>
</html>
