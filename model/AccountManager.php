<?php


require_once('model/Manager.php');
class AccountManager extends Manager
{
    public function insertAccount($username, $email, $password, $firstname, $lastname) {
        $sql = 'INSERT INTO accounts(username, email, password, surname, firstname) VALUES(?, ?, ?, ?, ?)';

        $account = $this->executeRequest($sql, array($username, $password, $email, $firstname, $lastname));
        return $account;
    }

    public function retrieveAccount($email)
    {
        $sql = 'SELECT * FROM accounts WHERE email = ?';

        $account = $this->executeRequest($sql, array($email));
        return $account;
    }

    public function retrieveAccountPassword($id)
    {
        $sql = 'SELECT password FROM accounts WHERE id = ?';

        $accountPassword = $this->executeRequest($sql, array($id));
        return $accountPassword;
    }

    public function changeAccountPassword($id, $newPassword)
    {
        $sql = 'UPDATE accounts SET password = :newpassword WHERE id = :id';

        $accountPassword = $this->executeRequest($sql, 
            array(
                'newpassword' => $newPassword,
                'id' => $id
            )
        );
        return $accountPassword;
    }

    public function deleteAccount($id) {
        $sql = 'DELETE FROM accounts WHERE id = ?';
        
        $account = $this->executeRequest($sql, array($id));
        return $account;
    }

    public function readAllAccounts() 
    {
        $sql = 'SELECT id, username FROM accounts';
        
        $allAccounts = $this->executeRequest($sql);
        return $allAccounts;
    }

    

}

