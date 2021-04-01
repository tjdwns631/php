<?php
include './db.php';
include './header.php';

$userid = $_SESSION['userid'];

$sql = "SELECT * FROM member WHERE userid = '$userid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<div style="margin: 50px;">
	<form name="userupdate.php" action="action/userupdate.php" method="post">
		<div class="input-group flex-nowrap">
			<span class="input-group-text">아이디</span> <input type="text"
				class="form-control" aria-label="Username"
				aria-describedby="addon-wrapping" id="userid" name="userid"
				value="<?php echo $row['userid'] ?>" readonly>
		</div>
		<div class="input-group flex-nowrap">
			<span class="input-group-text">이름</span> <input type="text"
				class="form-control" aria-label="Username"
				aria-describedby="addon-wrapping" id="name" name="name"
				value="<?php echo $row['name'] ?>">
		</div>
		<div class="input-group flex-nowrap">
			<span class="input-group-text">휴대폰 번호</span> <input type="text"
				class="form-control" aria-label="Username"
				aria-describedby="addon-wrapping" id="phone" name="phone"
				value="<?php echo $row['phone'] ?>">
		</div>
		<div class="input-group flex-nowrap">
			<span class="input-group-text">성별</span> <input type="text"
				class="form-control" aria-label="Username"
				aria-describedby="addon-wrapping" id="gender" name="gender"
				value="<?php echo $row['gender'] ?>" readonly>
		</div>
		<div style="text-align: center; margin: 20px;">
			<button class="btn btn-info" type="submit">수정</button>
			<button type="button" class="btn btn-info"
				onclick="location.href='action/userdeport2.php?userid=<?php echo $row["userid"] ?>'">회원
				탈퇴</button>
		</div>
	</form>
</div>
<?php include 'footer.phps';?>