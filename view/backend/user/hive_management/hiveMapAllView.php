<?php 
$title = 'BEEWATCH- HiveMap All'; 
$loadMap=TRUE;
?>

<?php ob_start(); ?>
<p>map</p>
<div id="map"></div>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>