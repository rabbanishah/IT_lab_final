<!doctype HTML>

<head>
<title>library</title>
</head>
<body>
<form method="post" action="3b.php">
    NAME:<input type="text" name="name"><br><br>
    EDITION:<input type="text" name="edition"><br><br>
    AUTHOR:<input type="text" name="author"><br><br>
    YEAR:<input type="number" name="year"><br><br>
    <input type="submit" value="Submit" name="submit">
    
    </form>
    
<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="library";
    $conn= new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error)
    {
        die("Connection failed ". $conn->connect_error);
    }
    echo "Connection established !! ";
    if(isset($_POST["submit"]))
    {
        $stmt=$conn->prepare("INSERT INTO csebooks VALUES(?,?,?,?)");
        $stmt->bind_param("sssi",$name,$edition,$author,$year);
        
        $name=$_POST["name"];
        $edition=$_POST["edition"];
        $author=$_POST["author"];
        $year=$_POST["year"];
        $stmt->execute();
    }
    $select="SELECT * from csebooks";
    $res=$conn->query($select);
    if($res->num_rows > 0)
    {
        while($row= $res->fetch_assoc())
              {
                  echo "NAME   ". $row["name"] . "  EDITION   ".$row["edition"]. "  AUTHOR   ".$row["author"]. "  YEAR   ".$row["year"]."<br><br>";
              }
        
    }
              else
              echo "0 rows";
              
?>
</body>