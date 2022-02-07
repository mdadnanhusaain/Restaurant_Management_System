<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];

    $conn = new mysqli('localhost:3308','root','','orders');
    if($conn->connect_error)    
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    else    
    {
        $comm = $conn->prepare("INSERT INTO form(name, phone, address, item, quantity) values(?, ?, ?, ?, ?)");
        $comm->bind_param("sissi",$name, $phone, $address, $item, $quantity);
        $comm->execute();
        $comm->close();
        $conn->close();
    }
    header("Location: index.html");
?>

