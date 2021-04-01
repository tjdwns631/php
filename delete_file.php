<?php
include '../db.php';
$board_no = $_GET['board_no'];
$zero = NULL;
$sql = "SELECT * FROM board WHERE board_no= '$board_no'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$file = 'upload/' . $row['file'];
$URL = "./update.php?board_no=".$board_no;   
unlink($file);

$sql = "UPDATE board SET file = '$zero'  WHERE board_no = '$board_no'";
$result = mysqli_query($conn, $sql);

if ($result) {
    ?>
<script type="text/javascript">
	alert("삭제 성공")
location.replace("<?php echo $URL; ?>");
	
    </script>
<?php
} else {
    ?>
<script>
alert("삭제 실패");
	</script>
<?php
    error_log(mysqli_errno($conn));
}
mysqli_close($conn);
?>
