<?php 
$title = 'BEEWATCH- HiveMap All'; ?>

<?php ob_start(); ?>
<a href="index.php?action=hiveMap_Account_HiveCreator">Creer une ruche</a>
<a href="index.php?action=hiveMap_Account_HiveEditor">Editer une ruche</a>
<p>map</p>
<div id="account_map"></div>

<?php
if ($context == NULL) {?>
    <form action="index.php?action=hiveMap_Account_HiveCreator" method="post">
        Nom de la ruche:<br>
        <input type="text" name="hivename" id="hivename" required><br>
        Adresse:<br>
        <input type="text" name="hiveadress" id="hiveadress" required><br>
        latitude:<br>
        <input type="text" name="hivelat" id="hivelat" required><br>
        longitude:<br>
        <input type="text" name="hivelng" id="hivelng" required><br>
        Visible pour tous:<br>
        <input type="checkbox" name="private" id="private"><br>
        <input type="submit" value="Submit">
    </form>
<?php
} elseif ($context == 'hiveCreated') {?>
    <p>Ruche créé.</p>
<?php
}

$content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>