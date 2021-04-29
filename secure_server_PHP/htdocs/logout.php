<?php
    $connect = mysqli_connect("localhost","root","","test") or die("fail");

    setcookie("id",'',time()-99999999, "/");
    setcookie("login_time",'',time()-99999999,"/");
    setcookie("token",'',time()-99999999,"/");
    setcookie("important",'',time()-99999999,"/");

    session_start();
    
    $userid = $_SESSION['userid'];
    $login_ip = $_SERVER['REMOTE_ADDR'];
    $query = "delete from login where ip='$login_ip'";
    $connect->query($query);

    // $result = session_destroy();
    setcookie(session_name(), '',time()-99999999, '');
    // if($result) {
 ?>       
        <script>
            alert('로그아웃 성공');
            location.href = 'login.php';
        </script>
