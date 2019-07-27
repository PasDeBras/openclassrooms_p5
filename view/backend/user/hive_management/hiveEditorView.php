<?php 
$title = 'BEEWATCH- HiveMap All';
$loadMap=TRUE; ?>

<?php ob_start(); ?>
<a href="index.php?action=hiveMap_Account_HiveCreator">Creer une ruche</a>
<a href="index.php?action=hiveMap_Account_HiveEditor">Editer une ruche</a>
<p>map</p>
<div id="account_map"></div>
<?php
if ($context == NULL){
    while ($data = $hives->fetch()) {?>
        <p><?= $data['name'] ?> - <a href="index.php?action=hiveMap_Account_HiveEditor&editHive=<?= $data['id']?>">editer</a>/<a href="index.php?action=hiveMap_Account_HiveEditor&deleteHive=<?= $data['id']?>">supprimer</a></p>
<?php
    }
} elseif ($context == 'hiveEditor') {
    while ($data = $hive->fetch()) {?>
        <form action="index.php?action=hiveMap_Account_HiveEditor&editHive=<?= $data['id']?>" method="post">
            Nom de la ruche:<br>
            <input type="text" name="hivename" id="hivename" value="<?= $data['name']?>" required><br>
            Adresse:<br>
            <input type="text" name="hiveaddress" id="hiveaddress" value="<?= $data['address']?>" required><br>
            latitude:<br>
            <input type="text" name="hivelat" id="hivelat" value="<?= $data['lat']?>" required><br>
            longitude:<br>
            <input type="text" name="hivelng" id="hivelng" value="<?= $data['lng']?>" required><br>
            <input type="submit" value="Submit">
        </form>
<?php
    }
} elseif ($context == 'hiveEdited') {?>
    <p>Ruche mise à jour.</p>
<?php
} elseif ($context == 'hiveDeleted') {?>
    <p>Ruche supprimée.</p>

<?php
}

$content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>