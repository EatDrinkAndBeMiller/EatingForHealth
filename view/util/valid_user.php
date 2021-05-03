<?php 
    //make sure the user is logged in as a valid user
    if (!isset($_SESSION['userid'])) {
        $login_message = 'You must log to view this page!';
        header("Location: .?action=login");
    }