<?php 
$title = 'BEEWATCH- List of Members'; ?>

<?php ob_start(); ?>
<p>test</p>
<!-- <p>Membres :<?= $listOfAccounts->rowCount(); ?></p> -->
<?php 
while ($data = $listOfAccounts->fetch()) {
    if ($data['id'] != $_SESSION['id']) 
    {?>
        <p>Utilisateur - <?= $data['username'] ?> <a href="index.php?action=user_Account_Inbox&send_FriendshipRequest=<?= $data['id']?>">Envoyer une requete</a></p>
    <?php }
    }
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>