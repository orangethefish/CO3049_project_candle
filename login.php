<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>

<?php
session_start();
// define variables and set to empty values
$email = $password = false;
$action = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = valid_email($_POST["email"]);
    $password = valid_password($_POST["password"]);

    if($email != true or $password != true){
        echo "Login failed.";
        $action = "";
    }
    else{
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["password"]=$_POST["password"];
        // $action = "info.php";
        // header("Location: info.php");
    }
}

function valid_email($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        echo $emailErr;
        echo nl2br("\n");
        return false;
    }

    return true;

}

function valid_password($password)
{
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper/lowercase character and one number.';
        echo nl2br("\n");
        return false;
    }
    return true;
}
?>

<body>
<div class="container p-5 my-5 border">
    <div class="box-login">
        <form class="form-login" method="POST" action="<?php if($action != "") echo $action;?>">
            <fieldset>
                <legend>
                    Sign in to your account
                </legend>
                <p>
                    Please enter your email and password to log in.<br/>
                </p>
                <div class="form-group">
                    <span class="input-icon">
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email address">
                        <i class="fa fa-user"></i> </span>
                </div>
                <div class="form-group form-actions">
                    <span class="input-icon">
                        <input id="password" type="password" class="form-control password" name="password" placeholder="Password"><i
                            class="fa fa-lock"></i>
                    </span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary pull-right" name="submit" onclick="validateForm()">
                        Login <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>

            </fieldset>
        </form>
        <p id="status"></p>

    </div>

    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>