<?php
  session_start();
  ini_set('display_errors','0');
  $auth = $_SESSION['TRUE'];
  if ($auth == '1') {
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>비밀번호 변경</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  <body>
      <script>

      </script>
      <?php      
        echo ('<pre><strong>로그인 ID :' . $_SESSION['userid'] . '</strong></pre>');
        echo ('<pre><strong>로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>');
        echo ('<pre><strong> 로그인 후 세션 ID :' . session_id() . '</strong></pre>');
        echo ('<pre><strong> TRUE 값 :' . $_SESSION['TRUE'] . '</strong></pre>');
      ?>
    <h1>비밀번호 변경</h1>
    <form action="change_password_ok.php" method="GET">
      <p><input type="password" name="current_password" placeholder="현재 비밀번호" required></p>
      <p><input type="password" name="new_password" placeholder="새 비밀번호" required></p>
      <p><input type="submit" value="비밀번호 변경"></p>
    </form>
  </body>
</html>
<?php
  }
else{
?>   <script>
       alert("잘못된 접근입니다.");
       history.back();
     </script>
<?php
}
?>