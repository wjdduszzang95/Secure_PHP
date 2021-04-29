<?php
  session_start();
  $session_username = $_SESSION['userid'];
  if ( is_null( $session_username ) ) {
    header( 'Location: login.php' );
  }
  $current_password = $_GET[ 'current_password' ];
  $new_password = $_GET[ 'new_password' ];
  if ( !is_null( $current_password ) ) {
    $connect = mysqli_connect("localhost","root","","test") or die("fail");
    $query = "select * from member where id='$session_username'";
    $result = $connect->query($query);

    if(mysqli_num_rows($result)==1) {
        $row=mysqli_fetch_assoc($result);

        if($row['id']==$session_username and $row['pw']==$current_password){
            $query2 = "update member set pw = '$new_password' where id = '$session_username'";
            $result2 = $connect->query($query2);
            if($result2){
            ?>    
                <script>
                alert('비밀번호 변경 성공!')
                location.href='main.php';
                </script>
            <?php
            }
          }else{
            ?>  
                <script>
                alert('비밀번호 변경 실패!')
                location.href='change_password.php';
                </script>
            <?php
            }
    } 
  }
?>