<?php include('header.php')?>
    <main>
    <div class="row justify-content-md-center">
    <div class="col-lg-6">
        <div class="card bg-light"><br>

        <section class="login">
            <?php if (!empty($login_message)) { ?>
                <h2 style="<?= $login_message_style ?>">
                        <?= $login_message ?>
                </h2>
            <?php } else { ?>
                <h3 class="text-center">Please fill in your credentials to login.</h3><br>
            <?php } ?>
            <form action="." method="POST" class="login_form">
                <input type="hidden" name="action" value="login">
                <div class="form-group row">
                    <label for="username" class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm-8">
                    <input type="text" name="username" id="username"  class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-8">
                    <input type="password" name="password" id="password"  class="form-control" required>
                    </div>
                </div>
                
                    <input type="submit" class="btn btn-primary" value="Sign In">
            </form><br>
<!--                 <p><a href=".?action=forgotPassword">Forgot password?</a><br>
                    <a href=".?action=forgotUsername">Forgot username?</a></p>
                <br> -->
        </section>
        </div>
    </div>
    </div>
    </main>

<?php include('footer.php')?>
   