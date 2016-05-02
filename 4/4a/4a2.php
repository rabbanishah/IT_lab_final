<?php
    session_start();
?>
<html>
<head>
</head>
    <body>
        <?php
            echo "hello ,",$_SESSION["username"];
        ?>
        
    </body>
</html>