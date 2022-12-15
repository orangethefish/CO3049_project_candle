<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script> -->
        <script src="https://unpkg.com/imask"></script>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/payment.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Payment</title>
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
                                <div class="row">
                                    <hr style="margin-left: 15px; margin-top: 5px; width: 95%; border: 1px solid rgba(86, 178, 128, 0.2);">
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <h6 class="stittle">Method</h6>
                                    </div>
                                    <div class="col-8">
                                        <p class="scontent">Standard shipping - FREE</p>
                                    </div>
                                    <div class="col-2" style="text-align: right">
                                        <a href="shipping.php" class="sedit">Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="row section-tittle">
                                    <h5 class="tittle">Payment method</h5>
                                </div>
                                <form name="myForm" action="code.php" method="POST" onsubmit="return validateForm()">
                                    <div class="row card-wrapper mt-4">
                                        <div class="row credit-card">
                                            <div class="col-3" style="width: fit-content;">
                                                <i class="fa fa-credit-card" style="font-size: 30px;"></i>
                                            </div>
                                            <div class="col-9 mt-2">
                                                <h6 class="cred">Credit Card</h6>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12" style="margin-bottom: 10px;">
                                                <input type="hidden" name="record_id" value="<?= $data['id'] ?>">
                                                <input type="text" name="card-num" id="card-num" minlength="14" placeholder="Card Number">
                                            </div>
                                            <div class="col-12" style="margin-bottom: 10px;">
                                                <input type="text" name="holder-name" id="holder-name" minlength="2" maxlength="40" placeholder="Holder Name">
                                            </div>
                                            <div class="col-6" style="margin-bottom: 30px;">
                                                <input type="text" name="exp" id="exp" minlength="5" placeholder="Expiration (MM/YY)">
                                            </div>
                                            <div class="col-6" style="margin-bottom: 30px;">
                                                <input type="text" name="cvv" id="cvv" minlength="3" placeholder="CVV"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3"  style="margin-left: 0px;">
                                        <div class="col-6 mt-5">
                                            <div class="row">
                                                <a href="shipping.php?id= <?= $data['id'] ?>" class="ret">Back to shipping</a>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5" style="width: 37%;">
                                            <button type="submit" class="btn go-pay-now" name="pay_now_btn">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
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

        <script>
            function validateForm() {
                let card_num = document.forms["myForm"]["card-num"].value;
                let name = document.forms["myForm"]["holder-name"].value;
                let exp = document.forms["myForm"]["exp"].value;
                let cvv = document.forms["myForm"]["cvv"].value;

                if (card_num == "") {
                    alert("Please enter a card number");
                    return false;
                }
                else if(name == ""){
                    alert("Name must be filled out");
                    return false;
                }
                else if(exp == ""){
                    alert("Please enter a expiration day");
                    return false;
                }
                else if(cvv == ""){
                    alert("Security code must be filled out");
                    return false;
                }
            }
        </script>
        <script src = "js/bootstrap.bundle.min.js"></script>
        <script src="js/card.js"></script>
    </body>
    </html>
