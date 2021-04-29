<!DOCTYPE html>
 
<html>
<head>
        <meta charset = 'utf-8'>
</head>
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>
<body>
<?php
                $connect = mysqli_connect("localhost","root","","test") or die("fail");
                $query ="select * from board";
                $result = $connect->query($query);
                $total = mysqli_num_rows($result);
                session_start();
                echo ('<pre><strong> 로그인 ID :' . $_SESSION['userid'] . '</strong></pre>'); 
                echo ('<pre><strong> 로그인 IP :' . $_SERVER["REMOTE_ADDR"] . '</strong></pre>'); 
                echo ('<pre><strong> 로그인 후 세션 ID :' . session_id() . '</strong></pre>');
                echo "<a href=logout.php>로그아웃</a> <br>"
        ?>
        <h2 align=center>게시판</h2>
        <table align = center>
        <thead align = "center">
        <tr>
        <td width = "50" align="center">번호</td>
        <td width = "10" align="center"><a href = "sort.php?sort=<?php echo 'id' ?>">번호정렬</a></td>
        <td width = "500" align = "center">제목</td>
        <td width = "40" align="center"><a href = "sort.php?sort=<?php echo 'title' ?>">제목정렬</a></td>
        <td width = "100" align="center">작성자</td>  
        </tr>
        </thead>
        <tbody>
        <?php
                while($rows = mysqli_fetch_assoc($result)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <!-- <td width = "50" align = "center"><?php echo $total?></td> -->
                <td width = "50" align = "center"><?php echo $rows['id']?></td>
                <td width = "50" align = "center"></td>
                <td width = "500" align = "center">
                <a href = "view.php?id=<?php echo $rows['id']?>">
                <?php echo $rows['title']?></td>
                <td width = "50" align = "center"></td>
                <td width = "50" align = "center"><?php echo $rows['name']?></td>
                </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
        <div class = text>
        <font style="cursor: hand"onClick="location.href='./write.php'">글쓰기</font>
        </div>
        <div style="text-align: center; padding-top: 50px;">
                <form action="search_result.php" method="get">
                    <select name="category">
                        <option value="title">제목</option>
                        <option value="content">내용</option>
                    </select>
                    <input type="text" name="search" size="40" required="required">
                        <button>검색</button>
                </form>
        </div>
</body>
</html>