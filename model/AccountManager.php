<?php

namespace OpenClassrooms\P5\Model;

require_once('model/Manager.php');
class AccountManager extends Manager
{
    public function insertAccount($username, $email, $password, $firstname, $lastname) {
        $db = $this->dbConnect();
        $accounts = $db->prepare('INSERT INTO accounts(username, email, password, surname, firstname) VALUES(?, ?, ?, ?, ?)');
        $executeRequest = $accounts->execute(array($username, $password, $email, $firstname, $lastname));

        return $executeRequest;
    }

    public function retrieveAccount($email)
    {
        $db = $this->dbConnect();
        $account = $db->prepare('SELECT * FROM accounts WHERE email = ?');
        $account->execute(array($email));
        return $account;
    }

    public function retrieveAccountPassword($id)
    {
        $db = $this->dbConnect();
        $accountPassword = $db->prepare('SELECT password FROM accounts WHERE id = ?');
        $accountPassword->execute(array($id));
        return $accountPassword;
    }

}
