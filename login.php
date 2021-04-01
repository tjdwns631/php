<?php include './header.php';
    include './function.php';
?>
	
	<div id="login_box">
		<h1>로그인</h1>
		<form method="post" action="action/login_action.php" name="login_action.php" onsubmit="return logincheck()">
			<table align="center" border="0" cellspacing="0" width="300">
				<tr>
					<td width="130" colspan="1">아이디 : <input type="text" id="userid" name="userid"
						class="userid">
					</td>
					<td rowspan="2" align="center" width="100">
						<button type="submit" id="btn">로그인</button>
					</td>
				</tr>
				<tr>
					<td width="130" colspan="1">비밀번호 : <input type="password" name="pass" id="pass"
						class="pass">
					</td>
				</tr>
				</tr>
			</table>
		</form>
	</div>
<?php include 'footer.php';?>