<?php

class Reset {

    private function __construct() {}

    public static function clearToken($email) {
        $db = Database::getDB();
        $query = "DELETE FROM pwdReset WHERE pwdResetEmail= :email;";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function setToken($email, $token, $selector, $expires) {
        $db = Database::getDB();
        $hashedToken = password_hash($token, PASSWORD_DEFAULT); 
        $query = 'INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:email, :first, :last, :password, :email, :admin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':selector', $selector);
        $statement->bindValue(':token', $hashedToken);
        $statement->bindValue(':expires', $expires);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function checkToken($currentDate, $selector) {
        $db = Database::getDB();
        $query = 'SELECT * FROM pwdReset WHERE pwdResetSelector = :selector AND pwdResetExpires >= :$currentDate) VALUES (:email, :first, :last, :password, :email, :admin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':currentDate', $currentDate);
        $statement->bindValue(':selector', $selector);
        $statement->execute();
        $info = $statement->fetch();
        $statement->closeCursor();
        return $info;
    }

    public static function getCount() {
        $query = 'SELECT COUNT(*) FROM pwdReset';
        $statement = $this->conn->prepare($query);
        $statement->execute();
        $count = $statement->fetchColumn();
        $statement->closeCursor();
        return $count;
    }
}