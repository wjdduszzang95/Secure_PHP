<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>사용자권한 변경</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>
  <body>
      <?php
        session_start();
        if($_SESSION['auth']!='admin'){
            echo "<script>
            alert('관리자가 아닙니다');
            history.back();
            </script>";
        }
        $CSRF_Token = rand(1,100);
        $_SESSION['CSRF_Token']= $CSRF_Token; # CSRF Token 등록
        echo ('<pre><strong>로그인 ID :' . $_SESSION['userid'] . '</strong></pre>');
        echo ('<pre><strong>로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>');
        echo ('<pre><strong> 로그인 후 세션 ID :' . session_id() . '</strong></pre>');
        echo ('<pre><strong id="token"> CSRF_Token :' . $_SESSION['CSRF_Token'] . '</strong></pre>');
      ?>
    <h1>사용자권한 변경</h1>
    <form action="change_level_ok.php" method="GET">
      <label><input type="radio" name="id" value="test"></label>test
      <label><input type="radio" name="id" value="user"></label>user<br>
      <label><input type="radio" name="level" value="1"></label>1
      <label><input type="radio" name="level" value="2"></label>2
      <label><input type="radio" name="level" value="3"></label>3
<p><input type="hidden" name="token" value="<?php echo $_SESSION['CSRF_Token'] ?>"></p>     
 <p><input type="submit" value="사용자권한 변경"></p>
    </form>
  </body>
</html>
