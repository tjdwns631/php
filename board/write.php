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

		<form name="write_action.php" id="write_action.php"
			action="write_action.php" method="post">
			<div class="mb-3">
				<label for="author" class="form-label">작성자</label> <input
					type="text" class="form-control" id="author" name="author">
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
				<button class="btn btn-info" type="submit" value="수정">작성</button>
				<button class="btn btn-info">취소</button>
			</div>
		</form>

	</div>

</body>

</html>