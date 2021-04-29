<?php
session_start();
if($_SESSION['auth']!='admin'){
    echo "<script>
    alert('관리자가 아닙니다');
    document.location.href='login.php';
    </script>";
}
$CSRF_Token = $_GET['token'];
$id = $_GET['id'];
$level = $_GET['level'];

if ( $CSRF_Token != $_SESSION['CSRF_Token'] or !isset($CSRF_Token)) 
{    echo "<script>
    alert('토큰값 불일치');
    document.location.href='admin.php';
    </script>";
}
else{
        $connect = mysqli_connect("localhost","root","","test") or die("fail");
        $query = "select * from member where id='$id'";
        $result = $connect->query($query);

        if(mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_assoc($result);

            if($row['id']==$id){
                $query2 = "update member set level = '$level' where id = '$id'";
                $result2 = $connect->query($query2);
                unset($_SESSION['CSRF_Token']);
                if($result2){
                ?>    
                    <script>
                    alert('권한 변경 성공!')
                    location.href='admin.php';
                    </script>
                <?php
                }
                else{
                ?>  
                    <script>
                    alert('권한 변경 실패!')
                    location.href='change_level.php';
                    </script>
                <?php
                }
            }
        }                                              
}
?>