<?php 
$title = 'BEEWATCH- HiveMap All'; 
$loadMap=TRUE;
?>

<?php ob_start(); ?>
<section id="map_section">
    <div id="map"></div>
    <div id="map_overlay"></div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>
