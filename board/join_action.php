<?php
include 'db.php';

$name = $_POST['name']; 
$id = $_POST['id'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$member_author = $_POST['member_author'];
$URL = './mainpage.php'; 

$sql = "INSERT INTO member VALUES('$name','$id','$pass','$phone','$gender','$member_author') ";
$result =mysqli_query($conn, $sql) or die(mysqli_error($conn));


if($_POST['pass'] != $_POST['passcheck']){
    echo '<script> alert("패스워드가 일치하지 않습니다."); history.back(); </script>';
} else {
    
}

if($result){
    ?>
        <script>alert('회원가입성공');
        location.replace("<?php echo $URL; ?>");
        </script>";
<?php
        
    }else{
        echo '가입 실패';
        error_log(mysqli_error($conn));//에러 로그
    }
    mysqli_close($conn);



?>