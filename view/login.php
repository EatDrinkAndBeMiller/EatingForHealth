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

    <div class="row justify-content-md-center">
        <div class="col-lg-5">
            <div class="card bg-light"><br>
                <h3 class="text-center">Login</h3><br>
                <form action="." method="POST">
                <!--double-check action and inputs-->
                    <input type="hidden" name="action" value="login">   
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form><br>
                <p><a href=".?action=forgotPassword">Forgot password?</a><br>
                    <a href=".?action=forgotUsername">Forgot username?</a></p>
                <br>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
            <div class="card bg-light"><br>
                <h3 class="text-center">Register</h3><br>
                <form action="." method="POST">
                <!--double-check action and inputs-->
                    <input type="hidden" name="action" value="register">   
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="firstName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="lastName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary drk-bg">Continue to Payment</button>
                </form><br><br>
            </div>
        </div>
    </div>

<?php include('footer.php')?>
   