<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/login.php';
?>

<?php view('header', ['title' => 'Login']) ?>

<?php if (isset($errors['login'])): ?>
    <div class="alert alert-error">
        <?= $errors['login'] ?>
    </div>
<?php endif ?>

<!-- <form action="login.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?//= $inputs['username'] ?? '' ?>">
            <small><?//= $errors['username'] ?? '' ?></small>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <small><?//= $errors['password'] ?? '' ?></small>
        </div>
        <section>
            <button type="submit">Login</button>
            <a href="register.php">Register</a>
        </section>
    </form> -->


<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">I;M</h1>

        </div>
        <h3>Welcome to IndoMobil</h3>
        <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        <form class="m-t" role="form" action="login.php" method="POST">
            <div class="form-group">
                <!-- <input type="email" class="form-control" placeholder="Username" required=""> -->
                <input class="form-control" type="text" name="username" id="username"
                    value="<?= $inputs['username'] ?? '' ?>" placeholder="Username" required="">
                
            </div>
            <div class="form-group">
                <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                <input class="form-control" type="password" name="password" id="password" placeholder="Password" required="">
                
            </div>
            <section>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
            </section>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="../src/assets/js/jquery-3.1.1.min.js"></script>
<script src="../src/assets/js/bootstrap.min.js"></script>


<?php view('footer') ?>