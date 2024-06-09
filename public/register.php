<?php

require __DIR__ . '/../src/bootstrap.php';
require __DIR__ . '/../src/register.php';
?>

<?php view('header', ['title' => 'Register']) ?>

<!-- <form action="register.php" method="post">
    <h1>Sign Up</h1>

    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?//= $inputs['username'] ?? '' ?>"
               class="<?//= error_class($errors, 'username') ?>">
        <small><?//= $errors['username'] ?? '' ?></small>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?//= $inputs['email'] ?? '' ?>"
               class="<?//= error_class($errors, 'email') ?>">
        <small><?//= $errors['email'] ?? '' ?></small>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?//= $inputs['password'] ?? '' ?>"
               class="<?//= error_class($errors, 'password') ?>">
            
    </div>

    <div>
        <label for="password2">Password Again:</label>
        <input type="password" name="password2" id="password2" value="<?//= $inputs['password2'] ?? '' ?>"
               class="<?//= error_class($errors, 'password2') ?>">
        <small><?//= $errors['password2'] ?? '' ?></small>
    </div>

    <div>
        <label for="agree">
            <input type="checkbox" name="agree" id="agree" value="checked" <?//= $inputs['agree'] ?? '' ?> /> I
            agree
            with the
            <a href="#" title="term of services">term of services</a>
        </label>
        <small><?//= $errors['agree'] ?? '' ?></small>
    </div>

    <button type="submit">Register</button>

    <footer>Already a member? <a href="login.php">Login here</a></footer>

</form> -->

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">I;M</h1>

            </div>
            <h3>Register to IndoMobil</h3>
            <form class="m-t" action="register.php" method="POST">
                <div class="form-group">
                    <!-- <input type="text" class="form-control" placeholder="Name" required=""> -->
                    <input type="text" name="username" id="username" value="<?= $inputs['username'] ?? '' ?>"
                        class="form-control" placeholder="Username" required="">

                </div>
                <div class="form-group">
                    <!-- <input type="email" class="form-control" placeholder="Email" required=""> -->
                    <input type="text" name="alamat" id="alamat" value="<?= $inputs['alamat'] ?? '' ?>"
                        class="form-control" placeholder="Alamat" required="">

                </div>
                <div class="form-group">
                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                    <input type="number" name="no_telepon" id="no_telepon" value="<?= $inputs['no_telepon'] ?? '' ?>"
                        class="form-control" placeholder="Nomer HP" required="">

                </div>
                <div class="form-group">
                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                    <input type="email" name="email" id="email" value="<?= $inputs['email'] ?? '' ?>"
                        class="form-control" placeholder="Email" required="">

                </div>
                <div class="form-group">
                    <select class="form-control">
                        <option value="Pelanggan">Pelanggan</option>
                        <option value="Pegawai">Pegawai</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input type="password" class="form-control" placeholder="Password" required=""> -->
                    <input type="password" name="password" id="password" value="<?= $inputs['password'] ?? '' ?>"
                        class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label for="agree">
                            <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox"
                                    style="position: absolute; opacity: 0;"><ins class="iCheck-helper"
                                    style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div><i></i> <input type="checkbox" name="agree" value="1" <?php echo isset($inputs['agree']) ? 'checked' : ''; ?> required> I agree to the terms of service
                            
                        </label><br>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 © 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <?php
    // Tampilkan pesan kesalahan
    // if ($message = get_message()) {
    //     echo "<p>{$message}</p>";
    // }
    ?>

    <?php view('footer') ?>