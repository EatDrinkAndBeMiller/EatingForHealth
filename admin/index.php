<?php
    require('../model/database.php');
    require('../model/recipe.php');
    require('../model/member.php');

    $meal = filter_input(INPUT_POST, 'meal', FILTER_VALIDATE_INT);
    $avoid = filter_input(INPUT_POST, 'avoid', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $name = filter_input(INPUT_POST, 'recipe_name', FILTER_SANITIZE_STRING);
    $desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
    $cat = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
    $a = filter_input(INPUT_POST, 'step_a', FILTER_SANITIZE_STRING);
    $b = filter_input(INPUT_POST, 'step_b', FILTER_SANITIZE_STRING);
    $c = filter_input(INPUT_POST, 'step_c', FILTER_SANITIZE_STRING);
    $d = filter_input(INPUT_POST, 'step_d', FILTER_SANITIZE_STRING);
    $cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT);
    $aid = filter_input(INPUT_POST, 'aid', FILTER_VALIDATE_INT);
    $prep = filter_input(INPUT_POST, 'prep', FILTER_VALIDATE_INT);
    $cook = filter_input(INPUT_POST, 'cook', FILTER_VALIDATE_INT);
    $total = filter_input(INPUT_POST, 'total', FILTER_VALIDATE_INT);
    $ing = filter_input(INPUT_POST, 'iname', FILTER_SANITIZE_STRING);
    $img = filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
    $rid = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT);
    $recipeID = filter_input(INPUT_POST, 'delete_recipe', FILTER_VALIDATE_INT);
    $user_id = filter_input(INPUT_POST, 'delete_user', FILTER_VALIDATE_INT);
    $imageID = filter_input(INPUT_POST, 'delete_image', FILTER_VALIDATE_INT);
    $ingredientID = filter_input(INPUT_POST, 'delete_ingredient', FILTER_VALIDATE_INT);
    $catID = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $algID = filter_input(INPUT_POST, 'allergen_id', FILTER_VALIDATE_INT);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT);
    $measure = filter_input(INPUT_POST, 'measure_id', FILTER_VALIDATE_INT);
    $recipe_id = filter_input(INPUT_POST, 'recipe_id', FILTER_VALIDATE_INT);
    $ingred_id = filter_input(INPUT_POST, 'ingred_id', FILTER_VALIDATE_INT);
    $relationshipID = filter_input(INPUT_POST, 'delete_relationship', FILTER_VALIDATE_INT);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $admin = filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_BOOLEAN);

    // if (!isset($_SESSION['is_valid_admin'])) {
    //     $action = 'login';
    // }
    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
            if (!$action) {
                $action = 'list_recipe';
            }
        }

    switch($action) {
        case "welcome":
            header("Location: ..?action=welcome");
            break;
        case "diet":
            header("Location: ..?action=diet");
            break;
        case "resources":
            header("Location: ..?action=resources");
            break;
        case "substitutes":
            header("Location: ..?action=substitutes");
            break;
        case "weekplan":
            header("Location: ..?action=weekplan");
            break;
        case "add_recipe":
            include('view/add_recipe.php');
            break;
        case "add":
            Recipe::add_recipe($name, $desc, $cat, $cid, $aid, $prep, $cook, $total, $a, $b, $c, $d);
            header("Location: .?action=list_recipe");
            break;
        case "add_ingredient":
            $ingredients = Recipe::get_all_ingredients();
            include('view/add_ingredient.php');
            break;
        case "addi":
            Recipe::add_ingredient($ing);
            header("Location: .?action=list_recipe");
            break;
        case "add_image":
            $images = Recipe::get_all_recipe_images();
            include('view/add_image.php');
            break;
        case "addpic":
            Recipe::add_recipe_img($img, $rid);
            header("Location: .?action=add_image");
            break;
        case "add_ingredient":
            include('view/add_ingredient.php');
            break;
        case "add_relationship":
            $relationship = Recipe::get_relationships();
            include('view/add_relationship.php');
            break;
        case "user":
            $users = Member::get_users();
            include('view/add_user.php');
            break;
        case "add_user":
            if (!Member::username_exists($username)) {
                Member::add_user($username, $password, $email, $admin);
                header("Location: .?action=list_recipe");
            } else {
                $login_message = 'Username must be unique!';
                include('../view/login.php');
            }
            break;
        case "delete_user":
            Member::delete_user($user_id);
            header("Location: .?action=list_recipe");
            break;
        case "relationship":
            Recipe::add_relationship($recipe_id, $measure, $qty, $ingred_id, $algID, $catID);
            header("Location: .?action=list_recipe");
            break;
        case "delete_recipe":
            Recipe::delete_recipe($recipeID);
            header("Location: .?action=list_recipe");
            break;
        case "delete_image":
            Recipe::delete_recipe_image($imageID);
            header("Location: .?action=add_image");
            break;
        case "delete_ingredient":
            Recipe::delete_ingredient($ingredientID);
            header("Location: .?action=add_ingredient");
            break;
        case "delete_relationship":
            Recipe::delete_ingredient($relationshipID);
            header("Location: .?action=add_relationship");
            break;
        case "login":
            if (Member::is_valid_user($username, $password) && Member::is_admin($username)) {
                $_SESSION['is_valid_admin'] = true;
                include('view/admin.php');
            } else {
                $login_message = 'You must login as an Administrator to view this page';
                include('../view/login.php');
            }
        case "list_recipe":
            $recipe = Recipe::get_all_recipes();
            include('view/admin.php');
            break;
        }

    
