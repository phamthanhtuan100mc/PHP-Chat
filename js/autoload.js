$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây
setInterval(function() {
    $jump_to_end = false;
    $height_floor = Math.floor($(window).scrollTop() + $(window).height());
    $height_ceil = Math.ceil($(window).scrollTop() + $(window).height());
    
    if($height_floor == $(document).height() || $height_ceil == $(document).height()) {
        $jump_to_end = true;
    }
    $('.main-chat').load('msglog.php');
}, 1000);