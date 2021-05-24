<?php

// Kết nối database, lấy dữ liệu chung
include('includes/general.php');
// Kết nối header
include('includes/header.php');
?>
<div class="box-join">
    <h2>Đăng ký/ Đăng nhập</h2>
    <form method="POST" id="formJoin" onsubmit="return false;">
        <input type="text" placeholder="Tên đăng nhập" class="data-input" id="username" >
        <br />
        <input type="password" placeholder="Mật khẩu" class="data-input" id="password" >
        <br />
        <button class="btn-submit">Bắt đầu</button>
        <div class="alert danger"></div>
    </form>
</div>
<?php
// Kết nối footer
include('includes/footer.php');

?>