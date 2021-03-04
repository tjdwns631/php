<?php
include 'db.php';

$title = $_POST["title"];
$board_conn=$_POST["board_conn"];
$board_no=$_POST["board_no"];
$URL = './mainpage.php';   

$sql = "UPDATE board SET title='$title',board_conn='$board_conn' WHERE board_no ='$board_no'";
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
