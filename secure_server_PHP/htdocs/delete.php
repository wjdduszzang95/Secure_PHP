<?php  
    $connect = mysqli_connect("localhost","root","","test") or die("fail");
    $number = $_GET['number'];

    $query = "delete from board where number='$number'";

    $URL = './borad.php';                   //return URL

    $result = $connect->query($query);
    if($result){
?>      <script>
            alert("<?php echo "글이 삭제되었습니다."?>");
            location.replace("<?php echo $URL?>");
        </script>
<?php
        }
?>