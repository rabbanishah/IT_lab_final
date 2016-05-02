<?php
    $myfile = fopen("abc.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    $count=0;
    while(!feof($myfile)) {
        $count=$count+1;
    //  echo fgets($myfile) . "<br>";// use this to print the file contents as well
        fgets($myfile);
    }
echo "TOTAL LINES = ". $count;
    fclose($myfile);
?>