<?php
include('../../db/db.php');
include('header.php');

if(isset($_GET['id']))
{
    $user_id = $_GET['id'];
}


$userquery = "SELECT * FROM users WHERE id='$user_id'";
$stmt1 = mysqli_prepare($conn, $userquery);
$stmt1->execute();
$userResult = $stmt1->get_result(); 
if($userResult) 
{
    while($user = mysqli_fetch_assoc($userResult))
    {
        $name = $user['name'];
        $email = $user['email'];
        $telephone = $user['telephone'];
        $status = $user['status'];
        $dateJoined = $user['timestamp'];
        
    }
    $statusText = $status == 1 ? 'blocked' : 'not blocked';
    $statusBadge = $status == 1 ? 'danger' : 'success';
  
}
mysqli_stmt_close($stmt1);

$Date = new DateTime($dateJoined);
$formatedDate = $Date->format('M-y')


?>
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>


<style>
    .profile-container {
        max-width: 250px;
        margin: 0 auto;
    }

    .profile-img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 3px solid #f8f9fa;
    }

    .user-name {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .user-email {
        font-size: 0.9rem;
        color: #6c757d;
    }


    .pill-size {
        position: relative;
        background-color: #ECE6E6;
        padding: 8px 10px;
        font-size: 10px;
        font-weight: 700;
    }

    .btn-danger {
        width: 100%;
        font-size: 1rem;
        font-weight: 800;
    }

    .status-container .status-indicator {
        width: 10px;
        height: 10px;
        background-color: #28a745;
        border-radius: 50%;
        margin-right: 8px;
        margin-bottom: -2px;
        display: inline-block;
    }
</style>

<body>
    <!-- Sidebar -->

    <!-- Main Content -->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage Users</li>
                    <li class="breadcrumb-item active">User</li>
                    <li class="breadcrumb-item active"><?php echo $name ?></li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row justify-content-start">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="profile-container pt-3">
                                <div class="rounded-image mb-3">
                                    <img src="../../assets/img/avatar.png" alt="User Avatar" class="profile-img rounded-circle" />
                                </div>
                                <div>
                                    <h4 class="user-name mb-1"><?php echo $name ?></h4>
                                    <p class="user-email text-muted mb-2"><?php echo $email ?></p>
                                    <div class="status-container mb-3">
                                        <?php
                                        if($status == 0)
                                        {
                                            echo '
                                            <span class="pill-size me-2 rounded-pill"><span class="status-indicator" style="background-color: blue;"></span>Active</span>
  
                                              ';
                                        }
                                        else
                                        {
                                            echo '
                                            <span class="pill-size me-2 rounded-pill"><span class="status-indicator" style="background-color: red;"></span>Blocked</span>
  
                                              ';
                                        }
        

                                        ?>
                                        <span class="pill-size rounded-pill"><?php echo $formatedDate ?></span>
                                    </div>
                                    <?php 
                                    if($status == 1)
                                    {
                                        echo '
                                             <button class="btn btn-sm text-white" style="background-color: #17B169; width:65%">Unblock Account</button>
                                        ';
                                    }
                                    else
                                    {
                                        echo '
                                        <button class="btn btn-sm text-white" style="background-color: red; width:65%">Block Account</button>
                                   ';
                                    }

                                    ?>
                                </div>
                            </div>
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
                            <table class="table datatable mt-5" id="productsTable">
                                <h3 class="mt-5">Products</h3>
                                <thead>
                                    <tr>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $productquery = "SELECT * FROM productimgs WHERE userid=? GROUP BY productid";
                                    $stmt2 = mysqli_prepare($conn, $productquery);
                                    mysqli_stmt_bind_param($stmt2,'i',$user_id);
                                    $stmt2->execute();
                                    $productResult = $stmt2->get_result();

                                    
                                    foreach ($productResult as $key => $value) {
                                        echo "<tr>
                                            <td>{$value['productid']}</td>
                                            <td>{$value['title']}</td>
                                            <td>{$value['price']}</td>
                                            <td>{$value['description']}</td>
                                        </tr>";
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
        document.addEventListener('DOMContentLoaded', function() {
            const dataTable = new simpleDatatables.DataTable("#productsTable");

            // Optional: Custom search implementation
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('keyup', function() {
                dataTable.search(searchInput.value);
            });
        });
    </script>
</body>

</html>