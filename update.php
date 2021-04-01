<?php
include ('./db.php');
include './header.php';
include './function.php';
$board_no = $_GET["board_no"];
$sql = "SELECT * FROM board WHERE board_no = '$board_no'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>


<div style="margin: 100px;">
	<form name="update_action.php" id="update_action.php"
		action="action/update_action.php" onsubmit="updatecheck()" method="post">
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
			<?php if($row['file'] != NULL) { ?>
				<input type="hidden" name="file" id="file"
				value="<?php echo $row["file"];?>"> 파일 : <a
				href="upload/<?php echo $row['file'];?>" download><?php echo $row['file']; ?></a>
			<button class="btn btn-info" type="button"
				onclick="location.href='action/delete_file.php?board_no=<?php echo $row["board_no"]; ?>'">파일
				삭제</button>
					<?php }?>
			</div>
		<div style="margin: 0 auto; text-align: center;">
			<button class="btn btn-info" type="submit" value="수정">수정</button>
			<button class="btn btn-info" type="button"
				onclick="location.href='action/delete.php?board_no=<?php echo $row["board_no"]; ?>'">삭제</button>
			<button class="btn btn-info" type="button"
				onclick="location.href='./mainpage.php'">메인페이지로</button>
		</div>

	</form>

	<?php } ?>
	</div>
</form>
<?php include './footer.php';?>