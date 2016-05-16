<!-- Write a PHP program to read student name, USN ,branch and a radio button for mode of admission either CET or COMED_K  from the user using HTML5 Write a PHP program to execute the following queries
i) Insert entered data from user to MySQL Database.
ii) Extract the students who are admitted through CET  and branch is CSE, display the result in a proper format on a HTML page.
-->
<!doctype HTML>
<head>
	<title>
		FOUR
	</title>
</head>
<body>
	<form action="q4.php" method="POST">
		NAME   : <input type="text" name="name">
		<br><br>USN    : <input type="text" name="usn">
		<br><br>BRANCH : <input type="text" name="branch">
		<br><br>MODE OF ADMISSION :&nbsp&nbsp&nbspCOMEDK<input type="radio" name="hello" value="COMEDK">  
		KCET<input type="radio" name="hello" value="CET">
		<input type="submit" name="submit" value="SUBMIT">

	</form>
	<form action="q4.php" method="POST">
	<hr><hr>
	<input type="submit" name="search" value="SEARCH">	
	</form>
	<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="college";
	$conn=new mysqli($servername , $username , $password , $dbname);
	if($conn->connect_error)
	{
		die("CONNECTION FAILED " . $conn->connect_error);
	}
	echo "<script type=text/javascript>alert('CONNECTED')</script>";

	if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO student2 VALUES (?,?,?,?)");
			$stmt->bind_param("ssss",$name,$usn,$branch,$mode);
			$name=$_POST["name"];
			$usn=$_POST["usn"];
			$branch=$_POST["branch"];
			$mode=$_POST["hello"];
			$stmt->execute();
		}
	elseif(isset($_POST["search"]))
	{
		//$model1=$_POST["modelx"];
		$select="SELECT * FROM student2 where branch='cse' && mode='cet'";
		$res=$conn->query($select);
		if($res->num_rows > 0)
		{
			while($row=$res->fetch_assoc())
			{
				echo "NAME ". $row["name"] . "<br>";
				echo "USN ". $row["usn"] . "<br>";
				echo "BRANCH ". $row["branch"] . "<br>";
				echo "MODE OF ADMISSION ". $row["mode"] . "<br>";
				echo "<hr>";
			}
		}
		else echo "ZERO RESULTS" ;
	}
?>
</body>