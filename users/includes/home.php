<?php
session_start();
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-commerce Home</title>
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
        
        .card-footer i {
        cursor: pointer;
        font-size: 1.4em;
        transition: color 0.3s ease;
        }

        .card-footer i:hover {
        color: red; 
        }
        .topsellers
        {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 1; 
            line-height: 1.5; 
            max-height: calc(1.5em * 2); 
        }

        .row > .col-6 {
        display: flex;
        flex-direction: column;
    }

    .card {
        flex: 1;
    }

    .description {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* Limit to 3 lines */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    </style>
</head>

<body>

    <div class="main" id="main">
        <section class="section">
            <div class="row align-items-top">
                <div class="col-lg-9">
                    <!-- Default Card -->
                    <div class="row">
                        <div class="col-6">
                        <div class="card">
                        <div class="card-header">
                            <small  style="font-size: 17px;">Bawumia Mahamadu</small><br>
                            <small  style="font-size: 12px;"> 25th October, 2024, 10:43</small>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Army uniform - ww2</h6>
                            <h6 class="">Price: GHC 10,000</h6>
                            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quasi 
                                assumenda animi autem ullam praesentium laudantium nihil consectetur. Quas, obcaecati.</p>
                            <div class="imageupload">
                                <img src="../../uploads/uniform.jpeg" alt="">
                            </div>
                        </div>
                        <div class="card-footer text-center text-white">
                        <i class="bi bi-cart-plus mx-3 text-primary"></i> 
                        <i class="bi bi-bookmark mx-3 text-primary"></i>
                        <button class="btn btn-transparent" data-bs-toggle="modal" data-bs-target="#contactmodal"><i class="bi bi-telephone mx-3 text-primary"></i></button>                          
                        </div>
                    </div><!-- End Card with header and footer -->
                        </div>
                        <div class="col-6">
                        <div class="card">
                        <div class="card-header">
                        <small  style="font-size: 17px;">Nana Addo Dankwa</small><br>
                        <small style="font-size: 12px;"> 25th October, 2024, 10:43</small>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Army boots -Russia</h6>
                            <h6 class="">Price: GHC 3,000,000.00</h6>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, dignissimos. 
                                Tempora porro officia a, iste explicabo aliquid 
                                architecto dolor nulla.</p>
                            <div class="imageupload">
                                <img src="../../uploads/boots.jpeg" alt="">
                            </div>
                        </div>
                        <div class="card-footer text-center text-white">
                        <i class="bi bi-cart-plus mx-3 text-primary"></i> 
                        <i class="bi bi-bookmark mx-3 text-primary"></i>      
                        <i class="bi bi-telephone mx-3 text-primary"></i>
                        </div>
                    </div><!-- End Card with header and footer -->
                        </div>

                    </div>
                    <!-- Card with header and footer -->
                    
                </div>
                <div class="col-md-3">
                    <!-- Recent Activity -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Top Sellers<span>| Stores</span></h5>

                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <i class='bi bi-diagram-3 activity-badge text-success align-self-start'></i>
                                    <div class="activity-content ms-2">
                                        <small><a href="#" class="fw-small text-dark topsellers">Nana Addo Dankwa</a></small>
                                    </div>
                                </div><!-- End activity item-->
                                <div class="activity">
                                <div class="activity-item d-flex">
                                    <i class='bi bi-diagram-3 activity-badge text-success align-self-start'></i>
                                    <div class="activity-content ms-2">
                                        <small><a href="#" class="fw-small text-dark topsellers">Bawumia Mahamadu </a></small>
                                    </div>
                                </div><!-- End activity item-->

                            </div>

                        </div>
                    </div><!-- End Recent Activity -->



                </div>

            </section>
    </div>

    <div class="modal fade" id="contactmodal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="contactmodal">Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam quod, itaque totam iste labore 
            dolor, fugit ipsam adipisci nemo quasi, tempora minima dolorum eligendi obcaecati recusandae 
            blanditiis ab in? Deleniti.</p>
            <p>Price: GHC 200.00</p>
            <p>Item Owner: Bawumia Mahamadu</p>
            <p>Contact: 0556524653</p>
            <div  class="mb-3 text-center">
            <button class="btn btn-primary" style="width: 100%;">Request callback</button>
            </div>
            <div class="mb-3 text-center">
                <a href="viewmore.php"><button class="btn btn-primary" style="width: 100%;">View more</button></a>
            </div>
         </div>
      </div>
   </div>
</div>