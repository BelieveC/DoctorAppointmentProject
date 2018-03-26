<?php
		session_start();
		include("connection.php");

		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$sql = "SELECT * FROM Doctor where Doctor.username = '{$username}' and Doctor.password = '{$password}'";
		$result = mysqli_query($dbc,$sql);

		if(!$result)
			echo "failed";
		else
			echo "success";
		$numo = $result->num_rows;
		echo $numo;
		if($numo == 0)
		{
			header("Location: login.php");
		}
		else
		{
			$_SESSION['username']=$username;
			header("Location: index.html");
		}
?>