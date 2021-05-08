<?php

use PHPMailer\PHPMailer\PHPMailer;

$lifetime = 60 * 60 * 24 * 7; //one week
    session_set_cookie_params($lifetime, '/');
    session_start();

    require('model/database.php');
    require('model/recipe.php');
    require('model/member.php');
    require('model/reset.php');
    require('PHPMailer/src/PHPMailer.php');
    require('PHPMailer/src/SMTP.php');
    require('PHPMailer/src/POP3.php');
    require('PHPMailer/src/Exception.php');

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
        case "reset_password":
            include('view/reset_password.php');
            break;
        case "reset_password_now":
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $expires = date("U") + 1800;
            Reset::clearToken($email);
            Reset::setToken($email, $token, $selector, $expires);
            $url = "https://eating4health.org/index.php?action=enter_new_password&selector=" . $selector . "&validator=" . bin2hex($token);
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '587';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->setFrom = 'info@eating4health.org';
            $mail->addAddress = $email;
            $mail->Subject = 'Reset your password for Eating4Health';
            $mail->Body = '<p>We received a password reset request. Click the link below to reset your password. If you did not make this request, you can ignore this email</p>';
            $mail->Body .= '<p>Here is your password reset link: </br>';
            $mail->Body .= '<a href="' . $url . '">' . $url . '</a></p>';
            $mail->isHTML(true);
            if($mail->send()) {
                $_SESSION['reset'] = "success";
            } else {
                echo "<p>Message could not be sent!</p>";
                echo "<p>Error: " . $mail->ErrorInfo . '</p>';
            }
            header("Location: .?action=reset_password");
            break;
        case "enter_new_password":
            $selector = filter_input(INPUT_GET, 'selector', FILTER_SANITIZE_STRING);
            $validator = filter_input(INPUT_GET, 'validator', FILTER_SANITIZE_STRING);
            include('view/create-new-password.php');
            break;
        case "set_password":
            $selector = filter_input(INPUT_GET, 'selector', FILTER_SANITIZE_STRING);
            $validator = filter_input(INPUT_GET, 'validator', FILTER_SANITIZE_STRING);
            $currentDate = date("U");
            $result = Reset::checkToken($currentDate, $selector);
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $result['pwdResetToken']);
            if ($tokenCheck == true) {
                $pw = filter_input(INPUT_POST, 'pwd_repeat', FILTER_SANITIZE_STRING);
                Member::updatePWD($email, $pw);
                header("Location: .?action=login");
                break;
            } elseif ($tokenCheck == false) {
                echo "There was error validating your request";
                header("Location: .?action=reset_password");
                break;
            }

        


        

    }
    
