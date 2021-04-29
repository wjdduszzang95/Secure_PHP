<?php

$connect = mysqli_connect("localhost","root","","test") or die("fail");

if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {

    $file = $_FILES['upfile'];
    $upload_directory = 'data/';
    $upload_directory = $upload_directory.$file['name'];
    
    $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx"; # 파일 업로드 취약점 방지
    $allowed_extension = explode(',',$ext_str); # 파일 업로드 취약점 방지
    $ext = substr($file['name'],strpos($file['name'],'.') + 1); # 파일 업로드 취약점 방지

    # 확장자 체크
    if(!in_array($ext, $allowed_extension)){
        echo "업로드할 수 없는 확장자 입니다.";
        echo '<a href="javascript:history.go(-1);">이전 페이지</a>';
    }
    else{
        if(move_uploaded_file($file['tmp_name'], $upload_directory)) {      
        
            $name_orig = $file['name'];
    
            $query = "insert into upload_file (name_orig ,reg_time) values ('$name_orig',now())";
            $result = $connect->query($query);
            if(!$result){
                echo ("<h3> 쿼리 이상함 </h3>");
            }
            echo"<h3>파일 업로드 성공</h3>";
            echo '<a href="file_list.php">업로드 파일 목록</a>';
            }
    }
}else{
    echo "<h3>파일이 업로드 되지 않았습니다.</h3>";
    echo '<a href="javascript:history.go(-1);">이전 페이지</a>';
}



mysqli_close($connect);
?>