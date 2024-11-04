<?php
$conn = mysqli_connect("localhost", "root", "", "gafcommerce");

if (!$conn) {
    // code...
    echo "error in connection". mysqli_connect_error();
}


?>