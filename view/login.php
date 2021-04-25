<?php include('header.php')?>
    <main>
        <section class="login">
            <?php if (!empty($login_message)) { ?>
                <h2 style="<?= $login_message_style ?>">
                        <?= $login_message ?>
                </h2>
            <?php } else { ?>
                <h2>Please fill in your credentials to login.</h2>
            <?php } ?>
            <form action="." method="POST" class="login_form">
                <input type="hidden" name="action" value="login">
                
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" autofocus required>
                
                
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                
                
                    <input type="submit" class="button blue" value="Sign In">
                
            </form>
        </section>
    </main>
<?php include('footer.php')?>