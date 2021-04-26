<?php
    if (!isset($_SESSION['is_valid_admin'])) {
        $login_message = 'You must log in as an Administrator to view this page!';
        header("Location: ..?action=login");
    }