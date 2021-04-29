<?php
    // session_start();
    // if(!isset($_SESSION['userid'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>회원가입</title>
</head>
<body>
	<h1>회원가입</h1>
	<form method='get' action='signup_ok.php'>
        <p>ID: <input type="text" name="userid"></p>
    	<p>PW: <input type="password" name="userpw"></p>
    	<p>Name: <input type="name" name="name"></p>
        <input type="submit" value="가입">
    </form>
</body>
</html>
<?php
    // }else{
    //     echo "이미 로그인 되었습니다<br>";
    //     echo "<a href=logout.php>로그아웃</a>";
    // }
?>

