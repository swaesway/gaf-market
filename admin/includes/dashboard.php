<?php
    include('../../db/db.php');
    include('header.php');  

    $usersquery = 'SELECT * FROM users';
    $stmt1 = mysqli_prepare($conn, $usersquery);
    $stmt1->execute();
    $countresult = $stmt1->get_result(); 
    if($countresult)
    {
      $usercount = mysqli_num_rows($countresult);
    }
    mysqli_stmt_close($stmt1);

    $productquery = 'SELECT * FROM productimgs';
    $stmt2 = mysqli_prepare($conn, $productquery);
    $stmt2->execute();
    $productresult = $stmt2->get_result();
    if($productresult)
    {
      $productcount = mysqli_num_rows($productresult);
    }
    mysqli_stmt_close($stmt2);

    $reportsquery = 'SELECT * FROM reports';
    $stmt3 = mysqli_prepare($conn,  $reportsquery);
    $stmt3->execute();
    $reportresult = $stmt3->get_result();
    if($reportresult)
    {
      $reportcount = mysqli_num_rows($reportresult);
    }
    mysqli_stmt_close($stmt3);
 

?>
    <title>Dashboard - gafCommerce</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">


<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
 
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-15">
      <div class="row">

   <!-- Users Card -->
   <div class="col-xxl-4 col-xl-4">

<div class="card info-card customers-card">

  <div class="filter">
    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
      <li class="dropdown-header text-start">
        <h6>Filter</h6>
      </li>

      <li><a class="dropdown-item" href="#">Today</a></li>
      <li><a class="dropdown-item" href="#">This Month</a></li>
      <li><a class="dropdown-item" href="#">This Year</a></li>
    </ul>
  </div>

  <div class="card-body">
    <h5 class="card-title">Users <span>|Manage</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6><?php echo   $usercount?></h6>
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6 col-xl-4">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Products <span>| Manage</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-cart"></i>
                </div>
                <div class="ps-3">
                  <h6><?php  echo $productcount?></h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6 col-xl-4">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Reports <span>| User</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-file-text"></i>
                </div>
                <div class="ps-3">
                  <h6><?php echo   $reportcount ?></h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Current Reports</h5>

              <!-- Reports Table -->
              <table class="table datatable table-striped" id="reportsTable">
                <thead>
                  <tr>
                    <th >#</th>
                    <th >Description</th>
                    <th >Reported User</th>
                    <th >Status</th>
                    <th >Time</th>
                    <th >Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
if ($reportresult) {
    $id = 0;

    // Query to join reports and users based on userid
    $reportsqueryjoined = "
        SELECT r.id AS report_id, r.userid,r.timestamp, r.productid, r.reportdescription, r.resolved AS status, u.name AS username
        FROM reports r 
        JOIN users u ON r.userid = u.id ORDER BY r.timestamp DESC LIMIT 5 
    ";

    // Prepare and execute the query
    $stmt4 = mysqli_prepare($conn, $reportsqueryjoined);
    $stmt4->execute();
    $reportsresult = mysqli_stmt_get_result($stmt4);

    // Loop through the results to display the table rows
    while ($rows = mysqli_fetch_assoc($reportsresult)) {
        $id++; // Increment row number

        // Resolve status and badge
        $statusText = $rows['status'] == 1 ? 'Resolved' : 'Not Resolved';
        $statusBadge = $rows['status'] == 1 ? 'success' : 'danger';

        echo "
            <tr>
                <th scope='row'>{$id}</th>
                <td>{$rows['reportdescription']}</td>
                <td>{$rows['username']}</td>
                <td>
                    <span class='badge bg-{$statusBadge}'>
                        {$statusText}
                    </span>
                </td>
                 <td>{$rows['timestamp']}</td>
                <td>
                   <a href='view-report.php?userid={$rows['userid']}&productid={$rows['productid']}&reportid={$rows['report_id']}' class='d-flex justify-content-center'>
                        <i class='bi bi-eye'></i>
                    </a>
                </td>
            </tr>
        ";
    }
}
?>


                </tbody>
              </table>
              <!-- End Reports Table -->

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>

              <!-- Search Input (Handled by DataTables) -->
              <!-- <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search users by username or email...">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div> -->

              <!-- User Table -->
              <table class="table datatable table-striped" id="userTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($usercount) {
                    # code...
                    $id=0;
                    while ($row = mysqli_fetch_assoc($countresult) ) {
                      $id++;
                      $statusText = $row['status'] == 1 ? 'blocked' : 'not blocked';
                       $statusBadge = $row['status'] == 1 ? 'danger' : 'success';
                      echo "<tr>
                              <th scope='row'>{$id}</th>
                              <td>{$row['name']}</td>
                              <td>{$row['email']}</td>
                              <td>
                    <span class='badge bg-{$statusBadge}'>
                        {$statusText}
                    </span>
                </td>
                              <td>
                                <a href='view-user.php?id=".$row['id']."' class='d-flex justify-content-center'><i class='bi bi-eye'></i></a>
                              </td>
                            </tr>";
                    }

                  }
                  
                 
                  ?>
                </tbody>
              </table>
              <!-- End User Table -->

            </div>
          </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->

 <!-- Vendor JS Files -->
 <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- DataTable Initialization Script -->
  <script>
    // Initialize DataTable
    document.addEventListener('DOMContentLoaded', function () {
      const dataTable = new simpleDatatables.DataTable("#reportsTable");

      // Optional: Custom search implementation
      const searchInput = document.getElementById('searchInput');
      searchInput.addEventListener('keyup', function () {
        dataTable.search(searchInput.value);
      });
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- DataTable Initialization Script -->
  <script>
    // Initialize DataTable
    document.addEventListener('DOMContentLoaded', function () {
      const dataTable = new simpleDatatables.DataTable("#userTable");

      // Optional: Custom search implementation
      const searchInput = document.getElementById('searchInput');
      searchInput.addEventListener('keyup', function () {
        dataTable.search(searchInput.value);
      });
    });
  </script>
  

  
 