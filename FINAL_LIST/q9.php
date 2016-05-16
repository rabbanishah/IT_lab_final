<!--
Use MYSQL to create a database EXAM and table RESULT, (assume the fields) and write a PHP program to execute the following queries
i) Display the name of the student who scored S grade in ‘JAVA’ subject
ii) Count the number of ‘F” grade for ‘JAVA subject

-->

<!doctype HTML>
<head>
	<title>
		NINE	
	</title>
</head>
<body>
	<form action ="q9.php" method="POST">
		NAME : <input type="text" name="name" required>
		<br>SUBJECT : <input type="text" name="subject">
		<br>GRADE : <input type="text" name="grade">
		<br><input type="submit" name="submit" value="INSERT">
		<hr>
		<hr>
		<input type="submit" name="search_s" value="SEARCH FOR S GRADES">
		<input type="submit" name="count_f" value="COUNT F GRADES">
		<hr>
	</form>

	<?php
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="exam";
		$conn=new mysqli($servername,$username,$password,$dbname);
		if($conn->connect_error)
		{
			die("FAILED ".$conn->connect_error);
		}
		echo "<script type=text/javascript>alert('successfully connected')</script>";

		if(isset($_POST["submit"]))
		{
			$stmt=$conn->prepare("INSERT INTO result VALUES (?,?,?)");
			$stmt->bind_param("sss",$name,$subject,$grade);
			$name=$_POST["name"];
			$subject=$_POST["subject"];
			$grade=$_POST["grade"];
			$stmt->execute();
		}
		elseif(isset($_POST["search_s"]))
		{
			$select="SELECT * FROM result WHERE subject='java' AND grade='S'";
			$res=$conn->query($select);
			if($res->num_rows > 0)
			{
				while($row=$res->fetch_assoc())
				{
					echo "<br><br>NAME : ".$row["name"]."<br>SUBJECT : ".$row["subject"]."<br>GRADE : ".$row["grade"];
				}
			}
			else echo "NO RESULTS FOUND ";
		}
		elseif(isset($_POST["count_f"]))
		{
			$select2="SELECT * FROM result WHERE subject='java' AND grade='F'";
			$res2=$conn->query($select2);
			$count=$res2->num_rows;

			echo "<br>TOTAL FAILS ARE : ".$count."<br>";
		}
	?>
</body>