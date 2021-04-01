<?php
include "../db.php"; // '/' : 최상단 디렉토리, './' : 현재파일이랑 동일한 경로, '../../' : 이전 디렉토리

$userid = $_POST["userid"];

if ($userid != NULL) {
    $sql = "SELECT * FROM member WHERE userid='$userid'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    if ($result->num_rows >=1) {
        echo '<span style="color:red;">'.'존재하는 아이디 입니다'.'</span>';
    } else {
        echo '<span style="color:green;">'.'사용가능한 아이디 입니다'.'</span>';
    }
}
?>