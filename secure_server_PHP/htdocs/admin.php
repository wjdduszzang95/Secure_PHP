<?php
    session_start();
    $_SESSION['TRUE'] = 0;
    if(!isset($_SESSION['userid'])){ //로그인 시 설정하는 세션 세팅이 되지 않았을 경우
         echo "<script>
         alert('로그인이 필요합니다');
         document.location.href='login.php';
         </script>";
    }else if($_SESSION['level']==3){
        $id = $_SESSION['userid'];
        $cookie_data = $_COOKIE['important']; 
        echo ('<pre>환영합니다 ' . $id . '</pre>');
        echo ('<pre><strong> 로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>');
        // echo ('<pre><strong> CSRF Token :' . $_SESSION["CSRF_Token"] . '</strong></pre>');
        echo ('<pre><strong> 로그인 후 세션 ID :' . session_id() . '</strong></pre>');
        echo ('<pre><strong> 쿠키 내 중요한 데이터 :' . $cookie_data . '</strong></pre>');
        echo "<a href=borad.php>게시판</a> <br>";  
        ?>      
<!-- echo "<a href=change_password.php>비밀번호변경</a> <br>";   -->
        <button id="password_change">비밀번호 변경</button><br> 
        <script>
        window.onload = function(){
            var target = document.getElementById("password_change");
            target.addEventListener('click',function(){
                var option = "width = 500, height = 200, top = 100, left = 200, location = no";
                window.open('auth_id_pw.php',"검증창",option);
            });
        };
    </script>
<?php 
        echo "<a href=change_level.php>사용자권한변경</a> <br>";
        echo "<a href=logout.php>로그아웃</a> <br>";
    }else{
        echo "<script>
        alert('관리자가 아닙니다');
        document.location.href='login.php';
        </script>";
    }
?>