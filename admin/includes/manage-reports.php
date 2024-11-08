<?php
include('header.php');   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Manage Reports</title>

  <!-- Google Fonts & Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Sidebar -->

  <!-- Main Content -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Manage Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item active">Manage Reports</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Report List</h5>

              <!-- Search Input (Handled by DataTables) -->
              <!-- <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search reports by users or status...">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div> -->

              <!-- Reports Table -->
              <table class="table datatable" id="reportsTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Report Type</th>
                    <th scope="col">Reported User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Sample data for reports (replace with database query)
                  $reports = [
                    ['id' => 1, 'type' => 'Abuse', 'user' => 'johndoe', 'status' => 'Pending'],
                    ['id' => 2, 'type' => 'Spam', 'user' => 'janedoe', 'status' => 'Resolved'],
                    ['id' => 3, 'type' => 'Harassment', 'user' => 'alexsmith', 'status' => 'Pending']
                  ];
                  foreach ($reports as $report) {
                    echo "<tr>
                            <th scope='row'>{$report['id']}</th>
                            <td>{$report['type']}</td>
                            <td>{$report['user']}</td>
                            <td><span class='badge bg-" . ($report['status'] == 'Resolved' ? 'success' : 'warning') . "'>{$report['status']}</span></td>
                            <td>
                              <a href='view-report.php?id={$report['id']}' class='btn btn-primary btn-sm'><i class='bi bi-eye'></i> View</a>
                              <a href='resolve-report.php?id={$report['id']}' class='btn btn-success btn-sm'><i class='bi bi-check-circle'></i> Resolve</a>
                            </td>
                          </tr>";
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
  </main><!-- End #main -->

  <!-- Footer -->

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
</body>

</html>
