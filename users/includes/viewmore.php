<?php
include('../../db/db.php');
include('header.php');

if(isset($_GET['productid']))
{
    $productid = $_GET['productid'];
    $sellerid =  $_GET['sellerid'];
    $id = $_GET['id'];
}



$query = "SELECT * FROM productimgs p JOIN users u ON p.userid = u.id WHERE p.id = ? ";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
$stmt->execute();
$result = $stmt->get_result();

$rows = mysqli_fetch_assoc($result);
$sellername = $rows['name'];
$time = $rows['timestamp'];
$product_description = $rows['description'];
$price = $rows['price'];
$title = $rows['title'];
$sellertel = $rows['telephone'];

$registrationDate = new DateTime($time);
$currentDate = new DateTime();

$interval = $registrationDate->diff($currentDate);
$inyears = $interval->y;
$date = (new DateTime($time))->format('Y-m-d')

?>
<html>
<head>
    <title>GAF-MARKET</title>
    
    <style>
        /* Main card and image container adjustments */
        .card {
            padding: 10px;
        }
        
        .card-body {
            padding: 10px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            border-radius: 10px;
        }

        /* Smaller main image */
        .main-image {
            width: 60%;
            max-width: 300px;
            border-radius: 10px;
            object-fit: cover;
        }

        /* Smaller sub-images */
        .sub-images {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .sub-image {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .sub-image:hover {
            border: 2px solid #007bff;
        }

        .profile {
            width: 100%;
        }

        /* Adjusted padding for other elements */
        .pagetitle h1 {
            font-size: 1.5em;
        }

        .breadcrumb {
            margin: 0;
            padding: 5px 0;
        }

        .card-footer {
            padding: 8px;
            font-size: 0.9em;
        }

        /* Right-side items styling */
        .right-side-items {
            margin-top: 10px;
        }

        .right-card {
            margin-bottom: 10px;
            padding: 10px;
        }

        /* Button styles matching the product card */
        .custom-button {
            color: #13B206;
            border: 1px solid #13B206;
            border-radius: 5px;
            transition: color 0.3s ease, border-color 0.3s ease;
            background-color: transparent;
            padding: 5px 10px;
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 5px;
        }

        .custom-button:hover {
            color: #EEC108;
            border-color: #EEC108;
        } 

        .text-small {
            font-size: smaller;
        }
    </style>
</head>
<body>

<div class="main" id="main">
    <div class="pagetitle">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">View More</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
            <div class="col-lg-8">
           
                <div class="card">
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
                    <div class="card-header">
                        <small style="font-size: 15px; color: #919191;"><?php echo $sellername  ?></small><br>
                        <small style="font-size: 11px; color: #919191"><?php echo $time ?></small>
                    </div>
                    <div class="card-body">
                        <div class="image-container">
                            <?php 
                                $pathquery = "SELECT * FROM productimgs Where id = ? LIMIT 1";
                                $pathstmt = mysqli_prepare($conn, $pathquery);
                                mysqli_stmt_bind_param($pathstmt,"i",$id);
                                $pathstmt->execute();
                                $fetchpath = $pathstmt->get_result();
                                foreach($fetchpath as $key => $value)
                                {
                                    echo '
                                    <img id="mainImage" class="main-image" src="../../productsimgs/'.$value['path'].'" alt="Product Image">
                                    
                                    ';
                                }
                            ?>
                            <!-- Sub Images -->
                             <?php 
                             $multipathquery = "SELECT path FROM productimgs Where id = ? OR productid = ? GROUP BY id";
                             $multipathstmt = mysqli_prepare($conn, $multipathquery);
                             mysqli_stmt_bind_param($multipathstmt,"is",$id, $productid);
                             $multipathstmt->execute();
                             $multifetchpath = $multipathstmt->get_result();

                             foreach($multifetchpath as $key => $value)
                             {
                                 echo '
                                 <div class="sub-images">
                                <img class="sub-image" src="../../productsimgs/'.$value['path'].'" alt="Sub Image 1" onclick="changeImage(this.src)">
                                </div>
                                 
                                 ';
                             }

                             ?>
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <p><?php echo $product_description?></p>
                    </div>
                </div><!-- End Main Card -->
            </div>

            <!-- Right Side Items -->
            <div class="col-lg-4 right-side-items">
                <!-- Recent Activity -->
                <div class="card right-card">
                    <div class="card-body">
                        <h6 style="font-weight: bold;"><?php  echo $title?></h6>
                        <h6 style="font-weight: bold;">Price: GHC<?php echo  " ".$price ?></h6>
                        <div class="text-center">
                            <button class="btn btn-sm custom-button" type="button" data-toggle="modal" data-target="#requestModal">Request callback</button>
                            <button class="btn btn-sm custom-button" type="button" data-toggle="modal" data-target="#negotiateModal">Negotiate Price</button>
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

                <!-- Profile Card -->
                <div class="card right-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mt-2 mb-2 col-3">
                                <img src="../../assets/img/avatar.png" alt="Profile" class="rounded-circle profile">
                            </div>
                            <div class="col-9 mt-2">
                                <span><small class="text-small"><?php echo $sellername ?></small></span><br>
                                <span><small class="text-small"><?php if($inyears <= 0) {echo "Joined"." ".$date." "."less than a year";} else{echo "Joined".$date." ".$inyears."y";} ?></small></span>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-sm custom-button">
                                <i class="bi bi-telephone-outbound-fill me-2"></i><?php echo $sellertel?>
                            </button>
                            <button class="btn btn-sm custom-button">
                                <i class="bi bi-chat-left-text me-2 "></i><a href="https://wa.me/<?php echo $sellertel?>" style="text-decoration: none; color:inherit;" >Whatsapp</a>
                            </button>
                        </div>
                    </div>
                </div><!-- End Profile Card -->

                <!-- Report Options -->
                <div class="card right-card">
                    <div class="card-body">
                        <div class="text-center">
                            <button type="button" class="btn btn-sm custom-button text-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="bi bi-flag-fill me-2"></i>Report Content
                            </button>
                        </div>
                    </div>
                </div><!-- End Report Options -->
            </div>
        </div>
    </section>
</div> 


<!-- Report Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report content</h5>
       
      </div>
      <div class="modal-body">
        Confirm Action on <?php echo $sellername ?> and product <?php echo $title?>
      </div>
        
      <div class="modal-footer">
        <form action="viewmore.php?productid=<?php echo $productid ?>&sellerid=<?php echo $sellerid ?>&id=<?php echo $id?>" method="POST">
            <Textarea class="mt-1 form-control mb-2" rows="6" name="description" cols="55" placeholder="Describe your report" required></Textarea>
        <button type="submit" class="btn btn-danger text-white" style="float: right;" name="report">Send Report</button>
        </form>
      </div> 
    </div>
  </div>
</div>



<!-- callback Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request a callback from <?php echo $sellername?></h5>
      </div>
      <form action="viewmore.php?productid=<?php echo $productid ?>&sellerid=<?php echo $sellerid ?>&id=<?php echo $id?>" method="POST">
      <div class="modal-body">
        <textarea name="callbackmessage" class="form-control" required id="" rows="6" cols="55" placeholder="enter a message"></textarea>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning text-white" name="request">Request callback</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!--negotiate modal-->
<div class="modal fade" id="negotiateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Negotiate a price. Current price GHC <?php echo $price?></h5>
      </div>
      <form action="viewmore.php?productid=<?php echo $productid ?>&sellerid=<?php echo $sellerid ?>&id=<?php echo $id?>" method="POST">
      <div class="modal-body">
        <input type="number" class="form-control mb-2" name="amountngt" id="" placeholder="enter amount to negotiate">
        <textarea name="ngtmessage" class="form-control" required id="" rows="6" cols="55" placeholder="enter a message"></textarea>
      </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning text-white" name="ngtbtn">Negotiate</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
if(isset($_POST['report']))
{
    $description = $_POST['description'];
    $query = "INSERT INTO reports(userid, productid, reportdescription) VALUES(?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iss", $sellerid, $productid, $description);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['success'] = "Report has been sent, Thank you!";
    } else {
        $_SESSION['error'] = "An Error occured";
    }


    echo '<script>window.location.href="viewmore.php?productid=' . $productid .'&sellerid='.$sellerid. '&id=' . $id . '";</script>';
        exit();
    
    mysqli_stmt_close($stmt);

}

