<?php
include 'db.php';
$board_no = $_GET["board_no"];

if($_SESSION != NULL){
$sql = "UPDATE board Set cnt = cnt+1 WHERE board_no= '$board_no'";
$result = mysqli_query($conn, $sql);
}
?>