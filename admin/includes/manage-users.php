<?php
include('header.php');   
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
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Sample data for users (replace with database query)
                  $users = [
                    ['id' => 1, 'username' => 'johndoe', 'email' => 'johndoe@example.com', 'status' => 'Active'],
                    ['id' => 2, 'username' => 'janedoe', 'email' => 'janedoe@example.com', 'status' => 'Suspended'],
                    ['id' => 3, 'username' => 'alexsmith', 'email' => 'alexsmith@example.com', 'status' => 'Active']
                  ];
                  foreach ($users as $user) {
                    echo "<tr>
                            <th scope='row'>{$user['id']}</th>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td><span class='badge bg-" . ($user['status'] == 'Active' ? 'success' : 'danger') . "'>{$user['status']}</span></td>
                            <td>
                              <a href='view-user.php?id={$user['id']}' class='btn btn-primary btn-sm'><i class='bi bi-eye'></i> View</a>
                              <a href='block-user.php?id={$user['id']}' class='btn btn-warning btn-sm'><i class='bi bi-lock'></i> Block</a>
                              <a href='suspend-user.php?id={$user['id']}' class='btn btn-danger btn-sm'><i class='bi bi-x-circle'></i> Suspend</a>
                            </td>
                          </tr>";
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
  <?php include('admin/includes/footer.php'); ?>

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
