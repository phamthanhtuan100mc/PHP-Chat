/**
 * File xử lý đăng ký đăng nhập
 */

// Hàm gửi dữ liệu
function join() {
    // Khai báo các biến dữ liệu trong form
    $username = $("#username").val();
    $password = $("#password").val();

    // Gửi dữ liệu
    $.ajax({
        url: "join.php", // đường dẫn file xử lý
        type: "POST", // phương thức POST hoặc GET
        // Các dữ liệu
        data: {
            username: $username,
            password: $password
        },
        // nếu request thành công
        success: function(result) {
            $('#formJoin .btn-submit').html('Bắt đầu');
            $('#formJoin .alert').html(result); // Thông báo
        }
    });
}

// Bắt sự kiện click vào nút bắt đầu của form
$("#formJoin .btn-submit").click(function() {
    $(this).html("Đang tải ...");
    join();
});