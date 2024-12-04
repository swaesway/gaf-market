<?php 



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/bus.png" rel="icon">
  <link href="../assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
  <!-- Vendor CSS Files -->
  
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/addproduct.css" rel="stylesheet">
  <link href="../assets/css/contactUs.css" rel="stylesheet">
</head>

<style>
  .header{
    background-color: #0a2d02;
  }
  
  .sidebar-nav {
    padding: 0;
    margin: 0;
    list-style: none;
}

.sidebar-nav > li {
    margin-bottom: 15px;
    background: #f6f9ff;
    border-radius: 4px;
    padding: 10px;
}

.sidebar-nav .filter-section {
    margin-bottom: 15px;
}

.sidebar-nav .filter-section h6 {
    color: #012970;
    font-weight: 600;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 10px;
    margin-bottom: 10px;
}

.sidebar-nav .filter-option {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
}

.sidebar-nav .filter-option input {
    margin-right: 10px;
}

.apply-filter-btn {
    width: 100%;
    background-color: #006400;
    font-weight: lighter;    
    color: white;
    border: none;
    letter-spacing: 2px;
    padding: 10px;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.apply-filter-btn:hover {
    background-color: #00693E;
}

.price-range-inputs {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

.price-range-inputs input {
    width: 100%;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="home.php" class="logo d-flex align-items-center">
        <img src="../uploads/logo.png" alt="">
        <span class="d-none d-lg-block text-white"><small>GAF-MARKET</small></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div><!-- End Logo -->

    <div class="container" style="width: 60%;">
    <form class="d-flex" method="post" action="home.php">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning btn-sm text-white" name="searchbtn" type="submit">Search</button>
    </form>
  </div>

  <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item">
          <a class="nav-link nav-icon " href="#" data-bs-toggle="dropdown">
            <a href="../users/auth/login.php"><button class="btn btn-sm text-warning me-2">
                Sign in
            </button></a>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <a href="../users/auth/register.php"><button class="btn btn-sm text-warning me-2">
                Register
            </button></a>
          </a>
        </li>
      </ul>
    </nav><!-- End Icons Navigation -->

  
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar"> 

  <form id="product-filter-form" method="POST" action="home.php">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Categories Filter -->
        <li>
            <div class="filter-section">
                <h6>Product Categories</h6>
                <div class="filter-option">
                    <input type="checkbox" id="cat-electronics" name="categories[]" value="electronics">
                    <label for="cat-electronics">Electronics</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="cat-fashion" name="categories[]" value="fashion">
                    <label for="cat-fashion">Fashion</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="cat-home-decor" name="categories[]" value="home-decor">
                    <label for="cat-home-decor">Home & Decor</label>
                </div>
                <div class="filter-option">
                    <input type="checkbox" id="cat-books" name="categories[]" value="books">
                    <label for="cat-books">Books</label>
                </div>
            </div>
        </li>

        <!-- Price Range Filter -->
        <li>
            <div class="filter-section">
                <h6>Price Range</h6>
                <div class="price-range-inputs">
                    <input type="number" name="min_price" placeholder="Min Price" min="0">
                    <input type="number" name="max_price" placeholder="Max Price" min="0">
                </div>
            </div>
        </li>

        <!-- Brands Filter -->
        

        <!-- Additional Filters -->
       

        <!-- Sorting Options -->

        <!-- Apply Filters Button -->
        <li>
            <button type="submit" class="apply-filter-btn">
                Apply Filters
            </button>
        </li>
    </ul>
</form>

  </aside><!-- End Sidebar-->




>


  <?php
include('footer.php');
  ?>
