<!--Create a MySQL Database called ‘FinalYears’. Create a Table ‘Student’ with ‘USN’,’Name’ and ‘Age’ as    fields. Write a PHP program to to execute the following query 
i) Insert your USN, Name and Age information into the table from a web page 
ii) Check whether he/she is eligible for voting or not.
-->

<!doctype HTML>
<head>
	<title>
	ONE
	</title>

</head>
<body>
<form action="q7.php" method="POST">
ENTER STUDENT DETAILS : <br><br>
USN : <input type="text" name="usn"><br>
NAME : <input type="text" name="name"><br>
AGE : <input type="number" name="age"><br>
<input type="submit" name="submit" value="submit">
<br>
<hr>
<hr>
<hr>
</form>

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="FinalYears";
	$conn=new mysqli($servername , $username , $password , $dbname);
	if($conn->connect_error)
	{
		die("CONNECTION FAILED " . $conn->connect_error);
	}
	echo "<script type=text/javascript>alert('CONNECTED')</script>";

	if(isset($_POST["submit"]))
		{	//echo "hello";
			$stmt=$conn->prepare("INSERT INTO student VALUES (?,?,?)");
			$stmt->bind_param("ssi",$usn,$name,$age);
			$usn=$_POST["usn"];
			//echo $name;
			$name=$_POST["name"];
			//echo $credit;
			$age=$_POST["age"];
			//echo $department;
			$stmt->execute();
			if($age>=18)
				echo "<script type=text/javascript>alert('YOU ARE ELIGIBLE')</script>";
			else
				echo "<script type=text/javascript>alert('YOU ARE NOT ELIGIBLE')</script>";
		}

	
?>
</body>
