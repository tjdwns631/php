<?php
include './db.php';
include './header.php';
include './function.php';
?>


<div style="margin: 100px;">

	<form name="write_actsion.php" id="write_action.php"
		action="action/write_action.php" method="post"
		onsubmit="return write_check()" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="author" class="form-label">작성자</label> <input type="text"
				class="form-control" id="author" name="author">
		</div>
		<div class="mb-3">
			<label for="title" class="form-label">제목</label> <input type="text"
				class="form-control" id="title" name="title" placeholder="글 제목">
		</div>
		<div class="mb-3">
			<label for="board_conn" class="form-label">내용</label>
			<textarea class="form-control" id="board_conn" name="board_conn"
				rows="3" placeholder="내용을 입력 하세요"></textarea>
		</div>
		<div>
			<input type="file" name="file" id="file" value="1">
		</div>
		<div>
			<button class="btn btn-info insert" type="submit" value="수정">작성</button>
			<button type="button"  class="btn btn-info" onclick="location.href='./mainpage.php'">취소</button>
		</div>
	</form>
</div>

<?php include 'footer.php';?>