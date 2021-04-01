<?php
include ('./db.php');
include './header.php';
if (isset($_GET["page"]))
    $page = $_GET["page"];
    else
        $page = 1;
?>

<div><button class="btn btn-info" onclick="location.href='./mainpage.php'" >메인화면으로</button></div>
<table class="table">
	<thead>
		<tr>
			<th scope="col">아이디</th>
			<th scope="col">이름</th>
			<th scope="col">휴대폰 번호</th>
			<th scope="col">성별</th>
		</tr>
	</thead>
	<tbody>
	
  <?php
$sql = "SELECT * FROM member";
$result = mysqli_query($conn, $sql);
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

$sql2 = "SELECT * FROM member ORDER BY userid DESC LIMIT $page_start, $list";
$result = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
?>
  <?php
while ($row = mysqli_fetch_array($result)) {
    ?>
    <tr style="cursor: pointer;" onclick="location.href='./userinformation.php?userid=<?php echo $row['userid']; ?>'" >
			<th scope="row"><?php echo $row['userid'] ?></th>
			<td><?php echo $row['name'] ?></td>
			<td><?php echo $row['phone'] ?></td>
			<td><?php echo $row['gender'] ?></td>
		</tr>
    <?php }?>
  </tbody>
</table>
	<div id="page_num" style="text-align: center;">
		<?php

if ($page <= 1) {} else {
    echo "<a href='./userlist.php?page=1'> 처음 </a>";
}

if ($page <= 1) {} else {
    $pre = $page - 1;
    echo "<a href='./userlist.php?page=1'> 이전 </a>";
}
for ($i = $block_start; $i <= $block_end; $i ++) {
    if ($page == $i) {
        echo "<b> $i </b>";
    } else {
        echo "<a href='./userlist.php?page=$i'> $i </a>";
    }
}

if ($page >= $total_page) {} else {
    $next = $page + 1;
    echo "<a href='./userlist.php?page=$next'> 다음 </a>";
}

if ($page >= $total_page) {} else {
    echo "<a href='./userlist.php?page=$next'> 마지막 </a>";
}

?>
		</div>

<?php  include 'footer.php';?>