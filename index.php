<?php

// Kết nối database, lấy dữ liệu chung
include('includes/general.php');
// Kết nối header
include('includes/header.php');

// Nếu tồn tại $user
if ($user) {
    // Hiển thị trò chuyện
    echo '  <div class="main-chat">
            </div>
            <div class="box-chat">
                <form method="POST" id="formSendMsg" onsubmit="return false;">
                    <input type="text" placeholder="Aa">
                </form>
            </div>';
}
else {
echo '<div class="box-join">
    <h2><strong>Nhập Email để bắt đầu</strong></h2>
    <form method="POST" id="formJoin" onsubmit="return false;">
        <input type="text" placeholder="Email" class="data-input" id="username" >
        <br />
        <input type="password" placeholder="Mật khẩu" class="data-input" id="password" >
        <br />
        <p style="padding-left: 207px;">
            <a href="reset_password.php">Quên mật khẩu</a>
        </p>
        <button class="btn-submit">Bắt đầu</button>
        <div class="alert danger"></div>
    </form>
</div>';
}
// Kết nối footer
include('includes/footer.php');

?>