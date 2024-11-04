<?php
include('header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-MARKET</title>
    <style>
        .imageupload {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            overflow: hidden;
            border-radius: 15px;
            /* Rounded border */
        }

        .imageupload img {
            width: 80%;
            border-radius: 15px;
            object-fit: cover;
        }
        .profile{
            width: 100%;
        }
    </style>
</head>
<body>

<div class="main" id="main">
<div class="pagetitle">
      <h1>View More</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">view more</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        <section class="section">
            <div class="row align-items-top">
                <div class="col-lg-12">
                    <!-- Default Card -->
                    <div class="row">
                        <div class="col-8">
                        <div class="card">
                        <div class="card-header">
                            <small  style="font-size: 17px;">Bawumia Mahamadu</small><br>
                            <small  style="font-size: 12px;"> 25th October, 2024, 10:43</small>
                        </div>
                        <div class="card-body">
                            <div class="imageupload">
                                <img src="../../uploads/uniform.jpeg" alt="">
                            </div>
                        </div>
                        <div class="card-footer ">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam doloremque explicabo, 
                                repellendus omnis, eveniet vitae in ut perspiciatis quis obcaecati, 
                                accusantium aliquid totam quam aspernatur laboriosam debitis?</p>
                        </div>
                    </div><!-- End Card with header and footer -->
                        </div>

                        <div class="col-md-4">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title"><small>Army uniform - ww2</small></h6>
                        <h6 class="">Price: GHC 10,000</h6> 
                            <div class="text-center">
                                <div class="">
                                    <div class="">
                                       <button class="btn btn-sm bg-transparent text-primary" style="width: 100%; border: 1px solid blue;">Request callback</button>
                                    </div>
                                </div>
                                <div class="">
                                    <div class=" mt-2">
                                       <button class="btn btn-sm bg-transparent text-primary" style="width: 100%; border: 1px solid blue;">Negotiate Price</button>
                                    </div>
                                </div>
                                <!-- End activity item-->
                            </div>

                        </div>
                    </div><!-- End Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                            <div class="mt-2 mb-2 col-3">
                            <img src="../../assets/img/avatar.png" alt="Profile" class="rounded-circle profile">
                            </div>
                            <div class="col-9 mt-2">
                            <span><small style="font-size: smaller;">Mahamadu Bawumia</small></span><br>
                            <span><small style="font-size: smaller;">Joined 2013, 12y</small></span>
                            </div>
                            </div>
                            
                            <div class="text-center">
                                <div class="mt-1">
                                    <div class="">
                                       <button class="btn btn-sm bg-transparent text-primary" style="width: 100%; border: 1px solid blue;"> <i class="bi bi-telephone-outbound-fill me-2"></i>0556524653</button>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="">
                                       <button class="btn btn-sm bg-transparent text-primary" style="width: 100%; border: 1px solid blue;"> <i class="bi bi-bi bi-chat-left-text  me-2"></i>0556524653</button>
                                    </div>
                                </div>
                                <!-- End activity item-->
                            </div>

                        </div>
                    </div><!-- End Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="mt-1">
                                    <div class="">
                                       <button class="btn btn-sm bg-transparent text-danger" style="width: 100%; border: 1px solid blue;"> <i class="bi bi-ban me-2"></i>Report User</button>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <div class="">
                                       <button class="btn btn-sm bg-transparent text-danger" style="width: 100%; border: 1px solid blue;"> <i class="bi bi-flag-fill me-2"></i>Report Product</button>
                                    </div>
                                </div>
                                <!-- End activity item-->
                            </div>

                        </div>
                    </div>



                </div>
                    
                </div>
            </section>
    </div>
