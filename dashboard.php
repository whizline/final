<?php
include ('config/db_connect.php');
// show products 
$sql = 'SELECT product_image, product_name, product_price FROM product ORDER BY id';

//get results

$results = mysqli_query($conn,$sql);

//get the reults as array

$product = mysqli_fetch_all($results, MYSQLI_ASSOC);

mysqli_free_result($results);

mysqli_close($conn);



?>

<html>
    <head>
    <title>Market Place</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<?php include ('templates/lheader.php'); ?>
<h1 class="project-title">My Products</h1>
<br>
<div class="container">
  <div class="grid">
  <?php foreach($product as $product){ ?>

    <div class="card-container">
      <h2 class="card-price"><span class="currency">₦</span><?php echo htmlspecialchars($product['product_price']) ?></h2>
      <h1 class="card-title"><?php echo htmlspecialchars($product['product_name']) ?></h1>
      <div class="card-image-container">
         <img src="https://cdn.pixabay.com/photo/2013/07/12/18/39/smartphone-153650_960_720.png" alt=""/>
      </div>
      <a class="cart-btn" href="details.php"><h6>details</h6></a>
    </div>


    <?php }?>
  </div>
</div>
<br>
<br>
<?php include ('templates/footer.php'); ?>
</body>
</html>