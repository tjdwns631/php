<?php
include ("../db.php");

$no = $_GET['board_no'];
$sql ="SELECT * FROM board WHERE board_no= '$no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$file ='upload/'.$row['file'];

$sql = "DELETE FROM board WHERE board_no = '$no'";
$result = mysqli_query($conn, $sql);
$URL = '../mainpage.php';
unlink($file);
if($result){
    
    ?>
	<script type="text/javascript">
	alert("삭제 성공")
	 location.replace("<?php echo $URL; ?>");
    </script>
    <?php    
}else{
	echo '삭제 실패';
	error_log(mysqli_errno($conn));
}
mysqli_close($conn);
?>
