<?php

include ('config/db_connect.php');

if (isset($_POST['submit'])) {
    //check product name
    $file = mysqli_real_escape_string($conn, $_POST['file']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $pprice = mysqli_real_escape_string($conn, $_POST['pprice']);
    $pdesc = mysqli_real_escape_string($conn, $_POST['pdesc']);

    //create sql
    $sql = "INSERT INTO product(product_image,product_name,product_price,product_desc)  VALUES ('$file', '$pname', '$pprice', '$pdesc')";

    //save to db

    if(mysqli_query($conn, $sql)){
        //success
        header('location: dashboard.php');
    
    }else{
        //error
        echo 'query error: ' . mysqli_error($conn);

    }
   

}



?>


<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Add Product</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
        <!-- https://fonts.google.com/specimen/Roboto -->
        <link rel="stylesheet" href="css/fontawesome.min.css" />
        <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
        <!-- http://api.jqueryui.com/datepicker/ -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- https://getbootstrap.com/ -->
        <link rel="stylesheet" href="css/templatemo-style.css">
    </head>

    <body>
        <?php include ('templates/lheader.php'); ?>
        <div class="container tm-mt-big tm-mb-big">
            <div class="row">
                <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tm-block-title d-inline-block">Add Product</h2>
                            </div>
                        </div>
                        <div class="row tm-edit-product-row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <form action="addp.php" method="POST" class="tm-edit-product-form">
                                    <div class="form-group mb-3">
                                        <label for="name">Product Name</label>
                                        <input id="name" name="pname" type="text" class="form-control validate" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Product Price</label>
                                        <input id="name" name="pprice" type="text" class="form-control validate" required />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea name="pdesc" class="form-control validate" rows="3" required></textarea>
                                    </div>

                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-dummy mx-auto">
                                    <i class="fas fa-cloud-upload-alt tm-upload-icon" name="upimage"
                                        onclick="document.getElementById('fileInput').click();"></i>
                                </div>
                                <div class="custom-file mt-3 mb-3">
                                    <input id="fileInput" type="file" style="display:none;" />
                                    <input name="file" type="button" class="btn btn-primary btn-block mx-auto"
                                        value="UPLOAD PRODUCT IMAGE"
                                        onclick="document.getElementById('fileInput').click();" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add
                                    Product
                                    Now</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
        <!-- https://jqueryui.com/download/ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- https://getbootstrap.com/ -->
        <script>
        $(function() {
            $("#expire_date").datepicker();
        });
        </script>
        <?php include ('templates/footer.php'); ?>
    </body>

</html>