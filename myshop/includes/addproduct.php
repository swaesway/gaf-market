<?php
include('header.php');
?>

<title>Add Products - GAF-MARKET</title>
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
  </style>

<main id="main" class="main">
  <div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Add a product</li>
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
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          unset($_SESSION['error']); 
      } 
      if(isset($_SESSION['success'])) {
          echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">
                '.$_SESSION['success'].'
                <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
          unset($_SESSION['success']);
      }
        
        ?>
          <h5 class="text-center mb-4">Product Upload</h5>
          <form class="form-card" onsubmit="validateForm(event)" method="POST" action="../../db/dbquerries.php" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php  echo  $_SESSION['userId']?>">  
          <!-- Product Name and Price -->
            <div class="row justify-content-between text-left mb-4">
              <div class="form-floating col-sm-6 mb-3 col-12">
                <input type="text" class="form-control" id="productName" name="title"  required>
                <label for="productName">Title*</label>
                <small id="nameError" class="text-danger"></small>
              </div>
              <div class="form-floating col-sm-6">
                <input type="number" class="form-control" id="productPrice" name="price"  required>
                <label for="productPrice">Price*</label>
                <small id="priceError" class="text-danger"></small>
              </div>
            </div>

            <!-- Category Dropdown -->
            <div class="row justify-content-between text-left mb-4">
              <div class="form-floating col-12">
                <select class="form-select" id="productCategory" name="category"  required>
                <option value=""></option>
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
                <textarea id="productDescription" name="description" class="form-control"rows="12" cols="50" required></textarea>
                <label for="productDescription">Description*</label>
                <small id="descriptionError" class="text-danger"></small>
              </div>
            </div>

            <!-- File Upload Button with Max 4 Images -->
            <div class="form-group mb-4">
              <h6 class="fw-bold mb-2">Add up to 4 photos for this category</h6>
              <button type="button" class="btn btn-outline-success" onclick="triggerFileUpload()">
                <i class="file-upload-btn">+</i>
              </button>
              <input type="file" required id="formFileLg" name="images[]" class="d-none" multiple onchange="displayFilePreviews()" accept="image/" />
              <small id="fileError" class="text-danger"></small>
              <div id="preview-container" class="mt-3 d-flex flex-wrap"></div>
            </div>

            <!-- Submit Button -->
            <div class="row justify-content-center text-center">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-success" name ="productuploadbtn" style="width: 100%;">Upload Product</button>
              </div>
            </div>
          </form>
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

    // Display image previews and limit to 4 images
    function displayFilePreviews() {
      const fileInput = document.getElementById('formFileLg');
      const previewContainer = document.getElementById('preview-container');
      const fileError = document.getElementById('fileError');

      previewContainer.innerHTML = ""; // Clear previous previews
      fileError.textContent = ""; // Clear any previous error

      // Check for a maximum of 4 files
      if (fileInput.files.length > 4) {
        fileError.textContent = "You can only upload up to 4 images.";
        fileInput.value = ""; // Reset file input
        return;
      }

      // Create image previews
      Array.from(fileInput.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function (event) {
          const img = document.createElement('img');
          img.src = event.target.result;
          img.alt = file.name;
          img.className = "img-thumbnail"; // Bootstrap styling
          previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      });
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
      if (!productPrice || isNaN(productPrice) || parseFloat(productPrice) <= 0) {
        document.getElementById('priceError').textContent = "Enter a valid price.";
        isValid = false;
      } else {
        document.getElementById('priceError').textContent = "";
      }

      // Validate Category
      const productCategory = document.getElementById('productCategory').value;
      if (productCategory === "") {
        document.getElementById('categoryError').textContent = "Please select a category.";
        isValid = false;
      } else {
        document.getElementById('categoryError').textContent = "";
      }

      // Validate Product Description
      const productDescription = document.getElementById('productDescription').value.trim();
      if (!productDescription) {
        document.getElementById('descriptionError').textContent = "Product Description is required.";
        isValid = false;
      } else {
        document.getElementById('descriptionError').textContent = "";
      }

      // Validate Image File Selection
      const fileInput = document.getElementById('formFileLg');
      if (fileInput.files.length === 0) {
        document.getElementById('fileError').textContent = "Please upload at least one image.";
        isValid = false;
      } else if (fileInput.files.length > 4) {
        document.getElementById('fileError').textContent = "You can only upload up to 4 images.";
        isValid = false;
      } else {
        document.getElementById('fileError').textContent = "";
      }


    }
  </script>