<?php
$file_name = $_REQUEST['file_name'];

$ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx"; # 파일 다운로드 취약점 방지
$allowed_extension = explode(',',$ext_str); # 파일 다운로드 취약점 방지
$ext = explode(".", $file_name); # 파일 다운로드 취약점 방지
if(!in_array($ext[1], $allowed_extension)){ # 파일 다운로드 취약점 방지
    echo("
    <script>
        alert('다운로드 할 수 없는 확장자입니다');
        window.close();
    </script>
    ");
}
else {
    $file_name = str_replace("/","",$file_name);
    $file_name = str_replace("..","",$file_name);
    $test = "\\";
    $test2 = substr($test,0,1);
    $file_name = str_replace($test2,"",$file_name);

    $length = filesize($file_name);

    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$file_name\"");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: $length");
    
    $fh = fopen($file_name, "r");
    fpassthru($fh);
}
?>