<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Log In</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div style="color :rgb(255,0,0)"><?php echo $data['login_err']; ?></div>
            <div class="form-group">
                <label for="username">Username: <sup>*</sup></label>
                <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
            </div>


            <div class="row">
                <div class="col">
                <input type="submit" value="Login" style='margin-top: 2em;' class="btn btn-primary btn-block">
                </div>
            </div>

            </form>
        </div>
        </div>
        </div>
    </div>
</body>
</html>