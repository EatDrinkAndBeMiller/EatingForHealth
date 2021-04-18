<?php

class Recipe {
    public $category;
    private $name, $description, $prep_time, $cook_time, $total_time;

    public function __construct($category, $name, $description, $prep_time, $cook_time, $total_time)
    {
        $this->category = $category;
        $this->name = $name;
        $this->description = $description;
        $this->prep_time = $prep_time;
        $this->cook_time = $cook_time;
        $this->total_time = $total_time;

    }

    public function getCategory() {
        return $this->category;
    }
    
    public function getName() {
        return $this->name;
    }


    public static function get_all_recipes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM `recipe`';
        $statement = $db->prepare($query);
        $statement->execute();
        $recipes = $statement->fetchAll();
        $statement->closeCursor();
        return $recipes;
}

    public static function get_recipe($id) {
        $db = Database::getDB();
        $query = 'SELECT * FROM `recipe` WHERE recipe_id = :id'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $recipes = $statement->fetch();
        $statement->closeCursor();
        return $recipes;
    }

    public static function get_ingredients($id) {
        $db = Database::getDB();
        $query = 'SELECT Q.measurement_qty, M.measurement, I.ingredient_name FROM recipe_ingredients X
        LEFT JOIN measurement_qty Q on X.measurement_qty_id = Q.measurement_qty_id
        LEFT JOIN measurement M on X.measurement_id = M.measurement_id
        LEFT JOIN ingredients I on X.ingredient_id = I.ingredient_id WHERE X.recipe_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $ingredients = $statement->fetchAll();
        $statement->closeCursor();
        return $ingredients;
    }

    public static function get_image($id) {
        $db = Database::getDB();
        $query = 'SELECT recipe_image FROM recipe_images WHERE recipe_id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $image = $statement->fetch();
        $statement->closeCursor();
        return $image;
    }

    public static function get_recipe_by_category($meal) {
        switch($meal) {
            case 1:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 1';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            case 2:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 2';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            case 3:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 3';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            case 4:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 4';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            case 5:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 5';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            case 6:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe` WHERE category_id = 6';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
                break;
            default:
                $db = Database::getDB();
                $query = 'SELECT * FROM `recipe`';
                $statement = $db->prepare($query);
                $statement->execute();
                $recipe = $statement->fetchAll();
                $statement->closeCursor();
                return $recipe;
            break;
    } }

    public static function get_all_selected_recipes($avoid, $meal) {
        if (in_array("gluten", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 2';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("gluten", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id > 2';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id > 3';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id > 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid) && in_array("sugar", $avoid) && in_array("nuts", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id > 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid) && in_array("sugar", $avoid) && in_array("nuts", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id > 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("gluten", $avoid) && in_array("dairy", $avoid) ) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3 AND > 1';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("gluten", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 4 AND > 1';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("gluten", $avoid) && in_array("nuts", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 5 AND > 1';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("gluten", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 6 AND > 1';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("dairy", $avoid) ) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 2 OR 3';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 2 OR 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("nuts", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 5 OR 2';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 6 OR 2';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("dairy", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3 OR 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("dairy", $avoid) && in_array("nuts", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("dairy", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("shellfish", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 4 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("dairy", $avoid) && in_array("nuts", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 3 OR 4 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("eggs", $avoid) && in_array("dairy", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 2 OR 3 OR 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("gluten", $avoid) && in_array("sugar", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 3 OR 4';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("gluten", $avoid) && in_array("sugar", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 4 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("shellfish", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) ) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 4 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("gluten", $avoid) && in_array("sugar", $avoid) && in_array("eggs", $avoid) ) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 4 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("shellfish", $avoid) && in_array("dairy", $avoid) && in_array("gluten", $avoid) ) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 3 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("eggs", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 3 OR 4 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("eggs", $avoid) && in_array("sugar", $avoid) && in_array("shellfish", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 2 OR 3 OR 4 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("shellfish", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 3 OR 4 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("eggs", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) && in_array("shellfish", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 4 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("eggs", $avoid) && in_array("shellfish", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 3 OR 5 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("nuts", $avoid) && in_array("eggs", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 3 OR 4 OR 5';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        } elseif (in_array("shellfish", $avoid) && in_array("eggs", $avoid) && in_array("sugar", $avoid) && in_array("gluten", $avoid) && in_array("dairy", $avoid)) {
            $db = Database::getDB();
            $query = 'SELECT * FROM `recipe` WHERE category_id = :category_id AND allergen_id != 1 OR 2 OR 3 OR 4 OR 6';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $meal, PDO::PARAM_INT);
            $statement->execute();
            $recipe = $statement->fetchAll();
            $statement->closeCursor();
            return $recipe;
        }
} }