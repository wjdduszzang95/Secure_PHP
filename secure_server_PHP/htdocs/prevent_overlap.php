<?php
    setcookie("id",'',time()-99999999, "/");
    setcookie("login_time",'',time()-99999999,"/");
    setcookie("important",'',time()-99999999,"/");
?>
<script>
    alert('이미 로그인 중입니다.');
    location.href = 'login.php';
</script>