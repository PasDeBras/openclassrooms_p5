<?php 
$title = 'BEEWATCH- Friendlist'; ?>

<?php ob_start(); ?>
<div id="friendships">
    <h2>Friendships</h2>
    <p>Vous avez <?= $friendshipRequests->rowCount(); ?> demandes d'amitié en attente :</p>
    <?php while ($data = $friendshipRequests->fetch()) {?>
        <p><?=$context?>Utilisateur - <?= $data['sendername'] ?> <a href="index.php?action=user_Account_Inbox&accept_FriendshipRequest=<?=$data['requestid']?>&friend_Id=<?=$data['senderid']?>">Accepter</a>/<a href="index.php?action=user_Account_Inbox&refuse_FriendshipRequest=<?=$data['requestid']?>">Refuser</a></p>
        <?php }?>

    <p> Liste de vos amis :</p>
    <?php while ($relation = $allFriendships->fetch()) {?>
        <p><?= $relation['friendname'] ?><a href="index.php?action=user_Account_Inbox&delete_Friendship=<?=$relation['linkid']?>">Retirer</a></p>
        <?php }?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>