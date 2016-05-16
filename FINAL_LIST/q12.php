<!--Using PHP and MySQL, write a program to create registration form with the following fields - Name, User name, password and confirm password (both must be the same) and store it in the MYSQL database and  perform the following validations.
i) check if both the passwords are the same.
ii) check if user name, password, confirm password, are not empty 
-->

<!doctype HTML>
<head>
	<title>
		NINE	
	</title>
</head>
<body>
	<form action ="q12.php" method="POST">
		ENTER NAME : <input type="text" name="name" required>
		<br>ENTER USERNAME : <input type="text" name="user" required>
		<br>ENTER PASSWORD : <input type="password" name="pass" required>
		<br>CONFIRM PASSWORD : <input type="password" name="pass2" required>
		<br><input type="submit" name="submit" value="INSERT">
		<hr>
		<hr>
		</form>
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="registration";
		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error)
		{
			die("FAILED ".$conn->connect_error);
		}
		echo "<script type=text/javascript>alert('successfully connected')</script>";
		if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO employee VALUES (?,?,?)");
			$stmt->bind_param("sss",$name,$username,$password);
			$name=$_POST["name"];
			$username=$_POST["user"];
			$password=$_POST["pass"];
			//$usn=$_POST["usn"];
			$password2=$_POST["pass2"];

			if($password!=$password2)
				die("PASSWORDS NOT SAME ");
			else
				echo "PERFECT";
			$stmt->execute();
		}
	?>
</body>