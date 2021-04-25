<?php 
    include('header.php'); 
    
    //unset variable(s)
    /* if (isset($_SESSION['userid'])) { */
        //$firstname = $_SESSION['userid'];
        unset($_SESSION['userid']);
    /* } */
    //end session
    session_destroy();
    //delete session cookie
    $name = session_name();
    $expire = strtotime('-1 year');
    $params = session_get_cookie_params();
    $path = $params['path'];
    $domain = $params['domain'];
    $secure = $params['secure'];
    setcookie($name, '', $expire, $path, $domain, $secure);
?>
<br>
<h1 class="thank_you">Thank you for signing out, <?= $username ?>.</h1>
<br>
<p><a href=".">Click here</a> to return to the webpage.</p>
<br>
<?php include('footer.php'); ?>