<?php
    session_start();
    include 'duplicate.php'; // 세션 재사용 방지
    if(!isset($_SESSION['userid'])){    
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>로그인</title>
</head>
<body>
    <h1>로그인</h1>
    <form method='get' action='login_ok.php'>
    <table>
    <tr>
        <td>아이디</td>
        <td><input type='text' name='userid' tabindex='1'/></td>
        <td rowspan='2'><input type='submit' tabindex='3' value='로그인' style='height:50px'/></td>
    </tr>
    <tr>
        <td>비밀번호</td>
        <td><input type='password' name='userpw' tabindex='2'/></td>
    </tr>
    <tr>
         <td> 
         <a href="signup.php">회원가입</a>
    </tr>
    </table>
    <?php
        echo ('<pre><strong> 로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>'); 
        echo ('<pre><strong> 로그인 전 세션 ID :' . session_id() . '</strong></pre>');
    ?>
    </form>
</body>
<?php
    }else{
        echo("
        <script>
            location.href = 'main.php';
        </script>
        ");
    }
?>
