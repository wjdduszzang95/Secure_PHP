<?php
    function XSS_Filter($data){
        $data = str_replace("<","",$data);
        $data = str_replace(">","",$data);

        return $data;
    }
?>