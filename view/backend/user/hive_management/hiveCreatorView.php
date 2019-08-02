<?php 
$title = 'BEEWATCH- HiveMap All';
$loadMap=TRUE; ?>

<?php ob_start(); ?>
<section id="map_section">
    <div id="account_map"></div>
    <div id="map_overlay"></div>
</section>
<div id="map_hive_controls">
        <a href="index.php?action=hiveMap_Account_HiveCreator">Creer une ruche</a>
        <a href="index.php?action=hiveMap_Account_HiveEditor">Editer une ruche</a>
</div>

<?php
if ($context == NULL) {?>
    <div id="hiveCards_container">
        <form class="hiveEditor_form" action="index.php?action=hiveMap_Account_HiveCreator" method="post">
            <div class="hiveCard_titleDiv">
                <img class="hiveCard_titleDiv_logo" src="css/media/hive_marker_own.png" alt="Bee hive img">
                <div class="hiveEditor_form_typable">
                    <p class="hiveEditor_form_typable_left">Nom: </p>
                    <input class="hiveEditor_form_typable_right" type="text" name="hivename" id="hivename" required>
                </div>
                
            </div>
            <div class="hiveCard_contentDiv">
                <div class="hiveEditor_form_typable">
                    <p class="hiveEditor_form_typable_left">Adresse: </p>
                    <input class="hiveEditor_form_typable_right" type="text" name="hiveadress" id="hiveadress" required>
                </div>
                <div class="hiveEditor_form_typable">
                    <p class="hiveEditor_form_typable_left">Latitude: </p>
                    <input class="hiveEditor_form_typable_right" type="text" name="hivelat" id="hivelat" required>
                </div>
                <div class="hiveEditor_form_typable">
                    <p class="hiveEditor_form_typable_left">Longitude: </p>
                    <input class="hiveEditor_form_typable_right" type="text" name="hivelng" id="hivelng" required>
                </div>
                <div class="hiveEditor_form_clickable">
                    <p class="hiveEditor_form_clickable_text">Privée </p>
                    <input class="hiveEditor_form_clickable_checkbox" type="checkbox" name="private" id="private" value="1" />
                </div>
                <input class="hiveEditor_form_inputBtn" type="submit" value="Submit">
            </div>
        </form>
    </div>

<?php
}

$content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>