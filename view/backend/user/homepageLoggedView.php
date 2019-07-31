<?php $title = 'BEEWATCH- Homepage'; ?>

<?php ob_start(); ?>
<div id="missionStatement">
    <div id="missionStatement_text">
        <h1>Bienvenue sur BEEWATCH</h1>
        <p>BEEWATCH est un site permettant aux apiculteurs de partout et d'ailleurs de geolocaliser leurs ruches et de partager leur position,</p>
        <p>se prevenir les uns les autres en cas de sinistre, ou simplement de s'informer sur les autres apiculteurs à proximité.</p>
    </div>
    <div id="missionStatement_img">
        <img src="css/media/beehive.png" alt="beehive img">
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>