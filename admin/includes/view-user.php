<?php
include('header.php');
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
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .rounded-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .profile-img {
        width: 100%;
        height: auto;
        /* Maintain aspect ratio */
        object-fit: cover;
        /* Ensures the image covers the div */
    }

    .user-info {
        text-align: left;
    }

    label{
        font-weight: 800;
    }

    label .status {
        color: white;
        font-weight: 600;
        padding: 0.4rem;
        border-radius: 0.5rem;
        background-color: green;
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
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Profile</h5>
                            <div class="profile-container text-center">
                                <div class="rounded-image">
                                    <img src="../../assets/img/avatar.png" alt="User Avatar" class="profile-img" />
                                </div>
                                <div class="user-info d-flex flex-column justify-content-start">
                                    <label>Username: <span>JohnDoe</span> </label><br>
                                    <label>Email: <span>johndoe@example.com</span> </label><br>
                                    <label>Status: <span class="status">Active</span></label><br>
                                    <label>Joined: <span>January 2020</span></label><br>
                                    <button class="btn btn-danger mt-3">Block</button>
                                </div>
                            </div>

                            <table class="table datatable mt-5" id="productsTable">
                                <h3>Product Uploaded by User</h3>
                                <thead>
                                    <tr>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Sample data for products (replace with database query)
                                    $products = [
                                        ['id' => 1, 'name' => 'Laptop', 'price' => '$999.99', 'description' => 'High performance laptop for gaming and work.'],
                                        ['id' => 2, 'name' => 'Smartphone', 'price' => '$699.99', 'description' => 'Latest model smartphone with advanced features.'],
                                        ['id' => 3, 'name' => 'Headphones', 'price' => '$199.99', 'description' => 'Noise-cancelling over-ear headphones.'],
                                        ['id' => 4, 'name' => 'Smartwatch', 'price' => '$249.99', 'description' => 'Fitness tracking smartwatch with heart rate monitor.'],
                                        ['id' => 5, 'name' => 'Tablet', 'price' => '$499.99', 'description' => 'Lightweight tablet for browsing and entertainment.'],
                                        ['id' => 6, 'name' => 'Bluetooth Speaker', 'price' => '$89.99', 'description' => 'Portable Bluetooth speaker with great sound quality.'],
                                        ['id' => 7, 'name' => 'Gaming Mouse', 'price' => '$59.99', 'description' => 'Ergonomic gaming mouse with customizable buttons.'],
                                        ['id' => 8, 'name' => 'Mechanical Keyboard', 'price' => '$129.99', 'description' => 'High-quality mechanical keyboard for gamers and typists.'],
                                        ['id' => 9, 'name' => '4K Monitor', 'price' => '$349.99', 'description' => 'Ultra HD monitor for stunning visuals and clarity.'],
                                        ['id' => 10, 'name' => 'External Hard Drive', 'price' => '$89.99', 'description' => '1TB external hard drive for extra storage space.'],
                                        ['id' => 11, 'name' => 'Webcam', 'price' => '$69.99', 'description' => 'HD webcam for video conferencing and streaming.'],
                                        ['id' => 12, 'name' => 'VR Headset', 'price' => '$399.99', 'description' => 'Virtual reality headset for immersive gaming experiences.'],
                                        ['id' => 13, 'name' => 'Wireless Charger', 'price' => '$39.99', 'description' => 'Fast wireless charger compatible with most smartphones.'],
                                        ['id' => 14, 'name' => 'USB-C Hub', 'price' => '$29.99', 'description' => 'Multi-port USB-C hub for connecting multiple devices.'],
                                        ['id' => 15, 'name' => 'Smart Home Assistant', 'price' => '$149.99', 'description' => "Voice-activated smart assistant for home automation."]
                                    ];
                                    foreach ($products as $product) {
                                        echo "<tr>
                    <td>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td>{$product['price']}</td>
                    <td>{$product['description']}</td>
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