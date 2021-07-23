<?php
include ('config/db_connect.php');
// show products 
$sql = 'SELECT product_image, product_name, product_price, product_desc, id FROM product ORDER BY created_at';

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
<?php include ('templates/header.php'); ?>
<h1 class="project-title">Products</h1>
<br>
<div class="container">
  <div class="grid">
  <?php foreach($product as $product){ ?>

    <div class="card-container">
      <h2 class="card-price"><span class="currency">₦</span><?php echo htmlspecialchars($product['product_price']) ?></h2>
      <h1 class="card-title"><?php echo htmlspecialchars($product['product_name']) ?></h1>
      <div class="card-image-container">
        <?php echo htmlspecialchars($product['product_image']) ?>
         <img src="https://clipart-db.ru/file_content/rastr/smartphone_025.png" alt=""/>
      </div>
      <a class="cart-btn" href="details.php?id=<?php echo $product['id']?>"><h6>details</h6></a>
    </div>


    <?php }?>
  </div>
</div>
<br>
<br>
<?php include ('templates/footer.php'); ?>
</body>
</html>