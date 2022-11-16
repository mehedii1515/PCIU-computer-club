<?php
	$name= $_POST['name'];
	$id = $_POST['id'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','pciu computer club');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(name, id, email, pass, phone) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sissi", $name, $id, $email, $pass, $phone);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>