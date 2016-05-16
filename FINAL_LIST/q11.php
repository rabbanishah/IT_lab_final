<!--Using PHP and MySQL, write a program to accept the User Name, Gender and Age and store it the Database. Write a program to execute the queries to display a greeting  message that is age  appropriate.                           
i) 60 year old Gentleman named Francis, display “Namaste Uncle Francis” 
ii) 60 year old Lady named  Benazir, display  “Namaste Aunty  Benazir”
iii) 18 year old guy named Mahesh, display “Hi! Mahesh. How are you dude? “
-->

<!doctype HTML>
<head>
	<title>
		NINE	
	</title>
</head>
<body>
	<form action ="q11.php" method="POST">
		NAME : <input type="text" name="name" required>
		<br>AGE : <input type="number" name="age">
		<br>MALE <input type="radio" name="gender" value="m">
		<br>FEMALE <input type="radio" name="gender" value="f">
		<br><input type="submit" name="submit" value="INSERT">
		<hr>
		<hr>
		</form>
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="college";
		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error)
		{
			die("FAILED ".$conn->connect_error);
		}
		echo "<script type=text/javascript>alert('successfully connected')</script>";
		if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO people VALUES (?,?,?)");
			$stmt->bind_param("sis",$name,$gender,$age);
			$name=$_POST["name"];
			$age=$_POST["age"];
			$gender=$_POST["gender"];
			//$usn=$_POST["usn"];
			if($age >= 30 && $gender=="m")
				echo "<br>NAMASTE UNCLE ".$name;
			elseif($age >= 30 && $gender=="f")
				echo "<br>NAMASTE AUNTY ".$name;
			else
				echo "<br>hey ".$name;
			$stmt->execute();
		}
	?>
</body>