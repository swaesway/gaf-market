<?php
include('../../db/db.php');
include('header.php');

if (isset($_POST['bookmarkbtn'])) {
    $sellerid = $_POST['sellerid'];
    $boomarkerid = $_POST['bookmarker'];
    $productid = $_POST['productid'];
    $userid =   $_SESSION['userId'];

    $query = "INSERT INTO bookmarks(productid, sellerid, bookmarker) VALUES(?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sii', $productid, $sellerid, $boomarkerid);
    $result = mysqli_stmt_execute($stmt);
}

$no_result = "";
$searchkey = "";

if (isset($_POST['searchbtn'])) {
    $searchkey = $_POST['search'];
    $query = "SELECT * FROM productimgs 
    WHERE MATCH(title, category, description, price) AGAINST(? IN NATURAL LANGUAGE MODE) 
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
                     OR price LIKE ? 
                  GROUP BY productid";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $searchTerm, $searchTerm, $searchTerm,  $searchTerm);
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

// Filter Categories and Price Feature

$no_result = "";
$whereClauses = [];
$params = [];
$types = "";

// Handle filter form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle categories filter
    if (isset($_POST['categories']) && is_array($_POST['categories'])) {
        $categories = $_POST['categories'];
        $placeholders = implode(',', array_fill(0, count($categories), '?'));
        $whereClauses[] = "category IN ($placeholders)";
        $params = array_merge($params, $categories);
        $types .= str_repeat('s', count($categories));
    }

    // Handle price range filter
    if (!empty($_POST['min_price']) || !empty($_POST['max_price'])) {
        $minPrice = $_POST['min_price'] ?? 0;
        $maxPrice = $_POST['max_price'] ?? PHP_INT_MAX;

        $whereClauses[] = "price BETWEEN ? AND ?";
        $params[] = $minPrice;
        $params[] = $maxPrice;
        $types .= "ii";
    }
}

// Construct the query
$query = "SELECT * FROM productimgs";
if (!empty($whereClauses)) {
    $query .= " WHERE " . implode(' AND ', $whereClauses);
}
$query .= " GROUP BY productid";

// Prepare and execute the query
$stmt = mysqli_prepare($conn, $query);
if ($stmt && !empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// Handle no results
if (mysqli_num_rows($result) === 0) {
    $no_result = "No products match your filters.";
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

        .card:hover {
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
            <h5>Trending Products</h5>
            <div class="row">
                <?php

                foreach ($result as $key => $value) {
                    # code...
                    echo "
               
              <div class='col-lg-3'>
                            <div class='card'>
                                <div class='card-body'>
                                    <div class='imageupload'>
                                        <a href='viewmore.php?productid=" . $value['productid'] . "&sellerid=" . $value['userid'] . "&id=" . $value['id'] . "' class='card-link'>
                                        <img src='../../productsimgs/" . $value['path'] . "' alt=''>
                                        </a>
                                        <!-- Bookmark Icon Overlay -->
                                        <form method='POST' action='home.php'>
                                        <input type='hidden'  name='productid' value=" . $value['productid'] . ">
                                        <input type='hidden' name='bookmarker' value=" . $userid . ">
                                        <input type='hidden' name='sellerid' value=" . $value['userid'] . ">
                                        <button class='btn' type='submit' name='bookmarkbtn'>
                                        <div class='bookmark-icon-wrapper'>
                                            <i class='bi bi-bookmarks icon' aria-label='Bookmark'></i>
                                        </div>
                                        </button>
                                        </form>
                                        
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
                    echo '<h5 class="mt-5 text-center">' . $no_result . '</h5>';
                }
                ?>


            </div>
        </section>
    </main>


</body>

</html>