<?php

include ('config/db_connect.php');

//check get request
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    //make sql
    $sql = "SELECT * FROM product WHERE id = $id";

    //get results
    $results = mysqli_query($conn, $sql);

    //fetch results
    $products = mysqli_fetch_assoc($results);
    mysqli_free_result($results);
    mysqli_close($conn);

}

?>

<html>
<head>
    <title>Details</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
<?php include ('templates/lheader.php'); ?>
<h1 class="project-title">Product Details</h1>
<br>
<div class="container">
  <div class="grid">
  <?php if($products): ?>
    <h1 class="card-title"><?php echo htmlspecialchars($products['product_name']) ?></h1>


    <?php else: ?>


    <?php endif; ?>


    <div class="card-container">
      <h2 class="card-price"><span class="currency">₦</span><?php echo htmlspecialchars($product['product_price']) ?></h2>
      <h1 class="card-title"><?php echo htmlspecialchars($product['product_name']) ?></h1>
      <div class="card-image-container">
         <img src="https://cdn.pixabay.com/photo/2013/07/12/18/39/smartphone-153650_960_720.png" alt=""/>
      </div>
      <a class="cart-btn" href="details.php"><h6>details</h6></a>
    </div>


  </div>
</div>
<br>
<br>
<?php include ('templates/footer.php'); ?>
</body>

</html>