<?php
include('../../db/db.php');
include('header.php');

$userid = $_SESSION['userId']; 

// Get the count of callbacks
$query = "SELECT COUNT(*) AS callback_count FROM callback WHERE receiver = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$callback_count = $row['callback_count'];

// Get the count of products
$query = "SELECT COUNT(*) AS product_count FROM productimgs WHERE userid = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$product_count = $row['product_count']; 
?>

<title>My Shop - GAF-Market</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .imgprofile {
        width: 80px;
        /* Reduced width */
        height: 80px;
        /* Reduced height */
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border: 2px solid #f2f2f2;
    }

    .card-equal-height {
        height: 150px;
        /* Adjusted height for all cards */
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>My Shop</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-4">
                <!-- Profile Card -->
                <div class="card card-equal-height">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="../../uploads/cosmetics.jpeg" alt="Profile" class="imgprofile">
                        <h2 style="font-size: 1.5rem; margin-top: 0.5rem"><?php echo $_SESSION['username'] ?></h2>
                    </div>
                </div>

                <!-- Product Statistics -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body pb-0">
                        <h5 class="card-title">Product Statistics <span>| Today</span></h5>
                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item',
                                        formatter: '{a} <br/>{b}: {c} ({d}%)'
                                    },
                                    legend: {
                                        top: '5%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Product Statistics',
                                        type: 'pie',
                                        radius: ['40%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: [{
                                                value: 33,
                                                name: 'Callback Products',
                                                itemStyle: {
                                                    color: '#fd7e14'
                                                }
                                            },
                                            {
                                                value: 50,
                                                name: 'Bookmarked Items',
                                                itemStyle: {
                                                    color: '#198754'
                                                }
                                            },
                                            {
                                                value: 17,
                                                name: 'No Interactions',
                                                itemStyle: {
                                                    color: '#0dcaf0'
                                                }
                                            }
                                        ]
                                    }]
                                });
                            });
                        </script>
                    </div>
                </div><!-- End Product Statistics -->
            </div>

            <!-- Right Column -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Users Card -->
                    <div class="col-md-6">
                        <div class="card info-card customers-card card-equal-height">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Callbacks <span>| Manage</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $callback_count  ?></h6>
                                        <span class="text-danger small pt-1 fw-bold">12%</span>
                                        <span class="text-muted small pt-2 ps-1">decrease</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Users Card -->

                    <!-- Products Card -->
                    <div class="col-md-6">
                        <div class="card info-card sales-card card-equal-height">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Products <span>| Manage</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $product_count  ?></h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span>
                                        <span class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Products Card -->

                    <!-- Top Selling -->
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Preview</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sold</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                                            <td>$64</td>
                                            <td class="fw-bold">124</td>
                                            <td>$5,828</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                                            <td>$46</td>
                                            <td class="fw-bold">98</td>
                                            <td>$4,508</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                            <td>$59</td>
                                            <td class="fw-bold">74</td>
                                            <td>$4,366</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                            <td>$32</td>
                                            <td class="fw-bold">63</td>
                                            <td>$2,016</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                                            <td>$79</td>
                                            <td class="fw-bold">41</td>
                                            <td>$3,239</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                                            <td>$59</td>
                                            <td class="fw-bold">74</td>
                                            <td>$4,366</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#"><img src="../../uploads/cosmetics.jpeg" alt=""></a></th>
                                            <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                                            <td>$32</td>
                                            <td class="fw-bold">63</td>
                                            <td>$2,116</td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->