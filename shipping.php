<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/shipping.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

        <title>Shipping</title>
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
                                        <a href="#" class="step3">Shipping</a>
                                        <span class="vector">></span>
                                        <a href="#" class="step4">Payment </a>
                                    </h6>
                                </div>
                            </div>            
                            <div class="row mt-4 boxes">
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <h6 class="stittle">Contact</h6>
                                    </div>
                                    <div class="col-8">
                                        <p class="scontent"><?= $data['contact'] ?></p>
                                    </div>
                                    <div class="col-2" style="text-align: right">
                                        <a href="details.php?id=<?= $data['id'] ?>" class="sedit">Edit</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <hr style="margin-left: 15px; margin-top: 5px; width: 95%;">
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <h6 class="stittle">Ship to</h6>
                                    </div>
                                    <div class="col-8">
                                        <p class="scontent"><?= $addr ?></p>
                                    </div>
                                    <div class="col-2" style="text-align: right">
                                        <a href="details.php?id=<?= $data['id'] ?>" class="sedit">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="row section-tittle" style="margin-left: 0px;">
                                    <h5 class="tittle">Shipping method</h5>
                                </div>
                            </div>
                            <form name="myForm" action="code.php" method="POST" onsubmit="return validateForm()">
                                <div class="row mt-3 boxes">
                                    <div class="row" style="padding: 1%;">
                                        <div class="col-2">
                                            <input type="hidden" name="record_id" value="<?= $data['id'] ?>">
                                            <input type="checkbox" name="shipping-check" id="shipping-check">
                                        </div>
                                        <div class="col-8">
                                            <p class="scontent" style="margin-top: 20px">Standard Shipping</p>
                                        </div>
                                        <div class="col-2">
                                            <h6 class="shipping-cost" style="margin-top: 20px; text-align: right;">Free</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5"  style="margin-left: 10px;">
                                    <div class="col-6 mt-5">
                                        <div class="row">
                                            <a href="details.php?id=<?= $data['id'] ?>" class="ret">Back to details</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-5" style="width: 37%;">
                                        <button type="submit" class="btn go-pay" name="pay_btn">Go to Payment</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                    } else{
                    echo "Record not found";
                    }
                    ?>
                </div>
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
        <script>
            function validateForm() {
                let checkbox = document.forms["myForm"]["shipping-check"];

                if (!checkbox.checked) {
                    alert("Please choose a shipping method");
                    return false;
                }
            }
        </script>
        <script src = "js/jquery-3.6.1.min.js"></script>
        <script src = "js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
