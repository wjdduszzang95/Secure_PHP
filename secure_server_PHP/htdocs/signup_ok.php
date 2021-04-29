<?php
    // session_start();
    // if(!isset($_SESSION['userid'])){
?>
<?php
	$connect = mysqli_connect("localhost","root","","test") or die("fail");

	$userid = $_GET['userid'];
	$userpw = $_GET['userpw'];
	$username = $_GET['name'];

	$query = "insert into member (id,pw,name) values('$userid','$userpw','$username')";

	$result = $connect->query($query);

	if($result) {
	?>		<script>
			alert('가입 성공');
			location.replace("./login.php");
			</script>
<?php   }
		 else{
?>              <script>						 
						 alert("가입 실패");
						 location.replace("./login.php");
				 </script>
<?php   } 
		 mysqli_close($connect);
?>
<?php
    // }else{
    //     echo "이미 로그인 되었습니다<br>";
    //     echo "<a href=logout.php>로그아웃</a>";
    // }
?>
