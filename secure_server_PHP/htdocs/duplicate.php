<?php
    $connect = mysqli_connect("localhost","root","","test") or die("fail");
    
    $session_id = session_id();
    $query  = "select * from login where session_id='$session_id'"; // 동일한 세션 ID 존재 검사
    $result = $connect->query($query);

    if(mysqli_num_rows($result)==1) { // 동일한 세션 ID 존재 시
        $rows=mysqli_fetch_assoc($result);
        $login_ip = $_SERVER['REMOTE_ADDR'];
            if ($rows['ip']==$login_ip){ // 동일한 IP 존재 시
             }
            else{ // 접속 IP가 저장된 IP와 다를 경우
                ?>  
                <script>
                    location.href = 'prevent_overlap.php';
                </script>
                <?php                  
                }
        }
        else {}
?>