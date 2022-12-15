<?php 

include('db_connection.php');
$con = openCon();

function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query); 
}

function getId($table, $id){
    global $con;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con, $query); 
}

function redirect($url){
    header('Location: '.$url);
    exit();
}


?>