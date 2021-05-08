<?php include('header.php')?>

    <form method="post" action=".">
    <input type="hidden" name="action" value="reset_password_now">
      <h1>Enter Email Address To Reset Password</h1>
      <p>Password Reset instructions will be emailed to you.</p>
      <input type="text" name="email" placeholder="Enter your email address..." required>
      <button type="submit" name="email-reset-request">Get Reset Link</button>
    </form>
    <?php
    if (isset($_SESSION["reset"])) {
        echo '<p>Password Reset Successfully!</p>';
      }
    ?>

<?php include('footer2.php')?>
