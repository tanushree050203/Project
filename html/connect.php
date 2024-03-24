<?php
$yourName = $_POST['yourName'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$message = $_POST['message'];

//Database connection
$conn = new mysqli('phpmyadmin demo', 'root', '', 'tb');

//Check connection
if($conn->connect_error){
    die("Connection Failed :".$conn->connect_error);
}else{
    $stmt = $conn->prepare("Insert into registration(yourName, phoneNumber, email, message)values(?, ?, ?, ?)");
    $stmt->bind_param("siss",$yourName, $phoneNumber, $email, $message);
    $stmt->execute();
    echo "registration Successfully....";
    $stmt->close();
    $conn->close();
}

?>