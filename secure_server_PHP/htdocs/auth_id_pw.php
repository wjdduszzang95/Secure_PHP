<?php
    session_start();
    ini_set('display_errors','0');
    $userid = $_SESSION['userid'];
    $userpw = $_POST['userpw'];
    if (!$userpw) {
?>
<html>
    <head>
    </head>
    <body>
    <h4>비밀번호 변경 페이지로 이동하려면 비밀번호를 입력하세요.</h4>
    <form method='post' action='auth_id_pw.php'>
    <table>
    <tr>
        <td>비밀번호</td>
        <td><input type='password' name='userpw' tabindex='2'/></td>
        <td rowspan='2'><input type='submit' tabindex='3' value='확인' style='height:25px'/></td>
    </tr>
    </body>
</html>
<?php
    }else{
?>
<?php
    $connect = mysqli_connect("localhost","root","","test") or die("fail");
    $query = "select * from member where id='$userid' and pw='$userpw'" ; 
    $result = $connect->query($query);
    $row=mysqli_fetch_assoc($result);

    if(!mysqli_num_rows($result) | $_SESSION['userid']!=$row['id']){
?>      <script>
            alert("비밀번호가 틀렸습니다.");
            opener.document.location.reload();
            self.close();
        </script>
<?php
    }else{
        $_SESSION['TRUE']=1;
?>
        <script>
            opener.document.location.href="change_password.php";
            self.close();
        </script>
<?php
    }
}
?>