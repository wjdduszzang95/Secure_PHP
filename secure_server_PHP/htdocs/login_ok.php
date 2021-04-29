<?php
    session_start();
    if(!isset($_SESSION['userid'])){
?>
<?php
	$connect = mysqli_connect("localhost","root","","test") or die("fail");

	$userid = $_GET['userid'];
	$userpw = $_GET['userpw'];

    $query = "select * from member where id=? and pw=?"; // SQL 인젝션 방지

    $stmt = $connect->stmt_init(); // SQL 인젝션 방지
    $stmt = $connect->prepare($query); // SQL 인젝션 방지

    $stmt->bind_param("ss",$userid,$userpw); // SQL 인젝션 방지
 
    $stmt->execute(); // SQL 인젝션 방지

    $result = $stmt->get_result();
?>
<?php
        if(mysqli_num_rows($result)) {
            $row=mysqli_fetch_assoc($result);
                // 쿠키 발급
               setcookie("id", $userid, time()+86300, "/");
               setcookie("login_time", time(), time()+86300, "/");
               
               define('KEY', '01234567890123456789012345678901'); // 쿠키 변조 방지
               define('KEY_128', substr(KEY,0, 128/8)); // 쿠키 변조 방지
                define('KEY_256', substr(KEY,0, 256/8)); // 쿠키 변조 방지

               $data = '쿠키 변조 전'; // 쿠키 변조 방지
               $hash_data = base64_encode(hash('sha256',$data,true)); // 쿠키 변조 방지
               setcookie("important",$hash_data,time()+86300, "/"); // 쿠키 변조 방지  

                // 세션 발급
               session_regenerate_id(); // 세션 고정 방지
               $_SESSION['userid']=$userid;       
               $_SESSION['auth'] = 'admin';
               $_SESSION['level']=$row['level'];  // 사용자 권한
               $session_id = session_id();
               $login_ip = $_SERVER['REMOTE_ADDR'];
               $query = "insert into login values('$login_ip', '$session_id')";
               $connect->query($query);
               if($_SESSION['level']==3){
                echo("
                <script>
                    alert('관리자 로그인');
                    location.href = 'admin.php';
                </script>
                ");
               }else{
                echo("
               <script>
                   alert('로그인 성공');
                   location.href = 'main.php';
               </script>
               ");}
            }else{
        echo("
        <script>
            alert('로그인 실패');
            location.href = 'login.php';
        </script>
        ");
?>
<?php
}}else{
    echo("
    <script>
        location.href = 'main.php';
    </script>
    ");    
}
?>