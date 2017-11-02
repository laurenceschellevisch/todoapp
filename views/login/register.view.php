<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ToDo Login</title>
    <?php require('views/partials/load.php'); ?>
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form action="/registeraccount" method="post">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">User name</label>
                            <input required class="form-control" name="name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input required class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">Password</label>
                            <input required class="form-control" name="pass" id="exampleInputPassword1" type="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleConfirmPassword">Confirm password</label>
                            <input required class="form-control" name="pass2nd" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Register">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="/">Login Page</a>
                <a class="d-block small" href="forgot-password.html">Forgot Password? doesnt work yet</a>
            </div>
        </div>
    </div>
</div>
<?php require('views/partials/loadjs.php'); ?>
</body>

</html>
