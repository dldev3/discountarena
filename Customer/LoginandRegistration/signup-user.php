<?php
session_start();
require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <a href="/"> <button class="btn"><i class="fa fa-home"></i></button></a>
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center" style="color : #FC3CEE ">Signup Form</h2>
                    <p class="text-center" style="color : #FC3CEE ">It's quick and easy.</p>
                    <?php
                    if (count($errors) == 1) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $showerror) {
                                echo $showerror;
                            }
                            ?>
                        </div>
                    <?php
                    } elseif (count($errors) > 1) {
                    ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($errors as $showerror) {
                            ?>
                                <li><?php echo $showerror; ?></li>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="number" placeholder="Mobile Number" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="dob" name="dob" placeholder="Date of Birth" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="address" name="address" placeholder="Address" required>
                    </div>


                    <p style="color : #FC3CEE ">Insert the product images : </p>

                    <input type="file" placeholder="Address" accept="image/*" name="image">
                    <br>
                    <br>
                    <br>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center" style="color : #fff ">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>