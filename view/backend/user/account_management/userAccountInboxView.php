<?php 
$title = 'BEEWATCH- Friendlist'; ?>

<?php ob_start(); ?>
<p>Demandes en attente :<?= $friendshipRequests->rowCount(); ?></p>

<?php 
while ($relation = $allFriendships->fetch()) {?>
    <p>Nom - <?= $relation['friendname'] ?></p>
<?php
    }

while ($data = $friendshipRequests->fetch()) {?>
    <p><?=$context?>Utilisateur - <?= $data['sendername'] ?> <a href="index.php?action=user_Account_Inbox&accept_FriendRequest=<?=$data['requestid']?>&friend_Id=<?=$data['senderid']?>">Accepter</a>/<a href="index.php?action=">Refuser</a></p>
<?php
    }
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>