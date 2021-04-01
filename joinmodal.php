<?php
include './header.php';
include './db.php';
include './function.php';
?>
<script>
$(document).ready(function(e) { 
	$(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
		var self = $(this); 
		var userid; 
		
		if(self.attr("id") === "userid"){ 
			userid = self.val();
		} 
		
		$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
			"./action/idcheck.php",
			{ userid : userid }, 
			function(data){ 
				if(data){ //만약 data값이 전송되면
					$("#col").html(data); 
					/* self.parent().parent().find("span").css("color", "#198754"); */
				}
			});
		
	});
	
});

</script>
	<form method="post" id="join_action" name="join_action"
		action="./action/join_action.php" onsubmit="return joincheck()">
		<h1>회원가입</h1>
		<table>
			<tr>
				<td>아이디</td>
				<td><input class="check" type="text" size="35" name="userid"
					id="userid" placeholder="아이디"><span id="col"></span></td>
			</tr>
			<tr>
				<td>비밀번호</td>
				<td><input type="password" size="35" name="pass" id="pass"
					placeholder="비밀번호" onkeyup='pwcheck();'></td>
			</tr>
			<tr>
				<td>비밀번호 확인</td>
				<td><input type="password" size="35" name="passcheck" id="passcheck"
					placeholder="비밀번호 확인" onkeyup='pwcheck();'><span id='message'></span></td>
			</tr>
			<tr>
				<td>이름</td>
				<td><input type="text" size="35" name="name" placeholder="이름"><span></span></td>
			</tr>
			<tr>
				<td>휴대폰번호</td>
				<td><input type="text" size="35" name="phone" placeholder="휴대폰번호"></td>
			</tr>
			<tr>
				<td><select name="gender" id="gender" aria-laber="성별">
						<option value selected>성별</option>
						<option value="남자">남자</option>
						<option value="여자">여자</option>
				</select></td>
			</tr>
			<input type="hidden" name="member_author" value="user">
		</table>
		<input class="btn btn-info signupbtn" type="submit" value="회원가입" /> <a
			class="btn btn-info" href="mainpage.php">뒤로가기</a>
	</form>
	
<?php include './footer.php';  ?>