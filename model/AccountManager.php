<?php

namespace OpenClassrooms\P5\Model;

require_once('model/Manager.php');
class AccountManager extends Manager
{
    public function insertAccount($username, $password, $email, $firstname, $lastname) {
        $db = $this->dbConnect();
        $accounts = $db->prepare('INSERT INTO accounts(username, email, password, surname, firstname) VALUES(?, ?, ?, ?, ?)');
        $executeRequest = $accounts->execute(array($username, $password, $email, $firstname, $lastname));

        return $executeRequest;
    }

}