<?php
session_start();
include('../db/db.php');

//user registration query 
if(isset($_POST['registerAccountBtnUser']))
{

    $name =  $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $password = md5($_POST['password']);

    $query = "INSERT INTO users(name, email, telephone, password) VALUES(?,?,?,?)";
    $stmt =  mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $tel, $password);
    
    $result = mysqli_stmt_execute($stmt);

    if($result)
    {   $_SESSION['success'] = 'Your Account Has Been Registered Successfully,Login';
        echo "<script>window.location.href='../users/auth/register.php'</script>";
        exit();
    }

 
    echo "<script>window.location.href='../users/auth/register.php'</script>";
    $_SESSION['error'] = "An error occured registering asccount";

    mysqli_stmt_close($stmt);
}

//User Login

if(isset($_POST['loginbtnuser']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(!$result)
    {
        $_SESSION['error'] = "An error occured while loggin in" . mysqli_error($conn) ;
    }
    else{
        if(mysqli_num_rows($result) == 1)
        {
           $_SESSION['user'] = 'true';
            while($rows = mysqli_fetch_assoc($result)){ 
                $_SESSION['username']= $rows['name']; 
                $_SESSION['userId'] = $rows['id']; 
            }
            // echo "<script>window.location.href='../users/includes/header.php'</script>";
            echo "<script>window.location.href='../users/includes/home.php'</script>";

            exit();
        }
        else{
            $_SESSION['error'] = "Invalid credentials";
            echo "<script>window.location.href='../users/auth/login.php'</script>";
            exit();
        }
    }
    mysqli_stmt_close($stmt);
}


// Product upload
if (isset($_POST['productuploadbtn'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['userid']);
    $product_title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $product_price = mysqli_real_escape_string($conn, $_POST['price']);
    $product_description = mysqli_real_escape_string($conn, $_POST['description']);
    $product_imgs = $_FILES['images'];
    $folder = "../productsimgs/";
    $product_id = uniqid();

    // Prepare the statement once outside the loop
    $stmt = mysqli_prepare($conn, "INSERT INTO productimgs (userid, productid, path, title, category, price, description) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        foreach ($product_imgs['name'] as $key => $value) {
            $filename = uniqid() . time() . basename($product_imgs['name'][$key]);
            $target_file = $folder . $filename;
            
            // Bind parameters and execute the statement for each image
            mysqli_stmt_bind_param($stmt, "sssssss", $user_id, $product_id, $filename, $product_title, $category, $product_price, $product_description);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                // Move each file only if the database insert was successful
                move_uploaded_file($product_imgs['tmp_name'][$key], $target_file);
            } else {
                $_SESSION['error'] = "An error occurred while adding product images.";
                echo "<script>window.location.href='../users/includes/addproduct.php'</script>";
                exit();
            }
        }
        
        // Set success message and redirect after all images have been saved
        $_SESSION['success'] = "Product added successfully with multiple images.";
        echo "<script>window.location.href='../users/includes/addproduct.php'</script>";
        exit();
    } else {
        $_SESSION['error'] = "Failed to prepare database query.";
        echo "<script>window.location.href='../users/includes/addproduct.php'</script>";
        exit();
    }
    mysqli_stmt_close($stmt);

}




?>

