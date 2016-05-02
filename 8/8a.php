<html>
    <body>
        <h1>Login In</h1><br><br>
        <?php
            if(isset($_COOKIE['user']))
            {
                echo "Welcome Back ". $_COOKIE['user'].PHP_EOL;
            }
            if(isset($_POST['submit']))
            {
                $cookie_name = 'user';
                $cookie_value = $_POST['user'];
                
                setcookie($cookie_name,$cookie_value,time()+(24*60*60),'/');
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <h3>Name</h4>
            <input name = "user" type="text">
            <h3>Password</h3>
            <input type="password"><br><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>