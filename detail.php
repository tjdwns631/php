<?php
include ('./db.php');
include './header.php';
$detail_no = $_GET["board_no"];

if (! empty($detail_no) && empty($_COOKIE['board_cookie' . $detail_no])) {

    $sql = "UPDATE board SET hit = hit+1 WHERE board_no ='$detail_no'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if (empty($result)) {
        ?>
        <script type="text/javascript">
        alert('오류발생');
        history.back();
        </script>
<?php
    } else {
        setcookie('board_cookie' . $detail_no, TRUE, time() + (60 * 60 * 24), '/');
    }
}
$sql = "SELECT * FROM board WHERE board_no ='$detail_no'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
?>
<script>
$(function(){

	$(".cnt").on("click",function(){
		$.ajax({
			url: "recom.php",
			data : {board_no : $(".recomno").val()},
			success : function(result){
				<?php
    if ($_SESSION != NULL) {
        ?>
				alert('추천하였습니다.');
				location.reload();
				<?php }else { ?>
				alert('회원가입 후 가능합니다');
				<?php }?>
			}
		});
		
	})
	
});
</script>

<div style="margin: 100px;">
        <?php
        if ($row = mysqli_fetch_array($result)) {
            ?>
	<div>
		파일 : <a href="upload/<?php echo $row['file'];?>" download><?php echo $row['file']; ?></a>
	</div>
	<p style="border: solid 1px black; margin: 3px; width: 500px;">
		<a><?php echo $row["title"]; ?></a> <a style="float: right;"><?php echo $row["board_date"]; ?> </a>
	</p>
	<p style="border: solid 1px black; margin: 3px; width: 500px;">
		<a><?php echo $row["author"]; ?> </a> <a
			style="float: right; margin-right: 10px;">추천수 <b class="cnts"><?php echo $row["cnt"]; ?></b></a><a
			style="float: right; margin-right: 10px;">조회수<b><?php echo $row["hit"] ?></b></a>
	</p>
	<div class="mb-3">
		<textarea class="form-control" rows="10" cols="60" resize="none"
			readonly><?php echo $row["board_conn"]; ?></textarea>
	</div>

</div>
<div style="text-align: center;">
	<button class="btn btn-info"
		onclick="location.href='update.php?board_no=<?php echo $row["board_no"]; ?>'">수정</button>
</div>
<div align="center" style="margin: 20px;">
	<button class="btn btn-info cnt" style="width: 300px; height: 50px">추천</button>
	<input class="recomno" type="hidden"
		value="<?php echo $row["board_no"]; ?>">

</div>
<?php } ?>
<?php include 'footer.php';?>
