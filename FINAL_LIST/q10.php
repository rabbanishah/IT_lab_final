<!--Write a PHP-MySQL program to create Student  table with following fields USN, Name,  Branch. Write a PHP  program to execute the following queries
i) Enter data through the program for the above table. 
ii) Display the students who belong to ECE branch.-->

<!doctype HTML>
<head>
	<title>
		NINE	
	</title>
</head>
<body>
	<form action ="q10.php" method="POST">
		NAME : <input type="text" name="name" required>
		<br>USN : <input type="text" name="usn">
		<br>BRANCH : <input type="text" name="branch">
		<br><input type="submit" name="submit" value="INSERT">
		<hr>
		<hr>
		</form>
		<form action="q10.php" method="POST">
		<input type="submit" name="search" value="SEARCH FOR ECE students">
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
			$stmt=$conn->prepare("INSERT INTO student3 VALUES (?,?,?)");
			$stmt->bind_param("sss",$name,$usn,$branch);
			$name=$_POST["name"];
			$usn=$_POST["usn"];
			$branch=$_POST["branch"];
			//$usn=$_POST["usn"];
			$pat="/[1][Mm][Ss]\d{2}[A-Za-z]{2}\d{3}/";
			if(!preg_match($pat, $usn))
			{
				die( "<script type=text/javascript>alert('ENTER USN CORRECTLY')</script>");
			}
			$stmt->execute();
		}
		elseif(isset($_POST["search"]))
		{
			$select="SELECT * FROM student3 WHERE branch='ECE'";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{
				while($row=$res->fetch_assoc())
				{
					echo "<br><br>NAME : ".$row["name"]."<br>USN : ".$row["usn"]."<br>BRANCH : ".$row["branch"];
				}
			}
			else echo "NO RESULTS FOUND ";
		}
	?>
</body>