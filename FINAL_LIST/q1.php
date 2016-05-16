<!-- Using PHP and MySQL, develop a program to accept ‘Car’ information viz.Registration number, model, color, mileage, year_of_registration from a HTML5 page. Write a program to execute the following queries.
i) Store the information in a database 
ii) Search for a car with the model specified by the user and to display the search results with proper headings.
-->



<!doctype HTML>
<head>
	<title>
	ONE
	</title>

</head>
<body>
<form action="q1.php" method="POST">
ENTER CAR DETAILS : <br><br>
Model : <input type="text" name="model"><br>
Color : <input type="text" name="color"><br>
Registration: <input type="text" name="reg"><br>
Mileage : <input type="text" name="mileage"><br>
Year of Registration : <input type="number" name="year"><br>
<input type="submit" name="submit" value="submit">
<br>
<hr>
<hr>
SEARCH CAR BY MODEL :<br>
Model : <input type="text" name="modelx">
<input type="submit" name="search" value ="search">
<br>
<hr>
</form>

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="cars";
	$conn=new mysqli($servername , $username , $password , $dbname);
	if($conn->connect_error)
	{
		die("CONNECTION FAILED " . $conn->connect_error);
	}
	echo "<script type=text/javascript>alert('CONNECTED')</script>";

	if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO `carinfo` (`model`, `registration`, `color`, `mileage`, `year`) VALUES (?,?,?,?,?)");
			$stmt->bind_param("sssii",$model,$reg,$color,$mileage,$year);
			$model=$_POST["model"];
			$reg=$_POST["reg"];
			$color=$_POST["color"];
			$mileage=$_POST["mileage"];
			$year=$_POST["year"];
			$stmt->execute();
		}
	elseif(isset($_POST["search"]))
	{
		$model1=$_POST["modelx"];
		$select="SELECT * FROM carinfo where model='$model1'";
		$res=$conn->query($select);
		if($res->num_rows > 0)
		{
			while($row=$res->fetch_assoc())
			{
				echo "MODEL ". $row["model"] . "<br>";
				echo "REGISTRATION ". $row["registration"] . "<br>";
				echo "COLOR ". $row["color"] . "<br>";
				echo "MILEAGE ". $row["mileage"] . "<br>";
				echo "YEAR ". $row["year"] . "<br>";
				echo "<hr>";
			}
		}
		else echo "ZERO RESULTS" ;
	}
?>
</body>
