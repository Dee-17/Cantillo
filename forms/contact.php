<?php
 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $message = $_POST['message'];


 //Database Connection
 $conn = new mysqli('localhost', 'root', '', 'test');

 if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
} else{
    $stmt = $conn->prepare("insert into contact_details(name, email, subject, message) values (?,?,?,?)");

    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    $stmt->execute();

    echo "Your message has been sent successfully!";
    $stmt->close();
    $conn->close();
}

?>