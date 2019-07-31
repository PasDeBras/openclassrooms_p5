<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="bloc_page">
            <header id="header">
                <div id="logo_container">
                    <div id="logo"><img src="css/media/beewatch_logo_mobile.png" alt="BeeWatch logo"></div>
                    <div id="logo_fat"><img src="css/media/beewatch_logo.png" alt="BeeWatch logo"></div>
                </div>

                <nav class="menu_gobal">
                    <ul>
                        <li><a href="index.php">Mission</a></li>
                    </ul>
                </nav>
                <nav class="menu_user">
                    <ul>
                        <li><a href="index.php?action=auth_start">Se connecter / creer mon compte</a></li>
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
