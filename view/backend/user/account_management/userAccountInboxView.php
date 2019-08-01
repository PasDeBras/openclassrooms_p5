<?php 
$title = 'BEEWATCH- Friendlist'; ?>

<?php ob_start(); ?>
<div id="inbox_div">
    <div id="inbox_div_friendship_panel">
    
        
        <h2 id="inbox_div_friendship_panel_title">LISTE D'AMIS</h2>
        <?php 
        $numberOfRequest = $friendshipRequests->rowCount();
        if ($numberOfRequest>0) { ?>
            <h3 id="inbox_div_friendship_panel_title_sub"> Liste des demandes (<?= $friendshipRequests->rowCount(); ?>) :</h3>
            <div id="requests">
                <?php 
                while ($data = $friendshipRequests->fetch()) 
                {?>
                    <div class="friend_card">
                        <img src="css/media/naturalHiveGrey.png">
                        <p class="friend_card_name"><?= $data['sendername'] ?></p>
                        
                        <div class="friendrequest_card_buttons">
                            <a class="friend_card_button_accept" href="index.php?action=user_Account_Inbox&accept_FriendshipRequest=<?=$data['requestid']?>&friend_Id=<?=$data['senderid']?>">Accepter</a>
                            <a class="friend_card_button_refuse" href="index.php?action=user_Account_Inbox&refuse_FriendshipRequest=<?=$data['requestid']?>">Refuser</a>
                        </div>
                    </div>
            <?php }
        }?>
        </div>

        <div id="friendship">
            
            <?php while ($relation = $allFriendships->fetch()) {?>
            <div class="friend_card">
                <img src="css/media/naturalHiveColor.png">
                <p class="friend_card_name"><?= $relation['friendname'] ?></p>
                <a class="friend_card_button" href="index.php?action=user_Account_Inbox&delete_Friendship=<?=$relation['linkid']?>">Retirer</a>
            </div>
            <?php }?>
        </div>
      
    </div>
    
    

    <div id="inbox_div_alert_panel">
            <h2>Alertes</h2>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>