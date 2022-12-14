<?php
function numcheck($value){
    for($i = 0; $i < strlen($value); $i++){
        if(strcmp($value[$i],'0')==-1||strcmp($value[$i],'9')==1){
            header("Location: news.php");
            // echo $value[$i];
            break;
        }
    }
}
include 'db_connection.php';
session_start();
$conn = OpenCon();
// echo $_SERVER['REQUEST_URI'];
$id=$_GET['id'];
numcheck($id);
$author = "";
$headline = "";
$date = 0;
$image = "";
$detail = "";
$like_count = 0;
$dislike_count = 0;
$comment_count = 0;
$query ="SELECT * FROM `product_testing_news`";
//echo "Connected Successfully";
$result=$conn->query($query);
if ($result->num_rows > 0)
{
   // OUTPUT DATA OF EACH ROW
   while($row = $result->fetch_assoc())
   {
       if($row['id']==$id){
        $author = $row['author'];
        $headline = $row['headline'];
        $date = $row['date'];
        $image = $row['image'];
        $detail= $row['detail'];
        $like_count = $row['like_count'];
        $dislike_count= $row['dislike_count'];
        $comment_count= $row['comment_count'];
            break;
       }
   }
}
CloseCon($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['comment'])) {
        $conn = OpenCon();
        $sql = "INSERT INTO news_comment (post_no, owner, date, detail)
        VALUES ('.$id.', 'Orange','".$date."','".$_POST['comment']."')";

        if ($conn->query($sql) === TRUE) {
        //   echo "New record created successfully";
        } else {
        //   echo "Error: " . $sql . "<br>" . $conn->error;
        }
    CloseCon($conn);
}
if(isset($_POST['delete_id'])) {
    $conn = OpenCon();
    $delete_id = $_POST['delete_id'];
    $delete = "DELETE FROM news_comment WHERE id = '$delete_id'";
    if ($conn->query($delete) === TRUE) {
        //   echo "Record deleted successfully";
        } else {
        //   echo "Error: " . $sql . "<br>" . $conn->error;
    }
    CloseCon($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post </title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/bootstrap.css">
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
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <?php echo '<h1 class="fw-bolder mb-1">'.$headline.'</h1>'; ?>
                            <!-- Post meta content-->
                            <?php echo '<div class="text-muted fst-italic mb-2">Posted on '.$date. ' by '.$author.'</div>'; ?>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Candle</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Fragrant</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="<?php echo $image?>" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?php echo $detail ?></p>
                            <!-- <p class="fs-5 mb-4">The universe is large and old, and the ingredients for life as we know it are everywhere, so there's no reason to think that Earth would be unique in that regard. Whether of not the life became intelligent is a different question, and we'll see if we find that.</p>
                            <p class="fs-5 mb-4">If you get asteroids about a kilometer in size, those are large enough and carry enough energy into our system to disrupt transportation, communication, the food chains, and that can be a really bad day on Earth.</p> -->
                            <!-- <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>
                            <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                            <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p> -->
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4" method="POST" action="">
                                    <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="comment"></textarea>
                                    <div class="form-actions my-2">
                                        <button type="submit" class="btn btn-success pull-right" name="submit">
                                            Submit <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- Comment with nested comments-->
                                <!-- <div class="d-flex mb-4"> -->
                                    <!-- Parent comment-->
                                    <!-- <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks. -->
                                        <!-- Child comment 1-->
                                        <!-- <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div> -->
                                        <!-- Child comment 2-->
                                        <!-- <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                                <!-- Single comment-->
                                <?php
                                $conn = OpenCon();
                                $query ="SELECT * FROM `news_comment` ORDER BY id ASC";
                                //echo "Connected Successfully";
                                $result=$conn->query($query);
                                if ($result->num_rows > 0)
                                {
                                   // OUTPUT DATA OF EACH ROW
                                   while($row = $result->fetch_assoc())
                                   {
                                       if($row['post_no']==$id){
                                            echo '<form class="mb-4" method="POST" action="">
                                            <div class="d-flex my-2">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" width="40px" alt="..." /></div>
                                    <div class="ms-3 container">
                                        <div class="fw-bold">'.$row['owner'].'</div>
                                        '.$row['detail'].'
                                        </div>
                                        <input type="hidden" name="delete_id" value="'.$row['id'].'" />
                                        <button type="submit" class="btn btn-danger pull-right" name="Delete">
                                            Delete <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                    </form>';
                                       }
                                   }
                                }
                                else {
                                   echo "0 results";
                                }
                                CloseCon($conn);
                                ?>
                                <!-- <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-success" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!" class="text-success">Candle</a></li>
                                        <li><a href="#!" class="text-success">Fragrant</a></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <!-- <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="detail.js"></script>
    </body>
</html>
