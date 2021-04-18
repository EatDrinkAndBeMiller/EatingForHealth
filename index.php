<?php
    require('model/database.php');
    require('model/recipe.php');

    $meal = filter_input(INPUT_POST, 'meal', FILTER_VALIDATE_INT);
    $avoid = filter_input(INPUT_POST, 'avoid', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'welcome';
        }
    }

    switch($action) {
        case "welcome":
            include('view/welcome.php');
            break;
        case "diet":
            include('view/diet.php');
            break;
        case "resources":
            include('view/resources.php');
            break;
        case "substitutes":
            include('view/substitutes.php');
            break;
        case "weekplan":
            include('view/weekplan.php');
            break;
        case "list_recipe":
            $recipe = Recipe::get_all_recipes();
            include('view/recipes.php');
            break;
        case "single_recipe":
            include('view/single_recipe.php');
            break;
        case "list_recipe_options":
            if (!$avoid) {
                $recipe = Recipe::get_recipe_by_category($meal);
            } elseif (!$meal) {
                $recipe = Null;
            } else {
                $recipe = Recipe::get_all_selected_recipes($avoid, $meal);
            }
            include('view/recipes.php');
            break;
    }
    
