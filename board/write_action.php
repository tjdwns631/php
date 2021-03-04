<?php
 include('db.php');

    $title=$_POST['title'];
    $board_conn= $_POST['board_conn'];
    $author =$_POST['author'];
    $date = date('Y-m-d H:i:s');
    $URL = './mainpage.php';   

    $sql = "INSERT INTO board(title, board_conn, author, board_date)
    VALUES('$title','$board_conn','$author','$date')";
    $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));

    if($result){
        ?>
        <script>alert('작성 성공');
        location.replace("<?php echo $URL; ?>");
        </script>";
<?php
        
    }else{
        echo '저장 실패';
        error_log(mysqli_error($conn));//에러 로그
    }
    mysqli_close($conn);

?>
