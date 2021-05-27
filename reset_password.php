<?php

// Kết nối database, lấy dữ liệu chung
include('includes/general.php');
// Kết nối header
include('includes/header.php');
?>

<div class="box-join">
    <h2>Reset password</h2>
    <form method="POST" id="formJoin" onsubmit="return false;">
        <input type="text" placeholder="Email/Tên đăng nhập" class="data-input" id="mail" >
        <br />
        <a style="padding-right: 250px;" href="#" onclick="history.back()">Quay về</a>
        <br />
        <button class="btn-submit">Gửi mã xác nhận</button>
        <div class="alert danger"></div>
    </form>
</div>;

<?php
// Kết nối footer
include('includes/footer.php');
?>