<?php 
$title = 'BEEWATCH- HiveMap account';
$loadMap=TRUE; ?>

<?php ob_start(); ?>
<a href="index.php?action=hiveMap_Account_HiveCreator">Creer une ruche</a>
<a href="index.php?action=hiveMap_Account_HiveEditor">Editer une ruche</a>
<p>map</p>
<section id="map_section">
    <div id="account_map"></div>
    <div id="map_overlay"></div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>