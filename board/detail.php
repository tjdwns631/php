<?php
include ('db.php');
$detail_no = $_GET["board_no"];

$sql="UPDATE board SET hit = hit+1 WHERE board_no ='$detail_no'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

$sql = "SELECT * FROM board WHERE board_no ='$detail_no'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
	crossorigin="anonymous">
</head>

<body>
	<div style="margin: 100px;">
        <?php
        if ($row = mysqli_fetch_array($result)) {
            ?>
        <p style="border: solid 1px black; margin: 3px; width: 500px;">
			<a><?php echo $row["title"]; ?></a> <a style="float: right;"><?php echo $row["board_date"]; ?> </a>
		</p>
		<p style="border: solid 1px black; margin: 3px; width: 500px;">
			<a><?php echo $row["author"]; ?> </a> <a
				style="float: right; margin-right: 10px;">추천수 <b><?php echo $row["cnt"]; ?></b></a><a
				style="float: right; margin-right: 10px;">조회수<b><?php echo $row["hit"] ?></b></a>
		</p>
		<div class="mb-3">
			<textarea class="form-control" rows="10" cols="60" resize="none"
				readonly><?php echo $row["board_conn"]; ?></textarea>
		</div>
       
    </div>
	<div style="text-align: center;">
		<button class="btn btn-info" onclick="location.href='update.php?board_no=<?php echo $row["board_no"]; ?>'">수정</button>
	</div>
	 <?php } ?>
</body>
</html>