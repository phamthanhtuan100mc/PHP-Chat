<?php

// Kết nối database, lấy dữ liệu chung
include('includes/general.php');

// Lấy dữ liệu từ table messages theo thứ tự id_msg tăng dần
$sql = "SELECT * FROM messages ORDER BY id_msg ASC";
$query_get_msg = mysqli_query($cn, $sql);

// Dùng vòng lặp while để lấy dữ liệu
while ($row = mysqli_fetch_assoc($query_get_msg)) {
    // Thời gian gửi tin nhắn
    $originalDate = $row['date_sent'];
    $date_sent = date("d-m-Y", strtotime($originalDate));
    $time_sent = date("H:i", strtotime($originalDate));
    // Nếu người gửi là $user thì hiển thị khung tin nhắn màu xanh
    if ($row['user_from'] == $user) {
        echo    '<div class="msg-user">
                <p>' . $row['body'] . '</p>
                <div class="info-msg-user">
                        ' . $date_sent . ' lúc ' . $time_sent . '
                </div>
        </div>';
    }
    // Ngược lại người gửi không phải là $user thì hiển thị khung tin nhắn màu xám
    else {
        echo    '<div class="msg">
                        <p>' . $row['body'] . '</p>
                        <div class="info-msg">
                                ' . $row['user_from'] . ' - ' . $date_sent . ' lúc ' . $time_sent . '
                        </div>
                </div>';
    }
}

?>