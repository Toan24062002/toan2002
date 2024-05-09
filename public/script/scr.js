var slideIndex = 1;

function openModal(imgSrc, caption) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImg");
    var captionText = document.getElementById("caption");

    // Set đường dẫn của ảnh vào modal
    modal.style.display = "block";
    modalImg.src = imgSrc;
    captionText.innerHTML = caption;

    // Đặt slide index tới ảnh được chọn
    slideIndex = parseInt(imgSrc.replace(/\D/g,''));
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    var modalImgs = document.getElementsByClassName("modal-img");
    if (n > modalImgs.length) {slideIndex = 1}
    if (n < 1) {slideIndex = modalImgs.length}
    for (var i = 0; i < modalImgs.length; i++) {
        modalImgs[i].style.display = "none";
    }
    modalImgs[slideIndex-1].style.display = "block";
}