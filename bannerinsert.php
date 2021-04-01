<?php
include '../db.php';
include '../header.php';


    $tmpfile = $_FILES['name']['tmp_name'];
    $o_name = $_FILES['name']['name'];
    $filename = iconv("UTF-8", "EUC-KR", $_FILES['name']['name']);
    $folder = "../image/" . $filename;
    
    if($o_name != ''){
    move_uploaded_file($tmpfile, $folder);
    $sql = "INSERT INTO banner(name) VALUES('$o_name')";
    $result = mysqli_query($conn, $sql);
    }else{
        echo '파일등록';
    }
    
mysqli_close($conn);

?>