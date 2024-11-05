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
      <div class="container-fluid px-1 mx-auto mt-n1">
        <div class="row d-flex justify-content-center">
          <div class="col-xl-7 col-lg-8 col-md-9 col-11">
            <div class="card">
              <h5 class="text-center mb-4">Product Upload</h5>
              <form class="form-card" onsubmit="validateForm(event)">
                <div class="row justify-content-between text-left my-4">
                  <div class="form-group col-sm-6 flex-column d-flex">
                    <label class="form-control-label pr-3">Product Name<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter Product Name">
                    <small id="nameError" class="text-danger"></small>
                  </div>
                  <div class="form-group col-sm-6 flex-column d-flex">
                    <label class="form-control-label pr-3">Product Price<span class="text-danger"> *</span></label>
                    <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="Enter Product Price">
                    <small id="priceError" class="text-danger"></small>
                  </div>
                </div>

                <!-- Category Dropdown -->
                <div class="row justify-content-between text-left my-4">
                  <div class="form-group col-12 flex-column d-flex">
                    <label class="form-control-label pr-3">Category<span class="text-danger"> *</span></label>
                    <select class="form-control" id="productCategory" name="productCategory">
                      <option value="">Select Category</option>
                      <option value="Electronics">Electronics</option>
                      <option value="Footwear">Footwear</option>
                      <option value="Food Stuffs">Food Stuffs</option>
                      <option value="Clothing">Clothing</option>
                      <option value="Grocery">Grocery</option>
                      <option value="Home Appliances">Home Appliances</option>
                    </select>
                    <small id="categoryError" class="text-danger"></small>
                  </div>
                </div>

                <div class="row justify-content-between text-left my-4">
                  <div class="form-group col-12 flex-column d-flex">
                    <label class="form-control-label pr-3">Product Description<span class="text-danger"> *</span></label>
                    <textarea id="productDescription" name="productDescription" class="form-control" placeholder="" rows="3"></textarea>
                    <small id="descriptionError" class="text-danger"></small>
                  </div>
                </div>

                <!-- Custom Button for Multiple File Upload -->
                <div class="form-group">
                  <p>Add a photo</p>
                  <div>
                    <h6 class="fw-bolder">Add at least 1 photo for this category</h6>
                    <p class="lead fs-6">First picture is the title picture. You can change the order of photos by dragging them.</p>
                  </div>
                  <div class="btn btn-outline-success btn-lg" onclick="triggerFileUpload()">
                    +
                  </div>
                  <input type="file" id="formFileLg" name="productImages[]" class="d-none" multiple onchange="displayFilePreviews()" />
                  <small id="fileError" class="text-danger"></small>
                  <div id="preview-container" class="mt-3"></div> <!-- Container for image previews -->
                </div>

                <div class="row justify-content-center text-center">
                  <div class="form-group col-sm-6">
                    <button type="submit" class="btn btn-success btn-block mt-4">Upload Product</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<script>
  // Trigger the file input click
  function triggerFileUpload() {
    document.getElementById('formFileLg').click();
  }

  // Display previews for selected images
  function displayFilePreviews() {
    const fileInput = document.getElementById('formFileLg');
    const previewContainer = document.getElementById('preview-container');
    previewContainer.innerHTML = ""; // Clear previous previews

    Array.from(fileInput.files).forEach(file => {
      const reader = new FileReader();
      reader.onload = function(event) {
        const img = document.createElement('img');
        img.src = event.target.result;
        img.alt = file.name;
        img.className = "img-thumbnail m-1"; // Add Bootstrap styling
        img.style.width = "100px";
        img.style.height = "100px";
        previewContainer.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  }

  // Form validation function
  function validateForm(event) {
    event.preventDefault(); // Prevent form submission

    let isValid = true;

    // Validate Product Name
    const productName = document.getElementById('productName').value.trim();
    if (!productName) {
      document.getElementById('nameError').textContent = "Product Name is required.";
      isValid = false;
    } else {
      document.getElementById('nameError').textContent = "";
    }

    // Validate Product Price (ensure it's a number)
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
    } else {
      document.getElementById('fileError').textContent = "";
    }

    // If the form is valid, you can submit it here (e.g., send data to server)
    if (isValid) {
      alert("Form is valid and ready for submission!");
      // Here, you can handle actual form submission, e.g., using AJAX or submit the form normally
    }
  }
</script>