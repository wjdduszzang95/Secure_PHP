<?php
    session_start();
    $_SESSION['TRUE'] = 0;
    include 'duplicate.php'; // 세션 재사용 방지
    if(!isset($_SESSION['userid'])){ //로그인 시 설정하는 세션 세팅이 되지 않았을 경우
         echo "<script>
         alert('로그인이 필요합니다');
         document.location.href='login.php';
         </script>";
    }elseif(time() - $_COOKIE['login_time'] >= 600){ // 불충분한 세션 만료 방지
        echo "<script>
        alert('세션이 만료되었습니다.');
        document.location.href='logout.php';
        </script>";
     }else{ // 로그인 후 10분이 지나지 않았을 경우
        $id = $_SESSION['userid'];
        $cookie_data = $_COOKIE['important'];
        $login_time = date("Y-m-d h:i:s", $_COOKIE['login_time']);
        $timestamp = strtotime("$login_time +10 minutes");
        echo ('<pre>환영합니다 ' . $id . '</pre>');
        echo ('<pre><strong> 로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>');
        echo ('<pre><strong> 로그인 후 세션 ID :' . session_id() . '</strong></pre>');
        echo ('<pre><strong> 로그인 시간 :' . $login_time . '</strong></pre>');
        echo ('<pre><strong> 세션 만료 시간 :' . date("Y-m-d h:i:s", $timestamp) . '</strong></pre>');
        echo ('<pre><strong> 현재 시간 :' . date("Y-m-d h:i:s", time()) . '</strong></pre>');
        echo ('<pre><strong> 쿠키 내 중요한 데이터 :' . $cookie_data . '</strong></pre>');
        echo "<a href=borad.php>게시판</a> <br>"; 
        echo "<a href=upload.php>파일업로드</a> <br>";
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
        echo "<a href=logout.php>로그아웃</a> <br>";
    }
?>