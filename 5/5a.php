<!doctype HTML>
<head>
</head>
<body>
<form method="POST" action="5a.php">
NAME :<input type="text" name="name">    
USN :<input type="text" name="usn">    
<input type="submit" value="SUBMIT" name="submit">
    
</form>
    <?php 
    if(isset($_POST["submit"]))
    {
        $namereg="/[A-Za-z]+$/";
        $usnreg="/[1][Mm][Ss]\d{2}[A-Za-z]{2}\d{3}/";
        $name=$_POST["name"];
        $usn=$_POST["usn"];
        
        if(! preg_match($namereg,$name))
            echo "ENTER NAME CORRECTLY <br><br>";
        else
            echo "NAME IS CORRECT <br><br>";
        
        if(! preg_match($usnreg,$usn))
            echo "ENTER USN CORRECTLY <br><br>";
        else 
            echo "USN IS CORRECT <br><br>";
    }
    ?>
</body>
