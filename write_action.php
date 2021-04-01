<?php
 include('../db.php');

    $title=$_POST['title'];
    $board_conn= $_POST['board_conn'];
    $author =$_POST['author'];
    $date = date('Y-m-d H:i:s');
    $URL = '../mainpage.php';   
    
    $tmpfile =  $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
    $folder = "upload/".$filename;
    move_uploaded_file($tmpfile,$folder);
    
    $sql = "INSERT INTO board(title, board_conn, author, board_date, file)
    VALUES('$title','$board_conn','$author','$date','$o_name')";
    $result= mysqli_query($conn,$sql) or die(mysqli_error($conn));
    

    if($result){
        ?>
        <script>alert('작성 성공');
        location.replace("<?php echo $URL; ?>");
        </script>
<?php
        
    }else{
        echo '저장 실패';
        error_log(mysqli_error($conn));//에러 로그
    }
    mysqli_close($conn);

?>
