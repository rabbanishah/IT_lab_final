<!--Use MYSQL to create a database STUDENT and table ELECTIVE  (assume the fields) and write a PHP program to execute the following query
i) Display the entire elective list which has been offered from CSE department.
ii) Name the subject which has 0 registration.
-->

<!doctype HTML>
<head>
	<title>
	ONE
	</title>

</head>
<body>
<form action="q6.php" method="POST">
ENTER COURSE DETAILS : <br><br>
Name : <input type="text" name="name"><br>
Credits : <input type="number" name="credits"><br>
Department: <input type="text" name="dept"><br>
Registrations : <input type="number" name="regs"><br>
<input type="submit" name="submit" value="submit">
<br>
<hr>
<hr>
CSE :<input type="submit" name="cse" value ="CSE SUBJECTS">
<br>
ZERO REGISTRATIONS :<input type="submit" name="zero" value ="ZERO SUBJECTS">
<hr>
</form>

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="student";
	$conn=new mysqli($servername , $username , $password , $dbname);
	if($conn->connect_error)
	{
		die("CONNECTION FAILED " . $conn->connect_error);
	}
	echo "<script type=text/javascript>alert('CONNECTED')</script>";

	if(isset($_POST["submit"]))
		{	echo "hello";
			$stmt=$conn->prepare("INSERT INTO elective VALUES (?,?,?,?)");
			$stmt->bind_param("sisi",$name,$credit,$department,$registration);
			$name=$_POST["name"];
			echo $name;
			$credit=$_POST["credits"];
			echo $credit;
			$department=$_POST["dept"];
			echo $department;
			$registration=$_POST["regs"];
			echo $registration;
			$stmt->execute();
		}
	elseif(isset($_POST["cse"]))
	{
		$select="SELECT * FROM elective where department='cse'";
		$res=$conn->query($select);
		if($res->num_rows > 0)
		{
			while($row=$res->fetch_assoc())
			{
				echo "NAME ". $row["name"] . "<br>";
				echo "CREDITS ". $row["credit"] . "<br>";
				echo "DEPARTMENT ". $row["department"] . "<br>";
				echo "REGISTRATIONS ". $row["registration"] . "<br>";
				echo "<hr>";
			}
		}
		else echo "ZERO RESULTS" ;
	}
	elseif(isset($_POST["zero"]))
	{
		$select="SELECT * FROM elective where registration=0";
		$res2=$conn->query($select);
		if($res2->num_rows > 0)
		{
			while($row2=$res2->fetch_assoc())
			{
				echo "NAME ". $row2["name"] . "<br>";
				echo "CREDITS ". $row2["credit"] . "<br>";
				echo "DEPARTMENT ". $row2["department"] . "<br>";
				echo "REGISTRATIONS ". $row2["registration"] . "<br>";
				echo "<hr>";
			}
		}
		else echo "ZERO RESULTS" ;
	}
?>
</body>
