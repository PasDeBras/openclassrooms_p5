<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <div id="bloc_page">
            <header>
                <div id="logo"><img src="" alt="Logo"></div>
                <nav class="menu_gobal">
                    <ul>
                        <li><a href="index.php">accueil</a></li>
                        <li><a href="index.php?action=hiveMap_All">Carte</a></li>
                        <li><a href="index.php?action=hiveMap_Account">Mes ruches</a></li>
                        <li><a href="">Mission</a></li>
                    </ul>
                </nav>
                <?php
                if (!empty($_SESSION['user_username'])) {
                    ?>
                <nav class="menu_user">
                    <ul>
                        <li><a href="index.php?action=user_Account_Manage">Gerer mon compte : <?= ($_SESSION['user_username'])?></a></li>
                        <li><a href="index.php?action=auth_Verify_Disconnect">Déconnexion : <?= $_SESSION['user_username']?></a></li>
                    </ul>
                </nav>
                <?php
                }
                ?>
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
        <userid><?= $_SESSION['id'] ?></userid>

        <script src="js/map.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL7fnU1p4GrjlTjnu5iT36H4rbBZuWyqs&callback=initMap" async defer></script>
    </body>
</html>
