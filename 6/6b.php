<!doctype HTML>
<head>
</head>
<body>
    <form action="6b.php" method="post">
    <input type="submit" name="zero" value="Zero registrations">
    <input type="submit" name="all" value="show all">
        
    </form>
<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="vi_sem_elective";
    
    $conn=new mysqli($servername ,$username ,$password ,$dbname);
    if($conn->connect_error)
    {
        die( "Connection failed !!" . $conn->connect_error);
    }
    echo "Connected successfully";
    if(isset($_POST["zero"]))
    {
        $selectzero="SELECT * from table1 where regs=0";
        $res=$conn->query($selectzero);
        if($res->num_rows > 0 )
        {
            while($row=$res->fetch_assoc())
            {   
                echo "<br><br>";
                echo "Subject   ". $row["subject"] . "  Code   ".$row["code"] . "  Department   ".$row["dept"]."  Registered : ".$row["regs"] ."<br><br>";
                
            }
        }
        else
            echo "NO ROWS ";
    }
    if(isset($_POST["all"]))
    {
        $select="SELECT * from table1 where dept='cse'";
        $res=$conn->query($select);
        if($res->num_rows > 0 )
        {
            while($row=$res->fetch_assoc())
            {   echo "<br><br>";
                echo "Subject   ". $row["subject"] . "  Code   ".$row["code"] . "  Department   ".$row["dept"]."  Registered : ".$row["regs"]. "<br><br>";
                
            }
        }
        else
            echo "NO ROWS ";
    }
?>
</body>