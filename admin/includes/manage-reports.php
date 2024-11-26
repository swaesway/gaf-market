<?php
include('../../db/db.php');
include('header.php');  

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
              <h5 class="card-title">Reports</h5>

              <!-- Search Input (Handled by DataTables) -->
              <!-- <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search reports by users or status...">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div> -->

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
                      JOIN users u ON r.userid = u.id ORDER BY r.timestamp  DESC
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
