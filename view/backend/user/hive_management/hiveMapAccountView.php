<?php 
$title = 'BEEWATCH- HiveMap account'; ?>

<?php ob_start(); ?>
<a href="index.php?action=hiveMap_Account_HiveCreator">Creer une ruche</a>
<a href="index.php?action=hiveMap_Account_HiveEditor">Editer une ruche</a>
<p>map</p>
<div id="account_map"></div>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>