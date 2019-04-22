<?php $title = 'BEEWATCH - Supprimer mon compte'; ?>

<?php ob_start(); ?>
    <form action="index.php?action=Delete_Account" method="post">
    Etes vous sur de vouloir supprimer ce compte :<br>
    <input type="radio" name="delete" value=false checked> Non<br>
    <input type="radio" name="delete" value=true> Oui<br>
    <br>
    <input type="submit" value="Submit">
    
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>