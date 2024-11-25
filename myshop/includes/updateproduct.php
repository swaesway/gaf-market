<?php
include('../../db/db.php');
include('header.php');
if(isset($_GET['productid']) && $_GET['id'])
{
    $productid = $_GET['productid'];
    $id = $_GET['id'];
}

$query = "SELECT * FROM productimgs WHERE id = ? ";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
$stmt->execute();
$result = $stmt->get_result();

$rows = mysqli_fetch_assoc($result);
$product_description = $rows['description'];
$price = $rows['price'];
$title = $rows['title'];
$category = $rows['category'];
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

<title>Update Products - GAF-MARKET <?php echo $title?></title>
<style>
    /* Container and Card Styles */
    .container-fluid {
        padding: 20px;
    }

    .add-product-card {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form field enhancements */
    .form-floating input,
    .form-floating textarea {
        padding-left: 1.5rem;
    }

    /* Preview image styling */
    #preview-container img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 5px;
        border-radius: 5px;
    }

    .file-upload-btn {
        font-size: 1.5rem;
        cursor: pointer;
    }

    /* Adjust textarea height */
    textarea#productDescription {
        min-height: 100px; /* Ensure it displays at least 3 lines */
        resize: vertical; /* Allow resizing only vertically */
    }

    /* Danger Zone Styling */
    .danger-zone {
        background-color: #fff;
        border: 2px solid #dc3545; /* Red border */
        padding: 15px;
        border-radius: 8px;
        margin-top: 15px; /* Reduced space between title and div */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .danger-zone .left {
        display: flex;
        flex-direction: column;
    }

    .danger-zone .left p {
        margin: 0;
        color: #dc3545;
    }

    .danger-zone .right {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .danger-zone .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
        font-weight: bold;
    }

    .danger-zone .btn-outline-danger:hover {
        background-color: #dc3545;
        color: #fff;
    }

    .form-floating input,
    .form-floating textarea {
        padding-left: 1.5rem;
    }

    /* For button container */
    .danger-zone .right button {
        width: 100%;
    }

    /* Updated title style */
    .danger-zone-title {
        margin-bottom: 10px;
        color: #dc3545; /* Red color to match the div outline */
    }
</style>

<main id="main" class="main">
  <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Update this product</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="px-1 mt-n1">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-9">
        <div class="card add-product-card">
        <?php
        if(isset($_SESSION['error'])) {
          echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                '.$_SESSION['error'].' 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          unset($_SESSION['error']); 
      } 
      if(isset($_SESSION['success'])) {
          echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">
                '.$_SESSION['success'].' 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          unset($_SESSION['success']);
      }
        ?>
          <h5 class="text-center mb-4">Product Update</h5>
          <form class="form-card" onsubmit="validateForm(event)" method="POST" action="updateproduct.php?productid=<?php echo $productid; ?>&id=<?php echo $id; ?>" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php  echo  $_SESSION['userId']?>">  
          <!-- Product Name and Price -->
            <div class="row justify-content-between text-left mb-4">
              <div class="form-floating col-sm-6 mb-3 col-12">
                <input type="text" class="form-control" id="productName" name="ntitle"  required value="<?php echo $title?>">
                <label for="productName">Title*</label>
                <small id="nameError" class="text-danger"></small>
              </div>
              <div class="form-floating col-sm-6">
                <input type="number" class="form-control" id="productPrice" name="nprice"  required value="<?php echo $price?>">
                <label for="productPrice">Price*</label>
                <small id="priceError" class="text-danger"></small>
              </div>
            </div>

            <!-- Category Dropdown -->
            <div class="row justify-content-between text-left mb-4">
              <div class="form-floating col-12">
                <select class="form-select" id="productCategory" name="ncategory"  required>
                  <option value="<?php echo $category ?>"><?php echo $category ?></option>
                  <option value="Electronics">Electronics</option>
                  <option value="Footwear">Footwear</option>
                  <option value="Food Stuffs">Food Stuffs</option>
                  <option value="Clothing">Clothing</option>
                  <option value="Grocery">Grocery</option>
                  <option value="Home Appliances">Home Appliances</option>
                </select>
                <label for="productCategory">Category*</label>
                <small id="categoryError" class="text-danger"></small>
              </div>
            </div>

            <!-- Product Description -->
            <div class="row justify-content-between text-left mb-4">
              <div class="form-floating col-12">
                <textarea id="productDescription" name="ndescription" class="form-control" rows="5" required><?php echo $product_description ?></textarea>
                <label for="productDescription">Description*</label>
                <small id="descriptionError" class="text-danger"></small>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="row justify-content-center text-center">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success" name ="updateproductbtn" style="width: 100%;">Update Product</button>
              </div>
            </div>
          </form>
        </div>

        <!-- Danger Zone -->
        <h5 class="text-center mb-4 danger-zone-title">Danger Zone</h5>
        <div class="danger-zone">
          <div class="left">
            <p><strong>Product: </strong><?php echo $title; ?></p>
            <p><strong>Price: </strong>$<?php echo $price; ?></p>
          </div>
          <div class="right">
            <form method="POST" action="deleteproduct.php?productid=<?php echo $productid; ?>&id=<?php echo $id; ?>">
              <button type="submit" class="btn btn-outline-danger" name="deleteproductbtn">Delete Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</main><!-- End #main -->

<script>
    // Trigger file upload dialog
    function triggerFileUpload() {
      document.getElementById('formFileLg').click();
    }

    // Form validation
    function validateForm(event) {
      let isValid = true;

      // Validate Product Name
      const productName = document.getElementById('productName').value.trim();
      if (!productName) {
        document.getElementById('nameError').textContent = "Product Name is required.";
        isValid = false;
      } else {
        document.getElementById('nameError').textContent = "";
      }

      // Validate Product Price
      const productPrice = document.getElementById('productPrice').value.trim();
      if (!productPrice) {
        document.getElementById('priceError').textContent = "Product price is required.";
        isValid = false;
      } else {
        document.getElementById('priceError').textContent = "";
      }

      // Validate Category
      const category = document.getElementById('productCategory').value.trim();
      if (!category) {
        document.getElementById('categoryError').textContent = "Please select a category.";
        isValid = false;
      } else {
        document.getElementById('categoryError').textContent = "";
      }

      // Validate Description
      const description = document.getElementById('productDescription').value.trim();
      if (!description) {
        document.getElementById('descriptionError').textContent = "Product description is required.";
        isValid = false;
      } else {
        document.getElementById('descriptionError').textContent = "";
      }

      if (!isValid) {
        event.preventDefault(); // Prevent form submission if validation fails
      }
    }
</script>
