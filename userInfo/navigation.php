<?php 
require_once '../../sessionStart.php'; 
require_once '../../accessDatabaseClass.php'; 

require_once '../../databaseClasses/categoryClass.php';
require_once '../../databaseClasses/subcategoryClass.php';
?>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="../../index.php">Clash Games</a>
    </div>
    <div class="navbar-collapse collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <?php
          $ifActive = array("/index.php"=>"", "/products.php"=>"", "/sqlManagmentFiles/productFiles/productIndex.php"=>"", "/contact.php"=>"", "/cart.php"=>"", "/logout.php"=>"", "/profile.php"=>"", "/register.php"=>"", "/login.php"=>"");

          $ifActive[$_SERVER['PHP_SELF']] = "active";
          echo '<li class="' . $ifActive["/index.php"] . '"><a href="../../index.php">Home</a></li>';
          echo'<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../../products.php">All Products</a></li>';
            $subcategory = new subcategoryDataAccess();
            foreach($subcategory->readData(1)[1] as $innerRow)
            {
              echo '<li><a href="../../products.php?id=' . $innerRow['id'] . '">' . $innerRow['name'] . '</a></li>';
            }
            echo'</ul>
          </li>';
          if(!empty($_SESSION['permission']))
          {
            if($_SESSION['permission'] == 1)
            {
              //<li><a href="../customer_addressFiles/customer_addressIndex.php">Customer Address</a></li>
              //<li><a href="../customer_paymentFiles/customer_paymentIndex.php">Customer Payment</a></li>
              //echo '<li class="' . $ifActive["/sqlManagmentFiles/productFiles/productIndex.php"] . '"><a href="sqlManagmentFiles/productFiles/productIndex.php">Admin</a></li>';
              echo'<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin Tables <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="../addressFiles/addressIndex.php">Address</a></li>
                  <li><a href="../binFiles/binIndex.php">Bin</a></li>
                  <li><a href="../categoryFiles/categoryIndex.php">Category</a></li>
                  <li><a href="../customerFiles/customerIndex.php">Customer</a></li>
                  
                  <li><a href="../imageFiles/imageIndex.php">Image</a></li>
                  <li><a href="../paymentFiles/paymentIndex.php">Payment</a></li>
                  <li><a href="../product_binFiles/product_binIndex.php">Product Bin</a></li>
                  <li><a href="../product_tagFiles/product_tagIndex.php">Product Tag</a></li>
                  <li><a href="../productFiles/productIndex.php">Product</a></li>
                  <li><a href="../shipment_centerFiles/shipment_centerIndex.php">Shipment Center</a></li>
                  <li><a href="../subcategoryFiles/subcategoryIndex.php">Subcategory</a></li>
                  <li><a href="../tagFiles/tagIndex.php">Tag</a></li>
                  <li><a href="../transaction_addressFiles/transaction_addressIndex.php">Transaction Address</a></li>
                  <li><a href="../transaction_productFiles/transaction_productIndex.php">Transaction Product</a></li>
                  <li><a href="../transactionFiles/transactionIndex.php">Transaction</a></li>
                  <li><a href="../Files/lkmerIndex.php"></a></li>
                  <li><a href="../Files/lkermgIndex.php"></a></li>
              </ul>';
            }
          }
        
      echo '</ul>
      <ul class="nav navbar-nav navbar-right">';
      ?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Search <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <form class="navbar-form" role="search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="searchField" id="searchField">
              </div>
            </form>
          </ul>
      </li>
      <?php
          $sql = 'SELECT SUM(quantity) as fullQuantity FROM transaction t JOIN transaction_product tp ON tp.transaction_id = t.id JOIN product p ON p.id = tp.product_id JOIN image i ON i.product_id = p.id WHERE cart = 1 AND customer_ID = 3';
          foreach ($pdo->query($sql) as $row) {
              $quantity = $row['fullQuantity'];
          }

          echo '<li class="' . $ifActive["/cart.php"] . '"><a href="../../cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Cart ' . $quantity . '</a></li>';

              if(isset($_SESSION['username']))
              {
                echo '<li class="' . $ifActive["/logout.php"] . '"><a href="../../logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>';
                echo '<li class="' . $ifActive["/profile.php"] . '"><a href="../../profile.php">Welcome, ' . $_SESSION['username'] . '</a></li>';
              }else
              {
                echo '<li class="' . $ifActive["/register.php"] . '"><a href="../../register.php"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>';
                echo '<li class="' . $ifActive["/login.php"] . '"><a href="../../login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>';
              }
        ?>
      </ul>
    </div>
  </div>
</nav>

