<?php
include ('../db.php');
$userid =$_POST['userid'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$gender =$_POST['gender'];
$URL = '../mainpage.php';

$sql = "UPDATE member SET name= '$name', phone= '$phone',gender = '$gender' WHERE userid ='$userid'";
$result = mysqli_query($conn, $sql);

if($result){
    ?>
	<script type="text/javascript">
	alert("수정성공")
	 location.replace("<?php echo $URL; ?>");
    </script>
    <?php    
}else{
	echo '수정 실패';
	error_log(mysqli_errno($conn));
}
mysqli_close($conn);
    ?>
    