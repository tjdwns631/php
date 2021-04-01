<?php
include ('./db.php');
include './header.php';
include './function.php';
if (isset($_GET["page"])){
    $page = $_GET["page"];
}else{
    $page = 1;
}

// isset : 변수 존재여부, empty : 변수안에 값 여부 
$where = '';
if(!empty($_GET['search']) AND !empty($_GET['select'])) {
    $sel = $_GET['select'];
    $search = $_GET['search'];
    $where = "WHERE ".$sel." LIKE '%".$search."%'";
} else { 
    $where = '';
}

?>
<script>
	$(function() {
    	$(".login").on("click",function(){
    	var modal=$("#loginModal");
    	$.ajax({
    		url:"./login.php" ,
    		success : function(result){
    			modal.find('#loginbody').html(result);
    			modal.modal('show');
    			}
    		});
    	});

    	$(".banner").on("click",function(){
        	var modal=$("#banner");
        	$.ajax({
        		url:"./banner.php" ,
        		success : function(result){
        			modal.find('#bannerbody').html(result);
        			modal.modal('show');
        			}
        		});
        	});
    	popup('popup.php');
	})
</script>
<div class="container">
	<div class="slider">
<?php
$sql3 = "SELECT * FROM banner";
$result3 = mysqli_query($conn, $sql3);
$cnt = 0;
$cnt = mysqli_num_rows($result3);
if ($cnt == 0) {
    ?>
	<div>
			<h4>이미지가 없습니다.</h4>
		</div>
	<?php }else { ?>
	 <?php while($row = mysqli_fetch_array($result3)){ ?>
		<img alt="aa" src="image/<?php echo $row['name'] ?>"
			style="width: 700px; height: 200px;">
		<?php } ?>
		<?php } ?>
	</div>
	<div style="float: left; margin: 50px;">
<?php
if ($_SESSION['member_author'] == 'admin') {
    ?>
	 <button class="btn btn-primary" onclick="location.href='userlist.php'">회원
			리스트</button>
		<button type="button" class="btn btn-primary banner">배너 관리</button>
		<?php } ?>
<?php if($_SESSION != NULL){ ?>
	<button class="btn btn-primary"
			onclick="location.href='myinformation.php?userid=<?php echo $_SESSION['userid']?>'">정보
			수정</button>
<?php }?>
</div>

	<div style="float: right; margin: 50px;">
	<?php
if ($_SESSION['userid'] == NULL) {
    ?>
		<button type="button" class="btn btn-primary login">로그인</button>
		<button type="button" class="btn btn-primary"
			onclick="location.href='./joinmodal.php'">회원가입</button>
		<?php
} else {
    ?>
    
		<button type="button" class="btn btn-primary"
			onclick="location.href='action/logout_action.php'">로그아웃</button>
			<?php }?>
			
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
$sql = "SELECT * FROM board ".$where;

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$total_record = mysqli_num_rows($result);

$list = 3;
$block_cnt = 3;
$block_num = ceil($page / $block_cnt);
$block_start = (($block_num - 1) * $block_cnt) + 1;

$block_end = $block_start + $block_cnt - 1;

$total_page = ceil($total_record / $list);
if ($block_end > $total_page) {
    $block_end = $total_page;
}
$total_block = ceil($total_page / $block_cnt);
$page_start = ($page - 1) * $list;

$sql2 = "SELECT * FROM board ".$where." ORDER BY board_no DESC LIMIT $page_start, $list";
$result = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
$today = date('Y-m-d');
$i = 0;
?>
			
            <?php
          
            while ($row = mysqli_fetch_array($result)) {
                $num = $total_record - (($page - 1) * $list) - $i;

                ?>
                <tr
					onclick="location.href='./detail.php?board_no=<?php echo $row['board_no']; ?>'"
					style="cursor: pointer;">
					<th scope="row"><?php echo $num; ?></th>
					<td><?php echo $row["title"] ?></td>
					<td><?php echo $row["author"] ?></td>
					<?php

                if ($today == substr($row['board_date'], 0, 10)) {
                    ?>
					<td><?php echo substr($row["board_date"],11,5) ?></td>
					<?php }else{?>
					
					<td><?php echo substr($row["board_date"],0,10) ?></td>
					<?php }?>
					
					<td><?php echo $row["hit"] ?></td>
					<td><?php echo $row["cnt"] ?></td>
					
					<?php if ($_SESSION['member_author'] == 'admin') { ?>
					<td><a href="update.php?board_no=<?php echo $row["board_no"];?>">수정</a>
						<a href="delete.php?board_no=<?php echo $row["board_no"];?>">삭제</a></td>
				</tr>
					<?php }?>
           <?php
                $i ++;
            }
            ?>
            </tbody>
		</table>
		<div id="page_num" style="text-align: center;">
		<?php

if ($page <= 1) {} else {
    echo "<a href='./mainpage.php?page=1'> 처음 </a>";
}

if ($page <= 1) {} else {
    $pre = $page - 1;
    echo "<a href='./mainpage.php?page=1'> 이전 </a>";
}
for ($i = $block_start; $i <= $block_end; $i ++) {
    if ($page == $i) {
        echo "<b> $i </b>";
    } else {
        echo "<a href='./mainpage.php?page=$i'> $i </a>";
    }
}

if ($page >= $total_page) {} else {
    $next = $page + 1;
    echo "<a href='./mainpage.php?page=$next'> 다음 </a>";
}

if ($page >= $total_page) {} else {
    echo "<a href='./mainpage.php?page=$next'> 마지막 </a>";
}

?>
		</div>
		<div>
			<button type="button" class="btn btn-primary"
				onclick="location.href='./write.php'">글 작성</button>
		</div>
	</div>
	<div style="margin: 20px; align-content: center;">
	<?php 
	$search_arr = array('title'=>'제목', 'author'=>'글쓴이', 'board_conn'=>'내용');
	?>
		<form method="get" name="search" id="search" action='./mainpage.php'>
			검 색 <select name="select">
				<?php 
				    $selected= '';
				    foreach($search_arr as $key=>$val) {
				        if($key==$_GET['select']) {
				            $selected = 'selected="selected"';
				        } else { 
				            $selected = '';
				        }
				       
				?>
				<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
				<?php 
				    }
				?>
				</select> 
				<input type="text" size="45" name="search" value="<?php echo $search; ?>"> <input
				type="submit" value="검색">
		</form>
	</div>
</div>
<?php include './modal.php';?>
<?php include './footer.php';?>