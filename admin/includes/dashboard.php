<?php
    include('header.php');   

?>
    <title>Dashboard - gafCommerce</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">


<main id="main" class="main">

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

         <!-- Users Card -->
         <div class="col-xxl-4 col-xl-12">

<div class="card info-card customers-card">

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
    <h5 class="card-title">Users <span>|Manage</span></h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-people"></i>
      </div>
      <div class="ps-3">
        <h6>1244</h6>
        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

      </div>
    </div>

  </div>
</div>

</div><!-- End Customers Card -->

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

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
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

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
              <h5 class="card-title">Reports <span>| User</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>264</h6>
                  <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Report List</h5>

              <!-- Search Input (Handled by DataTables) -->
              <!-- <div class="input-group mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Search reports by users or status...">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
              </div> -->

              <!-- Reports Table -->
              <table class="table datatable" id="reportsTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Report Type</th>
                    <th scope="col">Reported User</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Sample data for reports (replace with database query)
                  $reports = [
                    ['id' => 1, 'type' => 'Abuse', 'user' => 'johndoe', 'status' => 'Pending'],
                    ['id' => 2, 'type' => 'Spam', 'user' => 'janedoe', 'status' => 'Resolved'],
                    ['id' => 3, 'type' => 'Harassment', 'user' => 'alexsmith', 'status' => 'Pending']
                  ];
                  foreach ($reports as $report) {
                    echo "<tr>
                            <th scope='row'>{$report['id']}</th>
                            <td>{$report['type']}</td>
                            <td>{$report['user']}</td>
                            <td><span class='badge bg-" . ($report['status'] == 'Resolved' ? 'success' : 'warning') . "'>{$report['status']}</span></td>
                            <td>
                              <a href='view-report.php?id={$report['id']}' class='d-flex justify-content-center'><i class='bi bi-eye'></i></a>
                            </td>
                          </tr>";
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Reports Table -->

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
                    ['id' => 3, 'username' => 'Ichigo', 'email' => 'Ichigo@example.com', 'status' => 'Suspended'],
                    ['id' => 4, 'username' => 'Kofi', 'email' => 'Kofi@example.com', 'status' => 'Suspended'],
                    ['id' => 5, 'username' => 'alexsmith', 'email' => 'alexsmith@example.com', 'status' => 'Active']
                  ];
                  foreach ($users as $user) {
                    echo "<tr>
                            <th scope='row'>{$user['id']}</th>
                            <td>{$user['username']}</td>
                            <td>{$user['email']}</td>
                            <td><span class='badge bg-" . ($user['status'] == 'Active' ? 'success' : 'danger') . "'>{$user['status']}</span></td>
                            <td>
                              <a href='view-user.php' class='d-flex justify-content-center'><i class='bi bi-eye'></i></a>
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

        

    

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- Recent Activity -->
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

        <div class="card-body">
          <h5 class="card-title">User Reports <span>| Recent</span></h5>

          <div class="activity">

            <div class="activity-item d-flex">
              <div class="activite-label">32 min</div>
              <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
              <div class="activity-content">
                <a href="#" class="fw-bold text-dark">Kofi stores </a> posted fake products
              </div>
            </div><!-- End activity item-->

            <div class="activity-item d-flex">
              <div class="activite-label">56 min</div>
              <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
              <div class="activity-content">
                Product images not the same as product  
              </div>
            </div><!-- End activity item-->

            <div class="activity-item d-flex">
              <div class="activite-label">2 hrs</div>
              <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
              <div class="activity-content">
                User posted illegal products 
              </div>
            </div><!-- End activity item-->

            <div class="activity-item d-flex">
              <div class="activite-label">1 day</div>
              <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
              <div class="activity-content">
                Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
              </div>
            </div><!-- End activity item-->

            <div class="activity-item d-flex">
              <div class="activite-label">2 days</div>
              <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
              <div class="activity-content">
                Est sit eum reiciendis exercitationem
              </div>
            </div><!-- End activity item-->

            <div class="activity-item d-flex">
              <div class="activite-label">4 weeks</div>
              <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
              <div class="activity-content">
                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
              </div>
            </div><!-- End activity item-->

          </div>

        </div>
      </div><!-- End Recent Activity -->

     
      <!-- Website Traffic -->
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
          <h5 class="card-title">Website Traffic <span>| Today</span></h5>

          <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

          <script>
            document.addEventListener("DOMContentLoaded", () => {
              echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                  trigger: 'item'
                },
                legend: {
                  top: '5%',
                  left: 'center'
                },
                series: [{
                  name: 'Access From',
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
                      value: 1048,
                      name: 'Search Engine'
                    },
                    {
                      value: 735,
                      name: 'Direct'
                    },
                    {
                      value: 580,
                      name: 'Email'
                    },
                    {
                      value: 484,
                      name: 'Union Ads'
                    },
                    {
                      value: 300,
                      name: 'Video Ads'
                    }
                  ]
                }]
              });
            });
          </script>

        </div>
      </div><!-- End Website Traffic -->

      
    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->
  

  
 