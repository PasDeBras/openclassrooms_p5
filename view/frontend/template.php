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

                <nav class="navbar">
                    <a href="index.php">Accueil</a>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="menuToggle()">Se connecter / creer mon compte</button>
                        <div class="dropdown-content" id="dropDownMenu">
                            <a href="index.php?action=auth_New">Creer mon compte</a>
                            <a href="index.php?action=auth_Verify">Je suis déja membre</a>
                        </div>
                    </div>
                </nav>
            </header>

            <div id="content">
                <?= $content ?>
            </div>
        </div>
        
        
        <script src="js/menu.js"></script>
        <script src="js/formValidator.js"></script>
        <footer>
            <div>
                <p>Créé par Paul Ponnau pour OpenClassrooms dans le cadre du parcours Web Dev<br>Contact & Information: contact@paulponnau.fr.</p>
            </div>
        </footer>
    </body>
</html>
