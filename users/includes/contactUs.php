<?php
include('header.php');
?>

<title>Contact Us - GAF-MARKET</title>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Contact Us</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="container-fluid px-1 mx-auto mt-n1">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-11">
                        <div class="add-product-card card">
                            <div class="contact-image">
                                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact" />
                            </div>
                            <form method="post">
                                <h3 class="text-center mb-5">Drop Us a Message</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group my-4">
                                            <input type="text" name="txtName" required class="form-control" placeholder="Your Name *" value="" />
                                        </div>
                                        <div class="form-group my-4">
                                            <input type="text" name="txtEmail" required class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group my-4">
                                            <input type="text" name="txtPhone" required class="form-control" placeholder="Your Phone Number *" value="" />
                                        </div>

                                    </div>
                                    <div class="col-md-6 my-4">
                                        <div class="form-group">
                                            <textarea name="txtMsg" class="form-control" required placeholder="Your Message *" style="width: 100%; height: 160px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group my-4 btn-center">
                                        <input type="submit" style="width:40%;" name="btnSubmit" class="btn btn-success" value="Send Message" />
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