<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/details.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

        <title>Details</title>
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
                    ?>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="row mt-4">
                                <div class="container steps-wrapper">
                                    <h6 class="steps">
                                        <a href="#" class="step1">Cart</a>
                                        <span class="vector">></span>
                                        <a href="#" class="step2">Details</a>
                                        <span class="vector">></span>
                                        <a href="#" class="step3">Shipping</a>
                                        <span class="vector">></span>
                                        <a href="#" class="step4">Payment </a>
                                    </h6>
                                </div>
                            </div>
                            <div class="row">
                        <form name="myForm" action="code.php" method="POST" onsubmit="return validateForm()"> 
                        <div class="row mt-5">
                            <input type="hidden" name="record_id" value="<?= $data['id'] ?>">
                            <div class="col-4">
                                <div class="row section-tittle">
                                    <h5 class="tittle">Contact</h5>
                                </div>
                            </div>
                            <div class="col-3">
                            </div>
                            <div class="col-5 login">
                                <div class="row">
                                    <h6 style="font-size: 13px; letter-spacing: -0.9px; line-height: 26px; text-align: right;">Do you have an account? <span><a class="lgin" href="#">Login</a></span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <input type="text" name="contacts" id="contacts" placeholder="Email" value="<?= $data['contact'] ?>">
                        </div>
                        <div class="row mt-5">
                            <div class="row section-tittle">
                                <h5 class="tittle">Shipping Adress</h5>
                            </div>
                                <div class="row">
                                    <div class="col-6" style="width: 44%">
                                        <input type="text" id="name" name="name" minlength="2" maxlength="40" class="form-control" placeholder="Name" value="<?= $data['sname'] ?>">
                                    </div>
                                    <div class="col-6" style="width: 44%">
                                        <input type="text" id="sname" name="sname" minlength="2" maxlength="40" class="form-control" placeholder="Second Name" value="<?= $data['fname'] ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="address" name="address" minlength="5" maxlength="40" class="form-control" placeholder="Address" value="<?= $data['address'] ?>">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" id="note" name="note" maxlength="1000" class="form-control" placeholder="Shipping note(optional)" value="<?= $data['note'] ?>">
                                    </div>
                                    <div class="col-4">
                                        <input type="text" name="city" id="city" minlength="2" maxlength="40" class="form-control" placeholder="City" value="<?= $data['city'] ?>">
                                    </div>
                                    <div class="col-4" style="width: 28%">
                                        <select id="ward" name="ward">
                                            <option value="">Ward</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                    <div class="col-4" style="width: 27%">
                                        <select id="province" name="province">
                                            <option value="">Province</option>
                                            <option value="Tan Binh">Tan Binh</option>
                                            <option value="Tan Phu">Tan Phu</option>
                                            <option value="Binh Tan">Binh Tan</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="width: 88%">
                                        <select id="country" name="country">
                                            <option value="">Country</option>
                                            <option value="Vietnam">Vietnam</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mt-5">
                                        <div class="row">
                                            <a href="#" class="ret">Back to cart</a>
                                        </div>
                                    </div>
                                    <div class="col-6 mt-5" style="width: 37%;">
                                        <button type="submit" class="btn go-ship" name="ship_btn">Go to Shipping</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                } else{
                                echo "Record not found";
                                }
                            ?>
                            </div>
                        </div>
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
                                            <h6>Calculate on next step</h6>
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
            <?php
            } else{
                echo "Something went wrong";
            }
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function validateForm() {
                let fname = document.forms["myForm"]["name"].value;
                let sname = document.forms["myForm"]["sname"].value;
                let address = document.forms["myForm"]["address"].value;
                let city = document.forms["myForm"]["city"].value;
                let ward = document.forms["myForm"]["ward"].value;
                let province = document.forms["myForm"]["province"].value;
                let country = document.forms["myForm"]["country"].value;
                let contact = document.forms["myForm"]["contacts"].value;


                if(contact == ""){
                    alert("Please provide your email");
                    return false;
                }
                if (contact != ""){
                    var emailID = contact;
                        atpos = emailID.indexOf("@");
                        dotpos = emailID.lastIndexOf(".");
                    
                    if (atpos < 1 || (dotpos - atpos < 2)){
                        alert("Please enter a correct email")
                        return false;
                    }
                }
                if (fname == "") {
                    alert("First name must be filled out");
                    return false;
                }
                if(sname == ""){
                    alert("Second name must be filled out");
                    return false;
                }
                if(address == ""){
                    alert("Address must be filled out");
                    return false;
                }
                if(city == ""){
                    alert("City must be filled out");
                    return false;
                }
                if(ward == ""){
                    alert("Ward must be selected");
                    return false;
                }
                if(province == ""){
                    alert("Province must be selected");
                    return false;
                }
                if(country == ""){
                    alert("Country must be selected");
                    return false;
                }
            }
        </script>
        <script src = "js/jquery-3.6.1.min.js"></script>
        <script src = "js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
