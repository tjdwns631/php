<?php
include '../db.php';

$banner_no = $_POST['banner_no'];

for($i = 0; $i <count($banner_no); $i++){
    
    $sql = "SELECT * FROM banner WHERE banner_no= '$banner_no[$i]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $file = 'image/' . $row['name'];
    unlink($file);
    
    $sql = "DELETE FROM banner WHERE banner_no = '$banner_no[$i]'";
    $result = mysqli_query($conn, $sql);
}

if($result){
    
}else {
    echo '실패';
    error_log(mysqli_error($conn));
}
?>
