<?php

// Kết nối database, lấy dữ liệu chung
include('includes/general.php');

// Khai báo các biến gán với dữ liệu nhận được
$body_msg = @mysqli_real_escape_string($cn, $_POST['body_msg']);
$body_msg = htmlentities($body_msg);
$body_msg = trim($body_msg);

// Gửi tin nhắn nếu nội dung khác rỗng
if (!empty($body_msg)) {
    $sql = "INSERT INTO `messages`(`body`, `user_from`, `date_sent`) VALUES ('$body_msg', '$user', '$date_current')";
    $query_send_msg = mysqli_query($cn, $sql);
}

?>