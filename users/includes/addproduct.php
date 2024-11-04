<?php
include('header.php');




?>

<title>Add Products - GAF-MARKET</title>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add a Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Add a product</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <?php
      
            // if (isset($_SESSION['error'])) {
            //   echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
            //       ' . $_SESSION['error'] . '
            //       <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            //       </div>';
            //   unset($_SESSION['error']);
            // }
            // if (isset($_SESSION['errorNum'])) {
            //   echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
            //       ' . $_SESSION['errorNum'] . '
            //       <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
            //       </div>';
            //   unset($_SESSION['errorNum']);
            // }

            ?>
            <h5 class="card-title">Product</h5>

            <!-- Vertical Form -->
            <form class="row g-3" method="post" action="database-Queries.php">
              

              <div class="col-12">
                <label for="product" class="form-label"><b>Product Name</b></label>
                <input type="text" class="form-control" name="product" required>
              </div>

              <div class="col-12">
                <label for="price" class="form-label"><b>Price</b></label>
                <input type="number" class="form-control" name="price" required>
              </div>

              <div class="col-12"> 
                <label for="description" class="form-label"><b>Product Description</b></label>
                <textarea name="description" id="" class="form-control"></textarea>
              </div>

              <div class="col-12">
                <label for="productimg" class="form-label"><b>Product Image</b></label>
                <input type="file" class="form-control" name="productimg" required>
              </div>


              <div class="text-center">
                <button type="submit" class="btn btn-primary"  name="Busbtn" style="width: 50%; font-weight:400">Save Product</button>
              </div>
            </form><!-- Vertical Form -->

          </div>
        </div>
      </div>
    </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->





<script>




</script>

