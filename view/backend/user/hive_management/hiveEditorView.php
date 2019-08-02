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
<div id="hiveCards_container">
<?php
if ($context == NULL){
    while ($data = $hives->fetch()) {?>
        
        <div class="hiveCard">
            <div class="hiveCard_titleDiv">
                <img class="hiveCard_titleDiv_logo" src="css/media/hive_marker_own.png" alt="Bee hive img">
                <h2 class="hiveCard_titleDiv_title"><?= $data['name'] ?></h2>
                <h3 class="hiveCard_titleDiv_id">(hiveID#<?= $data['id']?>)</h3>
            </div>
            <div class="hiveCard_contentDiv">
                <p class="hiveCard_contentDiv_address">Addresse : <?= $data['address']?></p>
                <p class="hiveCard_contentDiv_links"><a href="index.php?action=hiveMap_Account_HiveEditor&editHive=<?= $data['id']?>">editer</a> <a href="index.php?action=hiveMap_Account_HiveEditor&deleteHive=<?= $data['id']?>">supprimer</a></p>
            </div>
        </div>
        
<?php
    }
} elseif ($context == 'hiveEditor') {
    while ($data = $hive->fetch()) {?>
        <form class="hiveEditor_form" action="index.php?action=hiveMap_Account_HiveEditor&editHive=<?= $data['id']?>" method="post">
        <div class="hiveCard_titleDiv">
            <img class="hiveCard_titleDiv_logo" src="css/media/hive_marker_own.png" alt="Bee hive img">
            <div class="hiveEditor_form_typable">
                <p class="hiveEditor_form_typable_left">Nom: </p>
                <input class="hiveEditor_form_typable_right" type="text" name="hivename" id="hivename" value="<?= $data['name']?>" required>
            </div>
            <h3 class="hiveCard_titleDiv_id">(hiveID#<?= $data['id']?>)</h3>
        </div>
        <div class="hiveCard_contentDiv">
            <div class="hiveEditor_form_typable">
                <p class="hiveEditor_form_typable_left">Adresse: </p>
                <input class="hiveEditor_form_typable_right" type="text" name="hiveaddress" id="hiveaddress" value="<?= $data['address']?>" required>
            </div>
            <div class="hiveEditor_form_typable">
                <p class="hiveEditor_form_typable_left">Latitude: </p>
                <input class="hiveEditor_form_typable_right" type="text" name="hivelat" id="hivelat" value="<?= $data['lat']?>" required>
            </div>
            <div class="hiveEditor_form_typable">
                <p class="hiveEditor_form_typable_left">Longitude: </p>
                <input class="hiveEditor_form_typable_right" type="text" name="hivelng" id="hivelng" value="<?= $data['lng']?>" required>
            </div>
            <input class="hiveEditor_form_inputBtn" type="submit" value="Submit">
        </div>
        </form>
<?php
    }
    ?></div> <?php
} else {?>
    <div id="context_alertBox">
        <?php if ($context == "hiveEdited") {?><p>Ruche modifiée</p><?php } elseif ($context == "hiveDeleted") {?><p>Ruche supprimée</p><?php } else {}?>
    </div>
    
    <?php }

$content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>