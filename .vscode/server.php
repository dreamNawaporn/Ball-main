<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $dbname = "footballteam";

//สร้างการเชื่อมต่อ
    $conn = mysqli_connect($identifier, $first_name, $last_name, $team, $position, $image);
//check connection

if(!$conn){
    die("Connection failed". mysqli_connect_error());
}else{
    echo "Connected successfull";
}






?>