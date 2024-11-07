<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-MARKET</title>
    <style>
        /* Main card and image container adjustments */
        .card {
            padding: 10px;
        }
        
        .card-body {
            padding: 10px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            border-radius: 10px;
        }

        /* Smaller main image */
        .main-image {
            width: 60%;
            max-width: 300px;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Smaller sub-images */
        .sub-images {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sub-image {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .sub-image:hover {
            border: 2px solid #007bff;
        }

        .profile {
            width: 100%;
        }

        /* Adjusted padding for other elements */
        .pagetitle h1 {
            font-size: 1.5em;
        }

        .breadcrumb {
            margin: 0;
            padding: 5px 0;
        }

        .card-footer {
            padding: 8px;
            font-size: 0.9em;
        }

        /* Right-side items styling */
        .right-side-items {
            margin-top: 10px;
        }

        .right-card {
            margin-bottom: 10px;
            padding: 10px;
        }

        /* Button styles matching the product card */
        .custom-button {
            color: #13B206;
            border: 1px solid #13B206;
            border-radius: 5px;
            transition: color 0.3s ease, border-color 0.3s ease;
            background-color: transparent;
            padding: 5px 10px;
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 5px;
        }

        .custom-button:hover {
            color: #EEC108;
            border-color: #EEC108;
        }

        .text-small {
            font-size: smaller;
        }
    </style>
</head>
<body>

<div class="main" id="main">
    <div class="pagetitle">
        <h1>View More</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">View More</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <small style="font-size: 15px; color: #919191;">Bawumia Mahamadu</small><br>
                        <small style="font-size: 11px; color: #919191">25th October, 2024, 10:43</small>
                    </div>
                    <div class="card-body">
                        <div class="image-container">
                            <img id="mainImage" class="main-image" src="../../uploads/uniform.jpeg" alt="Product Image">
                            <!-- Sub Images -->
                            <div class="sub-images">
                                <img class="sub-image" src="../../uploads/uniform.jpeg" alt="Sub Image 1" onclick="changeImage(this.src)">
                                <img class="sub-image" src="../../uploads/boots.jpeg" alt="Sub Image 2" onclick="changeImage(this.src)">
                                <img class="sub-image" src="../../uploads/car.jpeg" alt="Sub Image 3" onclick="changeImage(this.src)">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloremque explicabo,
                            repellendus omnis, eveniet vitae in ut perspiciatis quis obcaecati, 
                            accusantium aliquid totam quam aspernatur laboriosam debitis?</p>
                    </div>
                </div><!-- End Main Card -->
            </div>

            <!-- Right Side Items -->
            <div class="col-lg-4 right-side-items">
                <!-- Recent Activity -->
                <div class="card right-card">
                    <div class="card-body">
                        <h6 class="card-title"><small>Army uniform - ww2</small></h6>
                        <h6>Price: GHC 10,000</h6>
                        <div class="text-center">
                            <button class="btn btn-sm custom-button">Request callback</button>
                            <button class="btn btn-sm custom-button">Negotiate Price</button>
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

                <!-- Profile Card -->
                <div class="card right-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mt-2 mb-2 col-3">
                                <img src="../../assets/img/avatar.png" alt="Profile" class="rounded-circle profile">
                            </div>
                            <div class="col-9 mt-2">
                                <span><small class="text-small">Mahamadu Bawumia</small></span><br>
                                <span><small class="text-small">Joined 2013, 12y</small></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-sm custom-button">
                                <i class="bi bi-telephone-outbound-fill me-2"></i>0556524653
                            </button>
                            <button class="btn btn-sm custom-button">
                                <i class="bi bi-chat-left-text me-2"></i>0556524653
                            </button>
                        </div>
                    </div>
                </div><!-- End Profile Card -->

                <!-- Report Options -->
                <div class="card right-card">
                    <div class="card-body">
                        <div class="text-center">
                            <button class="btn btn-sm custom-button text-danger">
                                <i class="bi bi-ban me-2"></i>Report User
                            </button>
                            <button class="btn btn-sm custom-button text-danger">
                                <i class="bi bi-flag-fill me-2"></i>Report Product
                            </button>
                        </div>
                    </div>
                </div><!-- End Report Options -->
            </div>
        </div>
    </section>
</div>

<script>
    // Function to change the main image on clicking sub-images
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>
</body>
</html>
