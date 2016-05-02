<!--(b)	Create a  database called ‘Movies’. Create a table called ‘HindiFilms’ with fields ‘Name’, ‘Budget’, ‘Hero’ and ‘Heroine’. Write a PHP program to accept these fields   information from a  web page and to store those in the table.-->
<html>
    <head>
   <title>hello</title>
    </head>
    <body>
        <form action ="2b.php" method="post">
        Name<input type="text" name="name"><br>
         Hero<input type="text" name="hero"><br>
        Heroine<input type="text" name="heroine"><br>
         Budget<input type="number" name="budget"><br>
        <input type="submit" name="submit" value="submit">
            
        </form>
        
        <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="movies";
    $conn= new mysqli($servername , $username , $password , $dbname);
    if($conn->connect_error)
    {   die("connection failed :" . $conn->connect_error);
    }
    echo "connected successfully<br>";
    
    if(isset($_POST["submit"]))
    {
        $stmt= $conn->prepare("INSERT INTO hindifilms VALUES (?,?,?,?)");
        $stmt->bind_param("siss",$name,$budget,$hero,$heroine);
        $name= $_POST["name"];
        $budget=$_POST["budget"];
        $hero=$_POST["hero"];
        $heroine=$_POST["heroine"];
        $stmt->execute();
    }

    $select="SELECT * from hindifilms";
    $res= $conn->query($select);
    if($res->num_rows > 0 )
    {
        while($row = $res->fetch_assoc())
        {
            echo "Name  " .$row["name"] . "   Budget " .$row["budget"]. "   Hero " .$row["hero"]. "   Heroine " .$row["heroine"]."<br>";
        }
    }else
        echo "0 results ";

    ?>
    </body>
</html>
 