<?php
include('../../db/db.php');
include('header.php');


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


        /* Text Styling in Footer */
        .footer-text {
            font-size: 13px;
            font-weight: bold;
            color: #555;
        }

        .card-link {
            display: block;
        }

        .footer-text {
            font-size: 13px;
            font-weight: bold;
            color: #555;
            margin-bottom: 4px;
            /* Reduce distance */
        }

        .freeze-btn {
            font-size: 12px;
            padding: 3px 6px;
            /* Smaller padding for reduced size */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            float: right;
            /* Align to the right */
        }
    </style>
</head>

<body>
    <main id="main" class="main">
        <div style="float: right;" class="">
            <input type="search" class="form-control" name="" id="" placeholder="search products">
        </div>
        <section class="section mt-3">
            <h5>Your Products</h5>
            <div class="row">
                <?php
                $userid = $_SESSION['userId'];
                $query = "SELECT * FROM productimgs WHERE userid = ? GROUP BY productid";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $userid);
                $stmt->execute();
                $result = $stmt->get_result();


                foreach ($result as $key => $value) {
                    # code...
                    echo "
               
              <div class='col-lg-3'>
                <a href='updateproduct.php?productid=" . $value['productid'] . "&id=" . $value['id'] . "' class='card-link'>
                            <div class='card'>
                                <div class='card-body'>
                                    <div class='imageupload'>
                                        <img src='../../productsimgs/" . $value['path'] . "' alt=''>
                                        
                                    </div>
                        </div>
                        <!-- Card Footer with additional text -->
                        <div class='card-footer'>
                         <p class='footer-text ms-2'>" . $value['title'] . "</p>
                         <p class='footer-text ms-2'>GHC  " . $value['price'] . "</p>
                         <button type='button' class='btn btn-primary btn-sm freeze-btn' data-bs-toggle='tooltip' data-bs-placement='top' title='Use this button to freeze this product.'>
                                        <i class='bi bi-lock-fill me-1'></i> Freeze
                                    </button>
                         </div>
                    </div>
                    </a>
                            </div>
                ";
                }

                if (mysqli_num_rows($result) === 0) {
                    echo '<p class="text-center fs-3">You have posted no products.</p>';
                }
                ?>



            </div>
        </section>
    </main>

    <script>
        // Initialize Bootstrap tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
</body>

</html>