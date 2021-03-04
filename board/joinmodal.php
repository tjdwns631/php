
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>회원가입 폼</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
	crossorigin="anonymous">

</head>
<body>
	<form method="post" action="join_action.php">
		<h1>회원가입 폼</h1>
		<table>
			<tr>
				<td>아이디</td>
				<td><input type="text" size="35" name="id" placeholder="아이디" required="required"></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="password" size="35" name="pass" placeholder="비밀번호" required="required" ></td>
			</tr>
			<tr>
				<td>비밀번호 확인</td>
				<td><input type="password" size="35" name="passcheck" placeholder="비밀번호" required="required" ></td>
			</tr>
			<tr>
				<td>이름</td>
				<td><input type="text" size="35" name="name" placeholder="이름" required="required"></td>
			</tr>
				<tr>
				<td>휴대폰번호</td>
				<td><input type="text" size="35" name="phone" placeholder="휴대폰번호" required="required"></td>
			</tr>
			<tr>
				<td>성별</td>
				<td>남<input type="radio" name="gender" value="남"> 여<input
					type="radio" name="gender" value="여"></td>
			</tr>
			<input type="hidden" name="member_author" value="admin">
		</table>
		<input class="btn btn-info" type="submit" value="회원가입" />
		<a class="btn btn-info" href="mainpage.php">뒤로가기</a>
	</form>
</body>
</html>