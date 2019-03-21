<?php $title = 'BEEWATCH - Login'; ?>

<?php ob_start(); ?>
<div>
    <a href="index.php?action=auth_New">Creer mon compte</a>
</div>
<div>
    <a href="index.php?action=auth_Verify">Je suis déja membre</a>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>