<!--Using PHP and MySQL, develop a program to accept ‘Employee’ information viz. Emp name, Emp code, Dept, Basic Salary from a HTML5 page. Write a PHP program to execute the following queries
i) Store the information in a database 
ii) Search for a employee with the name specified by the user and to display the search results with proper headings.
-->
<!doctype HTML>
<head>
	<title>
		TWO
	</title>
</head>
<body>
	<form action="q2.php" method="POST">
	<br>EMPLOYEE NAME   : <input type="text" name="name">
	<br>EMPLOYEE CODE   : <input type="text" name="code">		
	<br>EMPLOYEE DEPT   : <input type="text" name="dept">
	<br>EMPLOYEE SALARY : <input type="number" name="salary">
	<br><input type="submit" name="submit" value="SUBMIT">
	</form>

	<form action="q2.php" method="POST">
	<br>SEARCH FOR EMPLOYEE (ENTER NAME) : <input type="text" name="name1">
	<br>
	<input type="submit" name="search" value="SEARCH">

	</form>
	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="office";
		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error)
		{
			die("CONNECTION ERROR").$conn->connect_error;
		}

		echo "<script type=text/javascript>alert('SUCCESSFULLY CONNECTED')</script>";

		if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO employee VALUES (?,?,?,?)");
			$stmt->bind_param("sssi",$name , $code , $dept , $salary);
			$name=$_POST["name"];
			$code=$_POST["code"];
			$dept=$_POST["dept"];
			$salary=$_POST["salary"];
			$stmt->execute();
		}
		elseif(isset($_POST["search"]))
		{	$name=$_POST["name1"];
			$select="SELECT * FROM employee where name='$name'";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{	echo "<br>";
				while($row=$res->fetch_assoc())
				{
					echo "EMPLOYEE NAME       : ".$row["name"]."<br>";
					echo "EMPLOYEE CODE       : ".$row["code"]."<br>";
					echo "EMPLOYEE DEPARTMENT : ".$row["department"]."<br>";
					echo "EMPLOYEE SALARY     : ".$row["salary"]."<br>";
				}
			}
			else echo "<br> ZERO RESULTS";
		}

	?>
</body>