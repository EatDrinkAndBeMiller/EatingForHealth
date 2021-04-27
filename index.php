<?php
    $lifetime = 60 * 60 * 24 * 7; //one week
    session_set_cookie_params($lifetime, '/');
    session_start();

    require('model/database.php');
    require('model/recipe.php');
    require('model/member.php');

    $meal = filter_input(INPUT_POST, 'meal', FILTER_VALIDATE_INT);
    $avoid = filter_input(INPUT_POST, 'avoid', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

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
        case "public_recipes":
            include('view/recipes-public.php');
            break;
        case "list_recipe":
            $recipe = Recipe::get_all_recipes();
            include('view/recipes.php');
            break;
        case "resource-tips":
            include('view/resource-tips.php');
            break;
        case "resource-shopping":
            include('view/resource-shopping.php');
            break;
        case "resource-dirty-dozen":
            include('view/resource-dirty-dozen.php');
            break;
        case "resource-nutrition":
            include('view/resource-nutrition-label.php');
            break;
        case "resource-cleaning":
            include('view/resource-cleaning.php');
            break;
        case "single_recipe":
            include('view/single_recipe.php');
            break;
        case "login":
            $admin = Member::is_admin($username);
            if (Member::is_valid_user($username, $password) && $admin > 0) {
                $_SESSION['userid'] = $username;
                header("Location: ./admin/index.php?action=list_recipe");
            } elseif (Member::is_valid_user($username, $password) && $admin < 1) {
                $_SESSION['userid'] = $username;
                header("Location: .?action=welcome");
            } else {
                $login_message = 'Please Log in';
                include('view/login.php');
            }
            break;
        case "logout":
            include('view/logout.php');
            break;
        case "list_recipe_options":
            if (!$avoid) {
                $recipe = Recipe::get_recipe_by_category($meal);
            } else {
                $recipe = Recipe::get_all_selected_recipes($avoid, $meal);
            }
            include('view/recipes.php');
            break;
    }
    
