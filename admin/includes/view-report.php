<?php
include('../../db/db.php');
include('header.php');

if(isset($_GET['userid']))
{
    $user_id = $_GET['userid'];
    $report_id = $_GET['reportid'];
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
                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Reports</li>
                    <li class="breadcrumb-item active">Account</li>
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
                                        <a href="view-user.php?id=<?php echo $user_id ?>">
                                        <button class="btn btn-sm text-white" style="background-color: #17B169; width:65%">Go to Account</button>
                                        </a>
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
                        <?php
                        $reportquery = "
                            SELECT r.id AS report_id, r.productid, r.reportdescription, p.path, p.description, p.price, p.title, p.productid 
                            FROM reports r JOIN productimgs p ON r.id = '$report_id' WHERE r.userid = p.userid AND r.productid = p.productid
                        ";

                        $stmt = mysqli_prepare($conn, $reportquery);
                        $stmt->execute();
                        $fetchreport = $stmt->get_result();

                        while($rows = mysqli_fetch_assoc($fetchreport))
                        {
                            echo '<div class="mt-2">';
                            echo '<h6 class="h6">Report Description :'." ".''.$rows['reportdescription'].'</h6>';
                            echo '<h6 class="h6">Product Price :'." ".''.$rows['price'].'</h6>';
                            echo '<h6 class="h6">Product Title :'." ".''.$rows['title'].'</h6>';
                            echo '<h6 class="h6">Product Description :'." ".''.$rows['description'].'</h6>';
                            echo '</div>';

                            echo '<div class="text-center mt-3">';
                            echo '<img src="../../productsimgs/'.$rows['path'].'">';
                            echo '</div>';
                        }

                        ?>

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