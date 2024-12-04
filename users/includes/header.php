<?php
session_start();
include('../../db/db.php');
if(isset($_SESSION['user'])){
  if (!($_SESSION['user'] == 'true')) {
    echo "<script>window.location.href='../../guest/home.php'</script>";
  }
}
else{
  echo "<script>window.location.href='../../guest/home.php'</script>";

}


$userid = $_SESSION['userId'];
$query = "SELECT * FROM callback WHERE receiver = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $userid);
$stmt->execute();
$result = $stmt->get_result();
$callbackcount = mysqli_num_rows($result);

$stmt->close();

$ngtquery = "SELECT * FROM ngtchat WHERE receiver = ?";
$stmtngt = mysqli_prepare($conn, $ngtquery);
mysqli_stmt_bind_param($stmtngt, "s", $userid);
$stmtngt->execute();
$ngtresult = $stmtngt->get_result();
$ngtcount = mysqli_num_rows($ngtresult);

$totalcount = $ngtcount + $callbackcount;

$stmtngt->close();








?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/bus.png" rel="icon">
  <link href="../../assets/img/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../assets/css/addproduct.css" rel="stylesheet">
  <link href="../../assets/css/contactUs.css" rel="stylesheet">
</head>

<style>
  .header {
    background-color: #0a2d02;
  }

  /* General modal styling */
  .modal-dialog {
    max-width: 800px;
    max-height: 600px;
    margin: 1.75rem auto;
  }

  .modal-content {
    border-radius: 10px;
    overflow: hidden;
  }

  /* Tab styling */
  .nav-tabs .nav-link {
    color: #495057;
    font-weight: 500;
  }

  .nav-tabs .nav-link.active {
    color: #0d6efd;
    border-bottom: 3px solid #0d6efd;
  }

  /* Message container styling */
  .message-container {
    padding: 10px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 10px;
    background-color: #f9f9f9;
  }

  .message-time {
    font-size: 12px;
    color: #888;
  }

  .message-subject {
    font-size: 14px;
    font-weight: bold;
    color: #333;
    margin: 5px 0;
  }

  .message-content {
    font-size: 13px;
    color: #555;
  }

  /* Scrollable content */
  .modal-body {
    overflow-y: auto;
    max-height: 450px;
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
        <img src="../../uploads/logo.png" alt="">
        <span class="d-none d-lg-block text-white"><small>GAF-MARKET</small></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-white"></i>
    </div><!-- End Logo -->

    <div class="container-fluid">
    <form class="d-flex" method="post" action="home.php">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning btn-sm text-white" name="searchbtn" type="submit">Search</button>
    </form>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item">
          <a class="nav-link nav-icon" href="bookmarks.php" >
            <i class="bi bi-bookmarks text-white ms-2"></i>
            <span class="badge bg-primary badge-number"></span>
          </a><!-- End Notification Icon -->
          <!-- 
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul>End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item">
          <button class="btn btn-transparent nav-icon" data-bs-toggle="modal" data-bs-target="#chatModal">
            <i class="bi bi-chat-left-text text-white me-2" style="font-size: 20px;"></i>
            <span class="badge bg-success badge-number"><?php if($totalcount > 0) {echo $totalcount;} else{}?></span>
          </button>

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="../../assets/img/avatar.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-white"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6></h6>
              <span><?php echo $_SESSION['username'] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" target="_blank" href="../../myshop/includes/myshop.php">
                <i class="bi bi-house"></i>
                <span>My Shop</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="header.php?action=logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

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

  <!-- Modal -->
  <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="chatModalLabel">Chat Messages</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Tabs for callback and negotiation chat -->
          <ul class="nav nav-tabs " id="chatTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active " id="callback-tab" data-bs-toggle="tab" data-bs-target="#callback" type="button" role="tab" aria-controls="callback" aria-selected="true">Callback Requests</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="negotiation-tab" data-bs-toggle="tab" data-bs-target="#negotiation" type="button" role="tab" aria-controls="negotiation" aria-selected="false">Negotiation Chats</button>
            </li>
          </ul>

          <!-- Tab contents -->
          <div class="tab-content mt-3" id="chatTabContent">
            <!-- Callback Requests Tab -->
            <div class="tab-pane fade show active" id="callback" role="tabpanel" aria-labelledby="callback-tab">
              <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php while ($rows = mysqli_fetch_assoc($result)): ?>
                  <div class="message-container">
                    <div class="message-time">
                      <?= htmlspecialchars($rows['timestamp']) ?>
                      <span style="float: right;">
                        <button class="btn btn-sm btn-danger">Close</button>
                      </span>
                    </div>
                    <div class="message-subject"><?= htmlspecialchars($rows['header']) ?></div>
                    <div class="message-content"><?= htmlspecialchars($rows['message']) ?></div>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <div class="message-container">
                  <div class="message-content">No current messages</div>
                </div>
              <?php endif; ?>
            </div>


            <!-- Negotiation Chats Tab -->
            <div class="tab-pane fade" id="negotiation" role="tabpanel" aria-labelledby="negotiation-tab">
            <?php if ($result && mysqli_num_rows($ngtresult) > 0): ?>
                <?php while ($rows = mysqli_fetch_assoc($ngtresult)): ?>
                  <div class="message-container">
                    <div class="message-time">
                      <?= htmlspecialchars($rows['timestamp']) ?>
                      <span style="float: right;">
                        <button class="btn btn-sm btn-danger">Close</button>
                      </span>
                    </div>
                    <div class="message-subject"><?= htmlspecialchars($rows['header']) ?></div>
                    <div class="message-content"><?= htmlspecialchars($rows['amount']) ?></div>
                    <div class="message-content"><?= htmlspecialchars($rows['message']) ?></div>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <div class="message-container">
                  <div class="message-content">No current messages</div>
                </div>
              <?php endif; ?>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <?php
  include('footer.php');

  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
      session_destroy();
      echo "<script>window.location.href='../../guest/home.php'</script>";
    }
  }

  ?>