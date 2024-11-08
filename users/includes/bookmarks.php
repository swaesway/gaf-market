<?php
session_start();
include('header.php');
include('bookmarkedCards.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-commerce Bookmark</title>
    <style>
        /* General Styles */
        .main {
            padding: 20px;
            background-color: #f9f9f9;
        }

        /* Product Card Styles */
        .col-lg-4, .col-md-6, .col-sm-12 {
            display: flex;
            flex-direction: column;
            margin-bottom: 1rem;
        }

        .card {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 8px;
            margin-bottom: 10px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4px 8px;
            font-size: 13px;
        }

        .card-body {
            padding: 0;
        }

        .card-title {
            font-size: 13px;
            font-weight: 500;
            margin: 4px 0;
        }

        .description {
            font-size: 12px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            margin: 4px 0;
        }

        .imageupload {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            overflow: hidden;
            border-radius: 6px;
            margin-top: 6px;
            height: 150px; /* Consistent height for images */
        }

        .imageupload img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .card-footer {
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 6px;
            font-size: 1em;
        }

        .card-footer i {
            cursor: pointer;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .card-footer i:hover {
            color: #e63946;
        }

        .btn .icon {
            color: #13B206;
            transition: color 0.3s ease;
        }

        .btn:hover .icon {
            color: #EEC108;
        }
    </style>
</head>

<body>
    <div class="main" id="main">
        <div class="pagetitle">
            <h1>Bookmark</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item">History</li>
                    <li class="breadcrumb-item active">Bookmark</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row align-items-top">
                <div class="col-lg-12">
                    <!-- Product Cards -->
                    <div class="row">
                        <?php
                        renderProductCard("Yaw D.Luffy", "25th October, 2024, 10:43", "Army uniform - WW2", "10,000", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quasi assumenda animi autem ullam praesentium laudantium nihil consectetur. Quas, obcaecati.", "../../uploads/uniform.jpeg");
                        renderProductCard("Abena Uchiha ", "30th September, 2024, 10:43", "Army boots - Russia", "3,000,000", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, dignissimos. Tempora porro officia a, iste explicabo aliquid architecto dolor nulla.", "../../uploads/boots.jpeg");
                        renderProductCard("Akosua Adjei Ichigo", "5th July, 2024, 10:43", "Army uniform - WW2", "10,000", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quasi assumenda animi autem ullam praesentium laudantium nihil consectetur. Quas, obcaecati.", "../../uploads/uniform.jpeg");
                        renderProductCard("Kofi Uzumaki", "2nd May, 2024, 10:43", "Army boots - Russia", "3,000,000", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, dignissimos. Tempora porro officia a, iste explicabo aliquid architecto dolor nulla.", "../../uploads/boots.jpeg");
                        ?>
                    </div>
                    <!-- End Product Cards -->
                </div>
            </div>
        </section>
    </div>
</body>

</html>