if(isset($_POST['request']))
{
    $header = $_SESSION['username']." "."Requested a call back on"." ".$title;
    $message = $_POST['callbackmessage'];
    $query = "INSERT INTO callback(header, message, receiver) VALUES(?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $header, $message, $sellerid);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['success'] = "Callback has been requested, Thank you!";
    } else {
        $_SESSION['error'] = "An Error occured";
    }


    echo '<script>window.location.href="viewmore.php?productid=' . $productid .'&sellerid='.$sellerid. '&id=' . $id . '";</script>';
        exit();
    
    mysqli_stmt_close($stmt);
}

if(isset($_POST['ngtbtn'])) 
{
    $header = $_SESSION['username']." "."is requesting for a negotiation on"." ".$title;
    $amount = "Amount negotiated was GHC"." ".$_POST['amountngt']." "."on product"." ".$title." ".$price;
    $message = $_POST['ngtmessage'];

    $query = "INSERT INTO ngtchat(header, amount, message, receiver) VALUES(?,?,?,?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $header,$amount, $message, $sellerid);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['success'] = "Your request has been sent, Thank you!";
    } else {
        $_SESSION['error'] = "An Error occured";
    }

    echo '<script>window.location.href="viewmore.php?productid=' . $productid .'&sellerid='.$sellerid. '&id=' . $id . '";</script>';
        exit();
    
    mysqli_stmt_close($stmt);
}

?>

















<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script>
    // Function to change the main image on clicking sub-images
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>

