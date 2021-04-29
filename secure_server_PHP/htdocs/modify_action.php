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
                
                if ($rows['name'] != $userid) {
                        echo("
                        <script>
                        alert('잘못된 접근입니다.');
                        history.back();
                        </script>
                        ");
                }else{
                        $title = $_POST["title"];                  //Title
                        $content = $_POST["content"];              //Content
        
                        $URL = 'borad.php';                   //return URL
        
                        $query = "update board set title='$title', content='$content' where id=$id";
        
                        $result = $connect->query($query);
                        if($result){
?>                      <script>
                                alert("<?php echo "글이 수정되었습니다."?>");
                                location.replace("<?php echo $URL?>");
                            </script>                        
<?php
                                }
                }
?>               