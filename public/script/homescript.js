document.addEventListener('DOMContentLoaded', function() {
    // Lấy tất cả các ô menu
    var menuItems = document.querySelectorAll('.navigation li');

    // Xác định key để lưu trạng thái của ô menu trong localStorage
    var storageKey = 'activeMenuItem';

    // Hàm để thiết lập trạng thái active cho ô menu
    function setActiveMenuItem(index) {
        // Loại bỏ lớp active từ tất cả các ô menu
        menuItems.forEach(function(menuItem) {
            menuItem.classList.remove('active');
        });

        // Thêm lớp active cho ô menu được chỉ định bởi index
        if (index >= 0 && index < menuItems.length) {
            menuItems[index].classList.add('active');
            // Lưu trạng thái của ô menu vào localStorage
            localStorage.setItem(storageKey, index);
        }
    }

    // Duyệt qua từng ô menu và thêm sự kiện click
    menuItems.forEach(function(item, index) {
        item.addEventListener('click', function() {
            // Thiết lập trạng thái active cho ô menu được click
            setActiveMenuItem(index);
        });
    });

    // Lấy trạng thái của ô menu từ localStorage
    var activeIndex = localStorage.getItem(storageKey);

    // Khôi phục lại trạng thái active cho ô menu khi load trang mới
    if (activeIndex !== null) {
        setActiveMenuItem(parseInt(activeIndex));
    }
});

