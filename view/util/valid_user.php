<?php 
    //make sure the user is logged in as a valid admin
    if (!isset($_SESSION['userid'])) {
        header("Location: .?action=login");
    }