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
                    <a href="index.php?action=hiveMap_All">Carte</a>
                    <a href="index.php?action=Members">Annuaire</a>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="menuToggle()">Mon compte</button>
                        <div class="dropdown-content" id="dropDownMenu">
                            <?php
                            if (!empty($_SESSION['user_username'])) 
                            {?>
                                <a href="index.php?action=hiveMap_Account">Mes ruches</a>
                                <a href="index.php?action=user_Account_Inbox">Inbox</a>
                                <a href="index.php?action=user_Account_Manage">Gerer mon compte</a>
                                <a href="index.php?action=auth_Verify_Disconnect">Déconnexion : <?= $_SESSION['user_username']?></a>
                            <?php }?>
                        </div>
                    </div>
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
        <userid><?= $_SESSION['id'] ?></userid> <!-- rplc -->
        
        <script src="js/menu.js"></script>
        <?php if (!empty($loadMap))
        {
            ?>
            <script src="js/map.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCL7fnU1p4GrjlTjnu5iT36H4rbBZuWyqs&callback=initMap" async defer></script>
            <?php
        } 
        ?>
        
    </body>
</html>
