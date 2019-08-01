<?php 
$title = 'BEEWATCH- List of Members'; ?>

<?php ob_start(); ?>
<!-- <p>Membres :<?= $listOfAccounts->rowCount(); ?></p> -->

<div id="memberListDiv">
    <h2>Liste des membres :</h2>
    <div id="memberList_cardsContainer">
        <?php 
        while ($data = $listOfAccounts->fetch()) {
            if ($data['id'] != $_SESSION['id']) 
            {?>
                <div class="memberCardDiv">
                    <img src="css/media/naturalHiveColor.png">
                    <p class="memberCardDiv_name"><?= $data['username'] ?></p>
                    <a class="memberCardDiv_button" href="index.php?action=user_Account_Inbox&send_FriendshipRequest=<?= $data['id']?>">Ajouter aux amis</a>
                </div>
            <?php }
            }
        ?>
    </div>
    
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/backend/template.php'); ?>