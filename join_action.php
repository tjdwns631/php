<?php
include '../db.php';

$name = $_POST['name'];
$userid = $_POST['userid'];
$pass =md5($_POST['pass']);
$passcheck = md5($_POST['passcheck']);
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$member_author = $_POST['member_author'];
$URL = '../mainpage.php';

$sql = "SELECT * FROM member WHERE userid='$userid'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows >= 1) {
    echo "<script>alert('존재하는 아이디 입니다.'); history.back();</script>";
} else if ($pass != $passcheck) {
    echo "<script>alert('비밀번호가 같지 않습니다'); history.back();</script>";
} else if ($name == null) {
    echo "<script>alert('이름을 입력하세요'); history.back();</script>";
} else if ($phone == null) {
    echo "<script>alert('번호을 입력하세요'); history.back();</script>";
} else {
    
    $sql = "INSERT INTO member VALUES('$name','$userid','$pass','$phone','$gender','$member_author') ";
    
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result) {
        ?>
<script>alert('회원가입성공');
        location.replace("<?php echo $URL; ?>");
        </script>
<?php
    } else {
        echo '가입 실패';
        error_log(mysqli_error($conn)); // 에러 로그
    }
    mysqli_close($conn);
}
?>