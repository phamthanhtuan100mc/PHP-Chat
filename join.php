<?php

// Kết nối database, lấy dữ liệu chung
include_once("includes/general.php");

// Khai báo các biến nhận dữ liệu
$username = @mysqli_real_escape_string($cn, $_POST["username"]);
$password = @mysqli_real_escape_string($cn, $_POST["password"]);

/**
 * Các biến hiển thị thông báo
 */
// Hiển thị thông báo lỗi
$show_alert = '<script>$("#formJoin .alert").show();</script>';
// Ẩn thông báo lỗi
$hide_alert = '<script>$("#formJoin .alert").hide();</script>';
// Thông báo thành công
$success_alert = '<script>$("#formJoin .alert").attr("class", "alert success");</script>';
// Thông báo thất bại
$fail_alert = '<script>$("#formJoin .alert").attr("class", "alert danger");</script>';

// Kiểm tra có tồn tại username
$query_check_exist_user = mysqli_query($cn, "SELECT * FROM users WHERE username = '$username'");

// Nếu username hoặc password trống
if($username == "" || $password == "") {
    // Thông báo lỗi
    echo $show_alert . $fail_alert . "Vui lòng điền đầy đủ thông tin bên trên!";
}
else {
    // Nếu tồn tại username thì thực thi đăng nhập
    if (mysqli_num_rows($query_check_exist_user)) {
        // Mã hoá password sang MD5
        $password = md5($password);
        // Kiểm tra thông tin đăng nhập
        $query_check_login = mysqli_query($cn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        // Nếu thông tin đăng nhập đúng
        if (mysqli_num_rows($query_check_login)) {
            echo $show_alert . $success_alert . 'Đăng nhập thành công.'; // Thông báo
            $_SESSION['username'] = $username; // Lưu session giá trị username
            echo '<script>window.location.reload();</script>'; // Tải lại trang
        }
        else {
            echo $show_alert . $fail_alert . 'Tên đăng nhập hoặc mật khẩu không chính xác!';
        }
    }
    // Tiến hành đăng ký tài khoản
    else {
        // Nếu độ dài username < 6 hoặc > 40
        if (strlen($username) < 6 || strlen($username) > 40) {
            echo $show_alert . $fail_alert . 'Tên đăng nhập trong khoảng từ 6-40 ký tự!'; 
        }
        // Nếu username chứa khoảng trắng và ký tự đặc biệt
        else if (preg_match('/\W/', $username)) {
            echo $show_alert . $fail_alert . 'Tên đăng nhập không chứa khoảng trắng và ký tự đặc biệt.';
        }
        // Nếu độ dài password < 6
        else if (strlen($password) < 6) {
            echo $show_alert . $fail_alert . 'Mật khẩu của bạn quá ngắn, hãy thử lại với mật khẩu khác an toàn hơn.';
        }
        // Không mắc các lỗi trên thì insert vào table
        else {
            $password = md5($password);
            // Thêm thông tin người dùng vào table users 
            $query_create_user = mysqli_query($cn, "INSERT INTO `users`(`username`, `password`, `date_created`) VALUES (
                '$username',
                '$password',
                '$date_current'
            )");
            echo $show_alert . $success_alert . 'Đăng ký tài khoản thành công.';
            $_SESSION['username'] = $username; // Lưu session giá trị username
            // Tải lại trang
            echo '<script>window.location.reload();</script>';
        }
    }
}

?>