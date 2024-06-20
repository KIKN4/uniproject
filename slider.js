document.addEventListener('DOMContentLoaded', () => {
    let next = document.querySelector('.next');
    let prev = document.querySelector('.prev');
    let slider = document.querySelector('.slider');
    let slides = document.querySelectorAll('.slides');
    let index = 0;

    function updateActiveSlide() {
        slides.forEach((slide) => {
            slide.classList.remove('mystyle');
        });
        slides[index].classList.add('mystyle');
    }

    function moveSlideToEnd() {
        slider.appendChild(slides[0]);
        slides = document.querySelectorAll('.slides');
        index = (index + 1) % slides.length;
        updateActiveSlide();
    }

    function moveSlideToStart() {
        slider.prepend(slides[slides.length - 1]);
        slides = document.querySelectorAll('.slides');
        index = (index - 1 + slides.length) % slides.length;
        updateActiveSlide();
    }

    updateActiveSlide();

    next.addEventListener('click', function () {
        moveSlideToEnd();
    });

    prev.addEventListener('click', function () {
        moveSlideToStart();
    });
});