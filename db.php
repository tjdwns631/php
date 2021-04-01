<?php
$conn = mysqli_connect("localhost", "root", "admin1", "board_admin");
session_start();
if (!$conn) {
    mysqli_connect_error();
}
?>


