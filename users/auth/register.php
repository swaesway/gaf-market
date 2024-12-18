<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GAFCommerce - Register Account</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/bus.png" rel="icon">
  <link href="../../assets/img/bus.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!--  Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
       body{
      background-image: url('../../uploads/gafbg.jpg'), linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
      background-repeat: repeat; /* Repeats the image in both directions */
      background-size: 400px; /* Keeps the image's original size */
      background-position: top left;
    }
    img{
      max-width: 15%;
    }
  </style>

</head>

<body>

  <main>
    <div class="container">

    <?php 
    
    if(isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
            '.$_SESSION['error'].'
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['error']); 
  } 
  if(isset($_SESSION['success'])) {
      echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">
            '.$_SESSION['success'].' '." ".'<a class ="" href="login.php">here</a>
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      unset($_SESSION['success']);
  }
    
    
    ?>
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center">
               
              <div class="d-flex justify-content-center py-4 text-center">
                  <span class="d-none d-lg-block text-white" style="font-weight: bolder; "><img src="../../uploads/logo.png" alt=""> <span><h4>GAF-MARKET</h4></span></span>
              </div><!-- End Logo -->
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="../../db/dbquerries.php" method="post">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name'] ?>">
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your Telephone</label>
                      <input type="tel" name="tel" class="form-control" required value="<?php if(isset($_SESSION['tel'])) echo $_SESSION['tel'] ?>">
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'] ?>">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12"> 
                      <button class="btn btn-primary w-100" name="registerAccountBtnUser" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>