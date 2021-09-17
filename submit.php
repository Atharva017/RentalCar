<?php
    include 'conn.php';

    $name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $pickup = $_POST['pickup'];
	$destination = $_POST['destination'];
	$city = $_POST['city'];
    $dt = $_POST['dt'];

    $conn = $pdo->open();

    try{
        $stmt = $conn->prepare("INSERT INTO userform (email_id,name, phone, city, pickup, destination, date_time) VALUES (:email_id,:name, :phone, :city, :pickup, :destination, :date_time)");
		$stmt->execute(['name'=>$name, 'email_id'=>$email, 'phone'=>$phone, 'city'=>$city, 'pickup'=>$pickup, 'destination'=>$destination, 'date_time'=>$dt]);
		$response = "success";
        header("location: contact.html");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    $pdo->close();
?>