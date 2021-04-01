<?php
session_start();
session_destroy();
echo "<script>location.href='../mainpage.php';</script>";
?>