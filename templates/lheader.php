<style>
.navbar {
  display: flex;
  align-items: center;
  padding: 20px;
}

nav {
  flex: 1;
  text-align: right;
}

nav ul {
  display: inline-block;
  list-style-type: none;
}

nav ul li {
  display: inline-block;
  margin-right: 20px;
}

a {
  text-decoration: none;
  color: #555;
}
.navcontainer {
  max-width: 1300px;
  margin: auto;
  padding-left: 25px;
  padding-right: 25px;
}
.menu-icon {
  width: 28px;
  margin-left: 20px;
  display: none;
}
@media only screen and (max-width: 800px) {
  nav ul {
    position: absolute;
    top: 70px;
    left: 0;
    background: #333;
    width: 100%;
    overflow: hidden;
    transition: max-height 0.5s;
  }
  nav ul li {
    display: block;
    margin-right: 50px;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  nav ul li a {
    color: #fff;
  }
  .menu-icon {
    display: block;
    cursor: pointer;
  }
}

ul {
  list-style-type: none;
}



</style>
<div class="navcontainer">
  <div class="navbar">
    <div class="logo">
      <a href="index.php"><img src="https://i.ibb.co/kDVwgwp/logo.png" alt="RedStore" width="125px" /></a>
    </div>
    <nav>
      <ul id="MenuItems">
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="myproducts.php">My Products</a></li>
        <li><a href="addp.php">Add Product</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <img src="https://i.ibb.co/6XbqwjD/menu.png" alt="" class="menu-icon" onclick="menutoggle()" />
  </div>
</div>
<!-- js for toggle menu -->
<script>
  var MenuItems = document.getElementById('MenuItems');
  MenuItems.style.maxHeight = '0px';

  function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
      MenuItems.style.maxHeight = '200px';
    } else {
      MenuItems.style.maxHeight = '0px';
    }
  }
</script>