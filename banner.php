<?php
include './db.php';
include './header.php';
include './function.php';
$sql = "SELECT * FROM banner";
$result = mysqli_query($conn, $sql);
?>
<form id="frm" name="frm" method="post">
	<div>
		<h1>이미지</h1>
	</div>
	<?php

$cnt = 0;
$cnt = mysqli_num_rows($result);
if ($cnt == 0) {
    ?>	
		<div>
		<h4>이미지가 없습니다.</h4>
	</div>
	<div class="im">
	<?php } else { ?>
		<?php while($row = mysqli_fetch_array($result)){ ?>
        <input type="checkbox" name="banner_no[]"
		value="<?php echo $row['banner_no'] ?>"> <img
		style="width: 170px; height: 120px; margin: 20px;"
		src="./image/<?php echo $row['name'] ?>" />
        		<?php } ?>
	<?php }?>
	</div>
	<div>
		<input  type="file" name="name" id="name" value="1">
	</div>
	<button class="btn btn-info" type="button" onclick="fn_submit()">업로드</button>
	
	<button class="btn btn-info imagedel" type="button" onclick="del()">삭제</button>
</form>

<?php include './footer.php'; ?>