<?php


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

    public function changeAccountPassword($id, $newPassword)
    {
        $db = $this->dbConnect();
        $changePassword = $db->prepare('UPDATE accounts SET password = :newpassword WHERE id = :id');
        $changePassword->execute(array(
            'newpassword' => $newPassword,
            'id' => $id
        ));

        return $changePassword;
    }

    public function deleteAccount($id) {
        $db = $this->dbConnect();
        $deleteAccount = $db->prepare('DELETE FROM accounts WHERE id = ?');
        $deleteAccount->execute(array($id));

        return $deleteAccount;
    }

    public function listAllAccounts() 
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, username FROM accounts');
        return $req;
    }

}
