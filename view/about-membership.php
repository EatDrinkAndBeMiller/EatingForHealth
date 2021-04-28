<?php include('header.php')?>

<h1 class="text-center">Benefits of Membership</h1><br>

<p class="dark-text">For only $5 for a year, you can enjoy these benefits to support your diet&colon;</p>

<div class="row">
    <div class="col-md-6">
        <ul>
            <li>Access to at least 40 more recipes</li>
            <li>Search recipes to avoid specific allergens and sensitivities</li>
            <li>Learn about substitutes for eggs, gluten, sweeteners, and diary</li>
            <li>Access sample weekly meal plans</li>
        </ul>
    </div>
    <div class="col-md-6">
        <ul>
            <li>Log food and reactions for phase 2 as you reintroduce foods</li>
            <li>Save your favorite recipes</li>
            <li>Create shopping lists for ingredients as you meal plan</li>
        </ul>
    </div>
</div>
<br>

<div class="row justify-content-md-center">
    <div class="col-lg-6">
        <div class="card bg-light"><br>
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
    </div>
</div>

<button class="btn btn-primary justify-content-md-center"><a href="login.php">Register Here</a></button><br>

<?php include('footer.php')?>