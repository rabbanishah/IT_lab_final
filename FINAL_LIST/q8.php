<!--Create a MySQL database called ‘Movies’. Create a table called ‘HindiFilms’ with fields ‘Name’, ‘Budget’, ‘Hero’ and ‘Heroine’. Write a PHP  program to execute the following queries
i) Accept these fields information from a web page and to store those in the table.
ii) Program to search a movie for a title given by the user on a webpage & display search results with proper headings
-->

<!doctype HTML>
<head>
	<title>
		FIVE
	</title>
</head>
<body>
	<form action="q8.php" method="POST">
		<br>NAME    : <input type="text" name="name">
		<br>BUDGET  : <input type="number" name="budget">
		<br>HERO  : <input type="text" name="hero">
		<br>HEROINE    : <input type="text" name="heroine">
		<br><br><br><input type="submit" name="button1" value="SUBMIT">
	</form>
	<hr>
	<hr>
	<form action="q8.php" method="POST">
		NAME : <input type="text" name="name1">
		<br><input type="submit" name="button2" value="SEARCH">
	</form>

	<?php

		$servername="localhost";
		$username="root";
		$password="";
		$dbname="movies";

		$conn=new mysqli($servername , $username , $password , $dbname);
		if($conn->connect_error)
		{
			die("CONNECTION FAILED " . $conn->connect_error); 
		}	
		echo "SUCCESSFULLY CONNECTED YAY<br>";

		if(isset($_POST["button1"]))
		{
			$stmt=$conn->prepare("INSERT INTO hindifilms VALUES (?,?,?,?)");
			$stmt->bind_param("siss",$name,$budget,$hero,$heroine);
			$name=$_POST["name"];
			$budget=$_POST["budget"];
			$hero=$_POST["hero"];
			$heroine=$_POST["heroine"];
			$stmt->execute();

		}
		elseif(isset($_POST["button2"]))
		{
			$searchname=$_POST["name1"];
			$select="SELECT * FROM hindifilms WHERE name='$searchname'";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{
				while($rows=$res->fetch_assoc())
				{	echo "<hr>";
					echo "<br>NAME : " . $rows["name"] . "<br>BUDGET : ". $rows["budget"]. "<br>HERO : ". $rows["hero"]."<br>HEROINE : ".$rows["heroine"];
				}
			}
			else echo "<br>NO RESULTS FOUND <br>";
		}
	?>
</body>