<?php
include '../db.php';
$userid = $_GET['userid'];
$sql = "DELETE FROM member WHERE userid = '$userid'";
$result = mysqli_query($conn, $sql);
$URL = '../mainpage.php';
if ($result) {
    session_destroy();
    ?>
<script>
alert('탈퇴 성공');
location.replace("<?php echo $URL ?>");
</script>
<?php

} else {
    echo '삭제 실패';
    error_log(mysqli_errno($conn));
}
mysqli_close($conn);
?>

