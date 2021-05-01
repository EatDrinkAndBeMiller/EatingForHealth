<?php

class Member {
    private $username;
    private $password;

    private function __construct() {}

    public static function add_user($username, $password, $email, $admin) {
        $db = Database::getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO users (username, password, email, admin) VALUES (:username, :password, :email, :admin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':admin', $admin);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_user($user_id) {
        $db = Database::getDB();
        $query = 'DELETE FROM users WHERE user_id = :userid';
        $statement = $db->prepare($query);
        $statement->bindValue(':userid', $user_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_users() {
        $db = Database::getDB();
        $query = 'SELECT user_id, username, email FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }

    public static function get_id($username) {
        $db = Database::getDB();
        $query = 'SELECT user_id FROM users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $users = $statement->fetch();
        $statement->closeCursor();
        return $users;
    }

    public static function is_valid_user($username, $password) {
        $db = Database::getDB();
        $query = 'SELECT password FROM users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = (!empty($row['password'])) ? $row['password'] : NULL;
        return password_verify($password, $hash);
    }

    public static function is_admin($username) {
        $db = Database::getDB();
        $query = 'SELECT admin FROM users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $result = $statement->fetchColumn();
        $statement->closeCursor();
        return $result;
    }
    public static function username_exists($username) {
        $db = Database::getDB();
        // see if the username already exists
        $query = "SELECT COUNT(*) FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        // fetchColumn() returns the number of rows from the SELECT COUNT(*) query above. 
        // 0 is falsy. Our if statement below checks IF true.
        $result = $statement->fetchColumn();
        return $result;
    }
}