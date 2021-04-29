<!DOCTYPE>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                 width: 50px;
                 padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 100px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
<?php
        session_start();
        $userid = $_SESSION['userid'];

        $id = $_GET['id'];
        $connect = mysqli_connect("localhost","root","","test") or die("fail");
        $query = "select * from board where id =$id";
        $result = $connect->query($query);
        if (!$result){
                echo("쿼리오류 발생: ".mysqli_error($connect));
                echo("<br>");
                echo("<br>");
            }
        $rows = mysqli_fetch_assoc($result);
            

 ?>
</style>
<body>
<?php
if ($rows['name'] != $userid) {
                echo("
                <script>
                    alert('잘못된 접근입니다.');
                    history.back();
                </script>
                ");
        }else {
?>
        <form method = "post" action = "modify_action.php?id=<?=$id?>">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2"> 
                        <tr>
                        <td>글 번호</td>
                        <td><?=$rows['id']?></td>
                        </tr>
                        <tr>
                        <td>제목</td>
                        <td><input type = text name = title size=60 value="<?=$rows['title']?>"></td>
                        </tr>
                        <tr>
                        <td>내용</td>
                        <td><textarea name = content cols=85 rows=15><?=$rows['content']?></textarea></td>
                        </tr>
                        </table>
                        <center>
                        <input type = "submit" value="작성">
                        </center>
                </td>
                </tr>
        </table>
        </form>
</body>
</html>
<?php
}
?>