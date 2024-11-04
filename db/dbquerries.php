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

    $query = "INSERT INTO users(name, email, tel, password) VALUES(?,?,?,?)";
    $stmt =  mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $tel, $password);
    
    $result = mysqli_stmt_execute($stmt);

    if($result)
    {   
        echo "<script>window.location.href='../users/auth/register.php'</script>";
        $_SESSION['success'] = 'Account registered';
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
            while($rows = mysqli_fetch_assoc($result)){
                $username = $rows['name'];
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

}


?>