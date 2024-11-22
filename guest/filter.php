<?php
session_start();
include('../db/db.php');
include('header.php');

$no_result = "";
$searchkey = "";

if(isset($_POST['searchbtn']))
{
    $searchkey = $_POST['search'];
    $query = "SELECT * FROM productimgs 
    WHERE MATCH(title, category, description) AGAINST(? IN NATURAL LANGUAGE MODE) 
    GROUP BY productid";

    $stmt = mysqli_prepare($conn, $query);  
    $searchTerm = "%$searchkey%";
    mysqli_stmt_bind_param($stmt, 's', $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) === 0) {
        $searchTerm = "%$searchkey%";
        $query = "SELECT * FROM productimgs 
                  WHERE title LIKE ? 
                     OR category LIKE ? 
                     OR description LIKE ? 
                  GROUP BY productid";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'sss', $searchTerm, $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    if (mysqli_num_rows($result) === 0) {
        $no_result = "No Products Were Found";
    }
} else {
    $query = "SELECT * FROM productimgs GROUP BY productid";
    $stmt = mysqli_prepare($conn, $query);
    $stmt->execute();
    $result = $stmt->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-commerce Home</title>
    <style>
        /* General Styles */
        .main {
            padding: 20px;
            background-color: #f9f9f9;
        }


        .card {
            position: relative;
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 10px;
            padding: 8px;
            
        }
        .card:hover
        {
            transform: scale(1.05);
        }

        .imageupload {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            overflow: hidden;
            border-radius: 8px;
        }

        .imageupload img {
            width: 100%;
            height: auto;
            object-fit: cover;
            max-height: 150px;
        }

        .card-body {
            padding: 0;
        }

        .card-footer {
            display: block;
            justify-content: space-between;
            align-items: center;
            padding: 6px;
            font-size: 1em;
            background-color: #f1f1f1;
            border-radius: 0 0 8px 8px;
        }

        /* Bookmark icon overlay */
        .bookmark-icon-wrapper {
            position: absolute;
            bottom: 1px;
            left: 75%;
            background: white;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .bookmark-icon-wrapper i {
            font-size: 18px;
            color: green;
            transition: color 0.3s ease;
        }

        .bookmark-icon-wrapper:hover i {
            color: yellowgreen;
        }

        /* Text Styling in Footer */
        .footer-text {
            font-size: 13px;
            font-weight: bold;
            color: #555;
        }

        .card-link {
            display: block;
        }
    </style>
</head>

<body>
    <main id="main" class="main">
        <section class="section">
            <div class="row ">
                <?php

foreach ($result as $key => $value) {
    # code...
    echo "
<div class='col-lg-3'>

            <div class='card'>
                <div class='card-body'>
                    <div class='imageupload'>
                    <a href='viewmore.php?productid=".$value['productid']."&sellerid=".$value['userid']."&id=".$value['id']."' class='card-link'>
                        <img src='../productsimgs/" . $value['path'] . "' alt=''>
                        </a>
                        <!-- Bookmark Icon Overlay -->
                    
                        
                    </div>
                         
        </div>
        <!-- Card Footer with additional text -->
        <div class='card-footer'>
         <p class='footer-text ms-2'>" . $value['title'] . "</p>
         <p class='footer-text ms-2'>GHC  " . $value['price'] . "</p>
        </div>
    </div>

            </div>
";
}
?>

<?php 

    if (isset($no_result)) {
        echo '<h5 class="mt-5 text-center">'.$no_result.'</h5>';
    }
?>                
            <div class="col-lg-4 right-side-items">
                <!-- Recent Activity -->

                <!-- Report Options -->
                <div class="card right-card">
                    <div class="card-body">
                        <div class="text-center">
                            <button type="button" class="btn btn-sm custom-button text-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-flag-fill me-2"></i>Report Content
                            </button>
                        </div>
                    </div>
                </div><!-- End Report Options -->
            </div>
                
            </div>
        </section>
    </main>


</body>

</html>