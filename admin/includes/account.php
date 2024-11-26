<?php
include('header.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAF-commerce My Profile</title>
    <style>
       
       .imgprofile {
    width: 100px;             
    height: 100px;            
    border-radius: 50%;      
    object-fit: cover;       
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    border: 2px solid #f2f2f2; 
}
    </style>
</head>

<body>
    <div class="main" id="main">
        <div class="pagetitle">
            <h1>My Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section profile">
      <div class="row">
        <div class="col-xl-8">
        <?php
                if(isset( $_SESSION['success'])) {
                    echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">
                          '. $_SESSION['success'].'
                          <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    unset( $_SESSION['success']); 
                }
                else{
                    echo '<div class="alert alert-primary alert-dismissible mt-2 fade show" role="alert">
                          You will be required to login into your account after changing details!.
                          <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                }
                

                if(isset( $_SESSION['oldpasserror'])) {
                    echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                          '. $_SESSION['oldpasserror'].'
                          <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    unset( $_SESSION['oldpasserror']); 
                }

                if(isset( $_SESSION['confirmpass'])) {
                    echo '<div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                          '. $_SESSION['confirmpass'].'
                          <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                    unset( $_SESSION['confirmpass']); 
                }
                  
            ?>
          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">                  
                <div class="tab-pane fade show active profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="../../db/dbquerries.php">
               

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" required value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="currentpass" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentpass" type="password" required class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newpass" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpass" type="password" required class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="confirmpass" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="confirmpass" type="password" required class="form-control" id="renewPassword">
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name="adminupdatebtn" class="btn btn-outline-success w-70" style="width: 50%;">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>


        
    </div>
</body>

</html>
