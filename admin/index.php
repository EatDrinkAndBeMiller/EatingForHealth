<?php
    require('../model/database.php');
    require('../model/recipe.php');

    $meal = filter_input(INPUT_POST, 'meal', FILTER_VALIDATE_INT);
    $avoid = filter_input(INPUT_POST, 'avoid', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'add_recipe';
        }
    }

    switch($action) {
        case "add_recipe":
            include('view/add_recipe.php');
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
        }

    
