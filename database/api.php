<?php
	
	// return "hello";

	$conn = new mysqli("localhost", "root", "123456", "vuephpmysql");

	if($conn->connect_error){
		die("could not connect to databse!");
	}

	$response = array('error' => false);

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == "read") {
		$result = $conn->query("select * from `users`");
		$users = array();
		while ($row = $result->fetch_assoc()) {
			array_push($users, $row);
		}
		$response['message'] = "All users information loaded successfully.";
		$response['users'] = $users;
	}

	if ($action == "create") {

		$username = $_POST['username'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		$result = $conn->query("insert into `users` (`username`, `email`, `mobile`) values ('$username', '$email', '$mobile')");

		if ($result) {
			$response['message'] = "user added successfully";
		} else {
			$response['error'] = true;
			$response['message'] = "Could not insert user";
		}
	}

	if ($action == "update") {

		$id = $_POST['id'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		$result = $conn->query("update `users` set `username` = '$username', `email` = '$email', `mobile` = '$mobile' where `id` = '$id'");

		if ($result) {
			$response['message'] = "user updated successfully";
		} else {
			$response['error'] = true;
			$response['message'] = "Could not update user";
		}
	}

	if ($action == "delete") {

		$id = $_POST['id'];

		$result = $conn->query("delete from `users` where `id` = '$id'");

		if ($result) {
			$response['message'] = "user deleted successfully";
		} else {
			$response['error'] = true;
			$response['message'] = "Could not delete user";
		}
	}


	$conn->close();
	header("Content-type: application/json");
	echo json_encode($response);
	die();

?>