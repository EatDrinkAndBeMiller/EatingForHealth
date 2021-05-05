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
    $food = trim(filter_input(INPUT_POST, 'food', FILTER_SANITIZE_STRING));
    $comments = trim(filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING));
    $jid = filter_input(INPUT_POST, 'delete_journal', FILTER_VALIDATE_INT);

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
        case "about-membership":
            include('view/about-membership.php');
            break;
        case "sub-flours":
            include('view/substitutes-flours.php');
            break;
        case "sub-sweeteners":
            include('view/substitutes-sweeteners.php');
            break;
        case "sub-eggs":
            include('view/substitutes-eggs.php');
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
            } else if ($avoid && !$meal) {
                $meal_message = 'Please choose a category when avoiding allergens';
                $recipe = Recipe::get_recipe_by_category($meal);
            } else {
                $recipe = Recipe::get_all_selected_recipes($avoid, $meal);
            }
            include('view/recipes.php');
            break;
        case "favorite":
            $id = filter_input(INPUT_POST, 'rid', FILTER_VALIDATE_INT);
            $user = Member::get_id($_SESSION['userid']);
            Recipe::add_fav($id, $user);
            header("Location: .?action=list_recipe");
            break;
        case "profile":
            $user = Member::get_id($_SESSION['userid']);
            $info = Member::get_user($user);
            $favorites = Member::get_favorites($user);
            include('view/profile.php');
            break;
        case "view_journal":
            $user = Member::get_id($_SESSION['userid']);
            $entry = Member::get_journal($user);
            include('view/journal.php');
            break;
        case "add_journal":
            $user = Member::get_id($_SESSION['userid']);
            Member::add_journal($user, $food, $comments);
            header("Location: .?action=view_journal");
            break;
        case "delete_journal":
            Member::delete_journal($jid);
            header("Location: .?action=view_journal");
            break;
    }
    
