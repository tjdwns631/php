<?php
include './db.php';
include './header.php';
$userid = $_GET['userid'];
$sql = "SELECT * FROM member WHERE userid = '$userid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<div style="margin: 50px;">
	<div class="input-group flex-nowrap">
		<span class="input-group-text" id="addon-wrapping">아이디</span> <input
			type="text" class="form-control" aria-label="Username"
			aria-describedby="addon-wrapping"
			value="<?php echo $row['userid'] ?>" readonly>
	</div>
	<div class="input-group flex-nowrap">
		<span class="input-group-text" id="addon-wrapping">이름</span> <input
			type="text" class="form-control" aria-label="Username"
			aria-describedby="addon-wrapping" value="<?php echo $row['name'] ?>"
			readonly>
	</div>
	<div class="input-group flex-nowrap">
		<span class="input-group-text" id="addon-wrapping">휴대폰 번호</span> <input
			type="text" class="form-control" aria-label="Username"
			aria-describedby="addon-wrapping" value="<?php echo $row['phone'] ?>"
			readonly>
	</div>
	<div class="input-group flex-nowrap">
		<span class="input-group-text" id="addon-wrapping">성별</span> <input
			type="text" class="form-control" aria-label="Username"
			aria-describedby="addon-wrapping"
			value="<?php echo $row['gender'] ?>" readonly>
	</div>
	<div style="text-align: center; margin: 20px;">
		<button class="btn btn-info"
			onclick="location.href='action/userdeport.php?userid=<?php echo $row["userid"] ?>'">회원
			추방</button>
	</div>
</div>
<?php include 'footer.php';?>