<!--Create a MySQL database called ‘Library ’. Create a table called ‘csebooks ’ with    fields ‘Name’, ‘title ’, ‘author ’ and ‘year’. Write a PHP program to execute the following queries
i) Accept these fields information from a web page and to store those in the table.
ii) Search a book for a title given by the user on a web page and display the search results with proper headings
-->
<!doctype HTML>
<head>
	<title>
		FIVE
	</title>
</head>
<body>
	<form action="q5.php" method="POST">
		<br>NAME    : <input type="text" name="name">
		<br>EDITION : <input type="text" name="edition">
		<br>AUTHOR  : <input type="text" name="author">
		<br>YEAR    : <input type="number" name="year">
		<br><br><br><input type="submit" name="button1" value="SUBMIT">
	</form>
	<hr>
	<hr>
	<form action="q5.php" method="POST">
		NAME : <input type="text" name="name1">
		<br><input type="submit" name="button2" value="SEARCH">
	</form>

	<?php

		$servername="localhost";
		$username="root";
		$password="";
		$dbname="library";

		$conn=new mysqli($servername , $username , $password , $dbname);
		if($conn->connect_error)
		{
			die("CONNECTION FAILED " . $conn->connect_error); 
		}	
		echo "SUCCESSFULLY CONNECTED YAY<br>";

		if(isset($_POST["button1"]))
		{
			$stmt=$conn->prepare("INSERT INTO csebooks VALUES (?,?,?,?)");
			$stmt->bind_param("sssi",$name,$edition,$author,$year);
			$name=$_POST["name"];
			$edition=$_POST["edition"];
			$author=$_POST["author"];
			$year=$_POST["year"];
			$stmt->execute();

		}
		elseif(isset($_POST["button2"]))
		{
			$searchname=$_POST["name1"];
			$select="SELECT * FROM csebooks WHERE name='$searchname'";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{
				while($rows=$res->fetch_assoc())
				{	echo "<hr>";
					echo "<br>NAME : " . $rows["name"] . "<br>AUTHOR : ". $rows["author"]. "<br>EDITION : ". $rows["edition"]."<br>YEAR : ".$rows["year"];
				}
			}
			else echo "<br>NO RESULTS FOUND <br>";
		}
	?>
</body>