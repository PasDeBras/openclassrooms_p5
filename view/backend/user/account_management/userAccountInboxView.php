<?php 
$title = 'BEEWATCH- Friendlist'; ?>

<?php ob_start(); ?>
<div id="inbox_div">
    <?php if ($context != NULL) {?>
    <div id="context_alertBox">
        <?php if ($context == "friendRequest_sent") {?><p>Requête d'amitié envoyée</p><?php } elseif ($context == "friendRequest_alreadyExist") {?><p>Vous avez déja envoyé une requête à ce membre!</p><?php } elseif ($context == "friendLink_created") {?><p>Lien d'amitié créé !</p><?php } elseif ($context == "friendRequest_refused") {?><p>Vous avez refusé cette requête !</p><?php } elseif ($context == "friendLink_deleted") {?><p>Vous avez choisi de supprimer cette relation !</p><?php } else {}?>
    </div>
    <?php }?>
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
                <?php }?>
            </div>
        <?php }?>
        

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
        <div id="inbox_div_alert_panel_allDiv">
            <?php while ($incident = $incidents->fetch()) {?>
            <div class="incidentAlert_Div">
                <img class="incidentAlert_Div_Img" src="css/media/warning.png">
                <p><span class="incidentIdSpan">INCIDENTID#<?= $incident['incidentId'] ?></span> : ruche <span class="incidentHiveSpan"><?= $incident['hiveName'] ?></span> - <span class="incidentProblemSpan"><?= $incident['incident'] ?></span></p>
                <a class="incidentAlert_Div_validate" href="index.php?action=user_Account_Inbox&delete_Incident=<?=$incident['incidentId']?>">Retirer</a>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>