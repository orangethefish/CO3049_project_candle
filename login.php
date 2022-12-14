<?php
include 'db_connection.php';
require_once('session.php');
$current_user = new User();
$_SESSION['current_user'] = $current_user;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login</title>
</head>



<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>
        
<div class="container p-5 my-5 border">
    <div class="box-login">
        <form class="form-login" method="POST" action="">
            <fieldset>
                <legend>
                    Sign in to your account
                </legend>
                <p>
                    Please enter your email and password to log in.<br/>
                </p>
<?php
session_start();
// define variables and set to empty values
$email = $password = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = OpenCon();
    $query ="SELECT * FROM `user_info`";
    //echo "Connected Successfully";
    $result=$conn->query($query);
    $email = valid_email($_POST["email"])?$_POST["email"]:"unset";
    $password = valid_password($_POST["password"])?$_POST['password']:"0";
    if ($result->num_rows > 0)
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
            
            if(strcmp($row['username'], $email)==0&&strcmp($row['password'], $password)==0){
                $current_user->setUser($email,$row['role']);
                $_SESSION['current_user'] = serialize($current_user);
                // echo "Login successfully.";
                header("Location: news.php");
                break;
            }else{
                echo '<div class="text-danger py-2">Wrong Email or Password!</div>';
            }
        }
    }   
    CloseCon($conn);  
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

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 3) {
        echo 'Password should be at least 3 characters in length and should include at least one upper/lowercase character and one number.';
        echo nl2br("\n");
        return false;
    }
    return true;
}
?>
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
                    <button type="submit" class="btn btn-primary pull-right" name="submit" onclick="">
                        Login <i class="fa fa-arrow-circle-right"></i>
                    </button>
                </div>

            </fieldset>
        </form>
        <p id="status"></p>
    </div>
</div>
 <footer class="py-5 bg-dark ">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>