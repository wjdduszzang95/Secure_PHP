<?php
session_start();
                $userid = $_SESSION['userid'];
                $connect = mysqli_connect("localhost","root","","test") or die("fail");
                $title = $_POST["title"];                  //Title
                $content = $_POST["content"];              //Content
                require "XSS_Filter.php";      // XSS 방지
                $content = XSS_Filter($content);          // XSS 방지
           
                $URL = './borad.php';                   //return URL
 
 
                $query = "insert into board (title,content,name) 
                        values('$title','$content','$userid')";
 
                 $result = $connect->query($query);
                if($result){
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                else{
                        echo ("쿼리오류 발생: ".mysqli_error($connect));
                }
 
                mysqli_close($connect);
?>