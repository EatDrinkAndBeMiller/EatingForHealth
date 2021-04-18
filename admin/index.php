<?php
    require('../model/database.php');
    require('../model/recipe.php');

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
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_recipe';
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
        case "add_recipe_now":
            Recipe::add_recipe($name, $desc, $cat, $cid, $aid, $prep, $cook, $total, $a, $b, $c, $d);
            header("Location: .?action=list_recipe");
            break;
        case "add_image":
            include('view/add_image.php');
            break;
        case "add_relationship":
            include('view/add_relationship.php');
            break;
        case "add_ingredient":
            include('view/add_ingredient.php');
            break;
        case "add_image":
            include('view/add_image.php');
            break;
        case "add_relationship":
            include('view/add_relationship.php');
            break;
        case "add_ingredient":
            include('view/add_ingredient.php');
            break;
        case "list_recipe":
            $recipe = Recipe::get_all_recipes();
            include('view/admin.php');
            break;
        }

    
