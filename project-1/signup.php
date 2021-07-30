<?php
	$name = $_POST['name'];
	$age = $_POST['age'];
	$bloodgroup = $_POST['bloodgroup'];
	$contact = $_POST['contact'];
	$trainee = $_POST['trainee'];
	$timeslot = $_POST['timeslot'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','fit&fine');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(name, age, bloodgroup, contact, trainee, timeslot, address, email, password) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sisisssss", $name, $age, $bloodgroup, $contact, $trainee, $timeslot, $address, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your registration is successful! Login to view your details and visit Gym for further Process";
		$stmt->close();
		$conn->close();
	}
?>
