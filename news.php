<?php
include 'db_connection.php';
session_start();
$conn = OpenCon();
$query ="SELECT * FROM `product_testing_news`";
//echo "Connected Successfully";
$result=$conn->query($query);
// if ($result->num_rows > 0)
// {
//    // OUTPUT DATA OF EACH ROW
//    while($row = $result->fetch_assoc())
//    {
//        echo "Roll No: " .
//            $row["id"]. " - Name: " .
//            $row["author"]. " | Description: " .
//            $row["headline"]. " | Price: " .
//            $row["detail"]. " | Image: " ."<br>";
//    }
// }
// else {
//    echo "0 results";
// }
// CloseCon($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="news.css">
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <title>News</title>
</head>

<body>
    
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
    <!--Section: News of the day-->
    <div class="card d-flex mx-auto my-5" style="width: 75%">
        <div class="card-body">
            <!--Table-->
            <table class="table-responsive">
            </table>
            <table class="table table-hover table-forum text-center">
                <!--Table head-->
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-left">Topic</th>
                        <th>Comments</th>
                    </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                    <?php
                        if ($result->num_rows > 0){
                        // OUTPUT DATA OF EACH ROW
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            echo '<td scope="row" class="text-nowrap">
    
                            <a href="detail.php?id=' . $row['id'] . '" type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">
                                <span class="value">'.$row['like_count'].'</span>
                                <i class="fas fa-thumbs-up ml-1"></i>
                            </a>
                            <a href="detail.php?id=' . $row['id'] . '" button" class="btn btn-outline-primary btn-sm p-1 m-0 waves-effect">
                                <span class="value">'.$row['like_count'].'</span>
                                <i class="fas fa-thumbs-down ml-1"></i>
                            </a>
                        </td>';
                            echo '<td class="text-start">
                            <a href="detail.php?id=' . $row['id'] . '" class="font-weight-bold text-success">',$row['headline'].'</a>';
                            echo '<div class="my-2">
                                <span class="text-dark">
                                <strong>' . $row['author'] . '</strong></span>';
                            echo '<span> ' . $row['date'] . '</span>';
                            echo '</div>';
                            echo '</td>';
                            echo '<td>
                            <a href="detail.php?id=' . $row['id'] . '" class="text-dark">
                                <span>'.$row['comment_count'].'</span>
                                <i class="fas fa-comments ml-1"></i>
                            </a>
                            </td>';
                        }
                        }else {
                        echo "No headlines!";
                        }
                        CloseCon($conn);
                    ?>
                    <!-- <tr>
                        <td scope="row" class="text-nowrap">
    
                            <a href="#" type="button" class="btn btn-outline-dark-green btn-sm p-1 m-0 waves-effect">
                                <span class="value">0</span>
                                <i class="fas fa-thumbs-up ml-1"></i>
                            </a>
                            <a href="#" button" class="btn btn-outline-primary btn-sm p-1 m-0 waves-effect">
                                <span class="value">0</span>
                                <i class="fas fa-thumbs-down ml-1"></i>
                            </a>
                        </td>
                        <td class="text-start">
                            <a href="#" class="font-weight-bold text-success">
                                Styling in the Shadow DOM With CSS Shadow Parts
                            </a>
                            <div class="my-2">
                                <a href="#" class="text-success">
                                    <strong>MDBootstrap</strong>
                                </a>
                                <span class="badge bg-secondary mx-1">staff</span><span
                                    class="badge bg-primary mx-1">pro</span><span
                                    class="badge bg-warning mx-1">premium</span>
                                <span>a year ago</span>
                                <div></div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="text-dark">
                                <span>0</span>
                                <i class="fas fa-comments ml-1"></i>
                            </a>
                        </td>
                    </tr>
                     -->
                </tbody>
                <!--Table body-->
            </table>
    
            <!-- Table -->
    
            <!--Bottom Table UI-->
            <div class="d-flex justify-content-center ">
                <!--Pagination -->
                <nav class="my-2 pt-2">
                    <ul class="pagination pagination-circle pg-info mb-0">
                        <!--First-->
                        <li class="page-item clearfix d-none d-md-block">
                            <a href="#" class="page-link waves-effect">
                                First </a>
                        </li>
                        <!--Arrow left-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">
                                    Previous </span>
                            </a>
                        </li>
                        <!--Numbers-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">11</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">12</a>
                        </li>
                        <li class="page-item active">
                            <a href="#" class="page-link waves-effect">13</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">14</a>
                        </li>
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect">15</a>
                        </li>
                        <!--Arrow right-->
                        <li class="page-item">
                            <a href="#" class="page-link waves-effect" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <!--First-->
                        <li class="page-item clearfix d-none d-md-block">
                            <a href="#" class="page-link waves-effect">
                                Last </a>
                        </li>
                    </ul>
                </nav>
                <!--/Pagination -->
            </div>
            <!--Bottom Table UI-->
        </div>
    </div>
    
    <!--Section: News of the day-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>