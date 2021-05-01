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
        $query = 'SELECT user_id, username, first_name, last_name, email FROM users';
        $statement = $db->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $statement->closeCursor();
        return $users;
    }

    public static function get_user($user) {
        $db = Database::getDB();
        $query = 'SELECT user_id, username, first_name, last_name, email FROM users WHERE user_id = :userid';
        $statement = $db->prepare($query);
        $statement->bindValue(':userid', $user);
        $statement->execute();
        $users = $statement->fetch();
        $statement->closeCursor();
        return $users;
    }

    public static function get_id($username) {
        $db = Database::getDB();
        $query = 'SELECT user_id FROM users WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $id = $statement->fetchColumn();
        $statement->closeCursor();
        return $id;
    }

    public static function get_favorites($user) {
        $db = Database::getDB();
        $query = 'SELECT user_favorites.recipe_id, recipe.recipe_name
        FROM user_favorites
        INNER JOIN recipe ON recipe.recipe_id=user_favorites.recipe_id WHERE user_favorites.user_id = :id;';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $user);
        $statement->execute();
        $favorites = $statement->fetchAll();
        $statement->closeCursor();
        return $favorites;
    }

    public static function get_journal($user) {
        $db = Database::getDB();
        $query = 'SELECT entry_id, date, food, comments FROM food_journal WHERE user_id = :id;';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $user);
        $statement->execute();
        $entries = $statement->fetchAll();
        $statement->closeCursor();
        return $entries;
    }

    public static function add_journal($user, $food, $comments) {
        $db = Database::getDB();
        $query = 'INSERT INTO `food_journal` (user_id, food, comments) VALUES (:user_id, :food, :comments)';
        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user, PDO::PARAM_INT);
        $statement->bindValue(':food', $food, PDO::PARAM_STR);
        $statement->bindValue(':comments', $comments, PDO::PARAM_STR);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_journal($jid) {
        $db = Database::getDB();
        $query = 'DELETE FROM food_journal WHERE entry_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $jid);
        $statement->execute();
        $statement->closeCursor();
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