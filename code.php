<?php 
    session_start();
    
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "project_testing";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

    function redirect($url){
        header('Location: '.$url);
        exit();
    }

    if(isset($_POST['ship_btn'])){
        $record_id = $_POST['record_id'];
        $fname = $_POST['name'];
        $sname = $_POST['sname'];
        $address = $_POST['address'];
        $city =  $_POST['city'];
        $ward  = $_POST['ward'];
        $province = $_POST['province'];
        $country = $_POST['country']; 
        $contact = $_POST['contacts'];
        $note = $_POST['note'];

        $query = "UPDATE orders SET fname = '$fname', sname = '$sname', address = '$address', city = '$city', ward = '$ward', province = '$province', country = '$country', contact = '$contact', note = '$note' WHERE id='$record_id'";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            redirect("shipping.php?id=$record_id");
        } else{
            echo "Something Went Wrong <br>";
        }
    }
    if(isset($_POST['pay_btn'])){
        $record_id = $_POST['record_id'];

        redirect("payment.php?id=$record_id");
    }
    if(isset($_POST['pay_now_btn'])){
        $record_id = $_POST['record_id'];

        redirect("paid.php?id=$record_id");
    }
?>