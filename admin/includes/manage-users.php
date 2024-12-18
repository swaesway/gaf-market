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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Manage Users</title>

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
      <h1>Manage Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
          <li class="breadcrumb-item active">Manage Users</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">User List</h5>

              <!-- Search Input (Handled by DataTables) -->
              <!-- <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search users by username or email...">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div> -->

              <!-- User Table -->
              <table class="table datatable" id="userTable">
                <thead>
                  <tr> 
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
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
                               <td>{$row['telephone']}</td>
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
      const dataTable = new simpleDatatables.DataTable("#userTable");

      // Optional: Custom search implementation
      const searchInput = document.getElementById('searchInput');
      searchInput.addEventListener('keyup', function () {
        dataTable.search(searchInput.value);
      });
    });
  </script>
</body>

</html>
