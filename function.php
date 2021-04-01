
<script type="text/javascript">
function setCookie(name, value, expiredays){
    var todayDate = new Date();
    todayDate.setDate(todayDate.getDate() + expiredays);
    document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

function closePopup(){
    if(document.getElementById("check").value){
        setCookie( "maindiv", "N" , 1);
        self.close();
    }
}
function getCookie(name) { 
	var cookie = document.cookie; 
	
	if (document.cookie != "") { 
		var cookie_array = cookie.split("; "); 
		for ( var index in cookie_array) { 
			var cookie_name = cookie_array[index].split("="); 
			if (cookie_name[0] == "maindiv") { 
				return cookie_name[1]; 
				} 
			} 
		} 
	return ; 
	}
	
	function popup(url){
		var cookieCheck = getCookie("maindiv");
		  if(cookieCheck != "N"){
		window.open(url, '', 'width=450,height=750,left=0,top=0');
		  }
	}
	function del(){
		$.ajax({
			url : "action/bannerdelete.php",
			data : $("#frm").serialize(),
			type : "post",
			success : function(result) {
				if (result) {
					var chk = $("[name='banner_no[]']:checked");
					for (var i = 0; i < chk.length; i++) {
						$(chk[i]).next().remove(); //이미지
						$(chk[i]).remove(); //체크박스
						window.location.reload();  
					}
				} else {
					alert("실패");
					}
				
			  }
	});
}

function fn_submit() {
	var form = new FormData(frm);
	if($('#name').val() == ''){
		alert('없음');
		return false;
	}else{
	$.ajax({
		url : "action/bannerinsert.php",
		type : "POST",
		processData : false,
		contentType : false,
		data : form,
		success : function(result) {
			window.location.reload();
		}
	});
	}
}

function logincheck(){
	if($("#userid").val()=="" || $("#pass").val()==""){
		alert("아이디나 패스워드입력 입력");
		return false;
	}
}
function updatecheck(){
	if($("#title").val()==""){
		alert("제목을 입력하세요");
		return false;
	} else if($("#board_conn").val()==""){
		alert("내용을 입력하세요");
		return false;
	}
	
}

function write_check(){
	if($("#author").val()==""){
		alert("작성자 입력");
		return false;
	} else if($("#title").val()==""){
		alert("제목 입력");
		return false;
	} else if($("#board_conn").val()==""){
		alert("내용 입력");
		return false;
	}
}

function pwcheck() {
    if (document.getElementById('pass').value ==
        document.getElementById('passcheck').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = '비밀번호가 일치 합니다';
    } else {
    	document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = '비밀번호가 일치 하지 않습니다';
    }
/*
    if($("#pass").val() == $("#passcheck").val() {
		$("#message").css('color','green').html('비밀번호가 맞다.');
    } else { 
    	$("#message").css('color','red').html('비밀번호가 맞지 않다.');
    }
    */
}
function joincheck(){
	if($("#userid").val()==""){
		alert("아이디 입력");
		return false;
	} else if($("#pass").val()==""){
		alert("비밀번호 입력");
		return false;
	}else if($("#name").val()==""){
		alert("이름 입력");
		return false;
	}else if($("#phone").val()==""){
		alert("번호 입력");
		return false;
	}else if($("#gender").val()==""){
		alert("성별 선택");
		return false;
	}
	
}

</script>
