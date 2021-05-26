// Hàm gửi tin nhắn
function sendMsg() {
    // Khai báo cáo biến trong form
    $body_msg = $('#formSendMsg input[type="text"]').val();

    // Gửi dữ liệu
    $.ajax({
        url: 'sendmsg.php',
        type: 'POST',
        data: {
            body_msg: $body_msg
        },
        success: function() {
            // làm trống thanh trò chuyện
            $('#formSendMsg input[type="text"]').val('');
        },
        error: function() {
            // làm trống thanh trò chuyện
            $('#formSendMsg input[type="text"]').val('send message fail');
        },
    });
}

// Bắt sự kiện gõ phím enter trong thanh trò chuyện
$('#formSendMsg input[type="text"]').keypress(function() {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        // Chạy hàm gửi tin nhắn
        sendMsg();
        // Kéo hết thanh cuộn trình duyệt đến cuối
        window.scrollBy(0, $(document).height());
    }
});