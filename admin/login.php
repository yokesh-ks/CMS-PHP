<?php  
session_start();
 require('../config/connect.php');

if (isset($_POST['email']) and isset($_POST['password'])){

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connection, $_POST['password']));

    $query = "SELECT * FROM `users` WHERE email='$email' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['email'] = $email;
        header('location: index.php');
        //echo "user exists";
    }
    else{
        $fmsg = "Invalid Login Credentials.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="login">
    <div class="container">
        <div class="row main">
        
            <div class="panel-heading">
                <div class="panel-title text-center">
                <img src="../images/logo.png">
                <hr/>
                </div>
            </div>
            <!-- form -->
            <div class="main-login main-center">
            <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                <form class="form-horizontal" method="post" action="#">
                
                    <div class="form-group">
                        <label class="cols-sm-2 control-label" for="email">Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope fa" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="cols-sm-2 control-label" for="password">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope fa" aria-hidden="true"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Enter password" name="password" id="password"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>