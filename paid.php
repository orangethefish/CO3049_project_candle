<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/paid.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>\
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Thank you</title>
    </head>
    <body>
    <?php 
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "project_testing";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

        function getId($table, $id){
            global $conn;
            $query = "SELECT * FROM $table WHERE id='$id'";
            return $query_run = mysqli_query($conn, $query); 
        }
    ?>
        <div class="container mt-5">
            <div class="row">
                <img class="icon" src="img/icon.png" alt="icon">
            </div>
            <?php 
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $order = getId("orders", $id);

                if(mysqli_num_rows($order) > 0){
                    $data = mysqli_fetch_array($order);
                    $addr = $data['address'] . ", Ward " . $data['ward'] . ", Province " . $data['province'] . ", " . $data['city'] . ", " . $data['country'];
                    ?>   
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row mt-4">
                                <div class="container steps-wrapper">
                                    <h6 class="steps">
                                        <a href="#" class="step1">Cart</a>
                                        <span class="vector">></span>
                                        <a href="details.php?id= <?= $data['id'] ?>" class="step2">Details</a>
                                        <span class="vector">></span>
                                        <a href="shipping.php?id= <?= $data['id'] ?>" class="step3">Shipping</a>
                                        <span class="vector">></span>
                                        <a href="payment.php?id= <?= $data['id'] ?>" class="step4">Payment </a>
                                    </h6>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12" style="margin-left: 30%;">
                                    <i class="fa fa-check-circle" style="font-size:200px;color:rgba(86, 178, 128, 0.6);"></i>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <h3 style="margin-left: 23%;">Payment Comfirmed</h3>
                            </div>
                            <div class="row mt-4">
                                <p>Thank you for buying. Now that your order is confirmed it will be ready to ship in 2 days.</p>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12" style="width: fit-content; margin-left: 31%;">
                                    <a href="#" class="btn go-back">Back to shopping</a>
                                </div>
                            </div>
                        </div>
                        <?php
                } else{
                echo "Record not found";
                }
                ?>
                <div class="col-md-6 mt-4" style="background-color: #F2F2F2;">
                    <div class="row mt-5">
                        <div class="col-12 product" style="width: 88%;">
                            <?php 
                            $product = getId("product_testing_detail", $id);
                            $order = getId("orders", $id);

                            if(mysqli_num_rows($product) > 0){
                                $dt = mysqli_fetch_array($product);
                                $data = mysqli_fetch_array($order);
                                $total = $dt['price']*$data['quantity'];
                                    ?>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="<?= $dt['image'] ?>" alt="product" class="product-img">
                                    </div>
                                    <div class="col-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6 class="product-name"><?= $dt['name'] ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="price">$ <?= $dt['price'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr style="margin-top: 50px; width: 88%;">
                                </div>
                                <div class="row">
                                    <div class="row">
                                        <div class="col-6" style="text-align: left;">
                                            <h6>Quantity</h6>
                                        </div>
                                        <div class="col-6" style="text-align: right; width: 43%;">
                                            <h6> <?= $data['quantity'] ?> </h6>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6" style="text-align: left;">
                                            <h6>Subtotal</h6>
                                        </div>
                                        <div class="col-6" style="text-align: right; width: 43%;">
                                            <h6>$ <?= $total ?></h6>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-6" style="text-align: left;">
                                            <h6>Shipping</h6>
                                        </div>
                                        <div class="col-6" style="text-align: right; width: 43%;">
                                            <h6>Free Shipping</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <hr style="margin-top: 50px; width: 88%;">
                                </div>

                                <div class="row mb-5">
                                    <div class="row">
                                        <div class="col-6" style="text-align: left;">
                                            <h6>Total</h6>
                                        </div>
                                        <div class="col-6" style="text-align: right; width: 43%;">
                                            <h5>$ <?= $total ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else{
                            echo "Record not found";
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            } else{
                echo "Something went wrong";
            }
            ?>
            </div>
        </div>

        <script src = "js/jquery-3.6.1.min.js"></script>
        <script src = "js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
