<!-- Write a PHP program that connects to the MySQL database COLLEGE. Create table called STUDENT with suitable fields. Write a program to execute the following query
i) Display the Students whose CGPA is below 9.
ii) Update the  student table to change the cgpa of student named “john” from 8.96 t0 9.4. and display the  results.
student NAME , AGE , BRANCH , CGPA
-->
<!doctype HTML>
<head>
	<title>
		THREE
	</title>
</head>
<body>
	<form action="q3.php" method="POST">
	<br>STUDENT NAME   : <input type="text" name="name">
	<br>STUDENT AGE    : <input type="number" name="age">
	<br>STUDENT BRANCH : <input type="text" name="branch">
	<br>STUDENT CGPA   : <input type="text" name="cgpa">	
	<input type="submit" name="submit" value="SUBMIT">
	</form>
	<hr>
	<hr>
	<br>
	<form action="q3.php" method="POST">
		QUERY<br>
		<input type="submit" name="search" value="SEARCH <9">
		<br>
		UPDATE<br>
		<input type="submit" name="update" value="UPDATE">

	</form>
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="college";
		$conn=new mysqli($servername, $username , $password , $dbname);
		if($conn->connect_error)
		{
			die("CONNECTION FAILED" . $conn->connect_error);
		}
		echo "<script type=text/javascript>alert('SUCCESSFULLY CONNECTED')</script>";

		if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO student values (?,?,?,?)");
			$stmt->bind_param("siss",$name, $age , $branch, $cgpa);
			$name=$_POST["name"];
			$age=$_POST["age"];
			$branch=$_POST["branch"];
			$cgpa=$_POST["cgpa"];
			$stmt->execute();
		}
		elseif(isset($_POST["search"]))
		{
			$select="SELECT * FROM student WHERE cgpa<=9";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{
				while($rows=$res->fetch_assoc())
				{
					echo "<br>NAME : ".$rows["name"]."<br>AGE : ".$rows["age"]."<br>BRANCH : ".$rows["branch"]."<br>CGPA : ".$rows["cgpa"]."<br>";
				}
			}
			else
				echo "NO ENTRIES<br>";
		}
		elseif(isset($_POST["update"]))
		{
			$update="UPDATE student SET cgpa=7 WHERE name='abdul'";
			$update2="SELECT * FROM student WHERE name='abdul'";
			$run_update=$conn->query($update);
			if(!$run_update)
				echo("UPDATION FAILED ");
			
			$res2=$conn->query($update2);
			if($res2->num_rows > 0)
			{
				while($rows2=$res2->fetch_assoc())
				{
					echo "<br>NAME : ".$rows2["name"]."<br>AGE : ".$rows2["age"]."<br>BRANCH : ".$rows2["branch"]."<br>CGPA : ".$rows2["cgpa"];

				}
			}
			else
				echo "NO ENTRIES";
		}
	?>
</body>