<?php
include ('db.php');
$sql = "SELECT * FROM board ORDER BY board_no DESC";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
	crossorigin="anonymous">
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
	crossorigin="anonymous"></script>
<script
	src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
	integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
	crossorigin="anonymous"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
	integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
	crossorigin="anonymous"></script>
<script>
	$(function() {

    	$(".login").on("click",function(){
    	modal=$("#loginModal");
    	$.ajax({
    		url:"loginmodal.php" ,
    		success : function(result){
    			modal.find('#loginbody').html(result);
    			modal.modal('show');
    			}
    		});
    	});
    	
    	
	})
</script>
</head>
<body style="margin-top: 100px;">
	<div style="float: right; margin: 50px;">
		<button type="button" class="btn btn-primary login"
			data-bs-toggle="modal">로그인</button>
		<button type="button" class="btn btn-primary" onclick="location.href='joinmodal.php'">회원가입</button>
				
	</div>
	<div class="container" style="text-align: center;">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">제목</th>
					<th scope="col">작성자</th>
					<th scope="col">날짜</th>
					<th scope="col">조회수</th>
					<th scope="col">추천수</th>
				</tr>
			</thead>
			<tbody>
            <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr
					onclick="location.href='detail.php?board_no=<?php echo $row['board_no']; ?>'"
					style="cursor: pointer;">
					<th scope="row"><?php echo $row["board_no"]; ?></th>
					<td><?php echo $row["title"] ?></td>
					<td><?php echo $row["author"] ?></td>
					<td><?php echo $row["board_date"] ?></td>
					<td><?php echo $row["hit"] ?></td>
					<td><?php echo $row["cnt"] ?></td>
					<td><a href="update.php?board_no=<?php echo $row["board_no"];?>">수정</a>
						<a href="delete.php?board_no=<?php echo $row["board_no"];?>">삭제</a></td>
				</tr>
                <?php
            }
            ?>
            </tbody>
		</table>

		<div>
			<button type="button" class="btn btn-primary"
				onclick="location.href='write.php'">글 작성</button>
		</div>
	</div>


	<!-- 로그인 -->
	<div class="modal fade" id="loginModal" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" id="loginbody"></div>
			</div>
		</div>
	</div>


	<!-- 회원가입 -->
	<div class="modal fade" id="joinmadal" tabindex="-1"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" id="joinbody"></div>
			</div>
		</div>
	</div>
</body>

</html>