<?php
include '../db.php';
$userid = $_POST['userid'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM member WHERE userid = '$userid' AND pass='$pass'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));;
$row = mysqli_fetch_array($result);


if ($userid == $row["userid"] && $pass == $row["pass"]) {
    $_SESSION["userid"] = $row["userid"];
    $_SESSION["name"] = $row["name"];
    $_SESSION["member_author"] = $row["member_author"];
    echo "<script>alert('로그인되었습니다.'); location.href='../mainpage.php';</script>";
} else {
    echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
}

?>