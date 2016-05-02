<html>
    <head>
   <title>hello</title>
    </head>
    <body>
        <form action ="1b.php" method="post">
        USN<input type="text" name="usn"><br>
         Name<input type="text" name="name"><br>
         Age<input type="number" name="age"><br>
        <input type="submit" name="submit" value="submit">
            
        </form>
        
        <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="sixthsem";
    $conn= new mysqli($servername , $username , $password , $dbname);
    if($conn->connect_error)
    {   die("connection failed :" . $conn->connect_error);
    }
    echo "connected successfully<br>";
    
    if(isset($_POST["submit"]))
    {
        $stmt= $conn->prepare("INSERT INTO student VALUES (?,?,?)");
        $stmt->bind_param("ssi",$usn,$name,$age);
        $usn= $_POST["usn"];
        $name=$_POST["name"];
        $age=$_POST["age"];
        $stmt->execute();
    }

    $select="SELECT * from student";
    $res= $conn->query($select);
    if($res->num_rows > 0 )
    {
        while($row = $res->fetch_assoc())
        {
            echo "USN " .$row["usn"] . "Name " .$row["name"]."<br>";
        }
    }else
        echo "0 results ";

    ?>
    </body>
</html>
 