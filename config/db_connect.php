<?php
    //using MYSQLi connection

    $conn = mysqli_connect('localhost', 'root','','shop');

    //checking the connection
    
    if(!$conn){
        echo "Connection error:" . mysqli_connect_error();
    
    }
?>
