<?php
include ('db.php');
$board_no = $_GET["board_no"];
$sql = "SELECT * FROM board WHERE board_no = '$board_no'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>

<body>

	<div style="margin: 100px;">

		<form name="update_action.php" id="update_action.php" action="update_action.php"
			method="post">
        <?php
        if ($row = mysqli_fetch_array($result)) {
            ?>
			<div class="mb-3">
				<label for="title" class="form-label">제목</label> <input type="text"
					class="form-control" id="title" name="title"
					value="<?php echo $row["title"]; ?>">
			</div>
			<div class="mb-3">
				<label for="board_conn" class="form-label">내용</label>
				<textarea class="form-control" id="board_conn" name="board_conn"
					rows="3"><?php echo $row["board_conn"]; ?></textarea>
			</div>
			<input type="hidden" id="board_no" name="board_no"
				value="<?php echo $row["board_no"]; ?>">
			<div>
				<button class="btn btn-info" type="submit" value="수정">수정</button>
			</div>
		</form>
		<div>
			<button class="btn btn-info" onclick="location.href='delete.php?board_no=<?php echo $row["board_no"]; ?>'">삭제</button>
		</div>
	<?php } ?>
	</div>
	</form>

</body>
</html>