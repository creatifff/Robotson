const init = () => {
    let swiper1 = new Swiper(".mySwiper", {
        direction: 'horizontal',
        rewind: true,
        slidesPerView: 4,
        spaceBetween: 30,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}
document.addEventListener('DOMContentLoaded', init);


const init1 = () => {
    let swiper2 = new Swiper(".mySwiper3", {
        loop: true,
        lazy: true,
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });
    let swiper3 = new Swiper(".mySwiper2", {
        loop: true,
        lazy: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper2,
        },
    });
}
document.addEventListener('DOMContentLoaded', init1)


// window.onscroll = function showHeader() {
//     let header = document.querySelector('.header');
//
//     if(window.pageYOffset > 84 ) {
//         header.classList.add('header-fixed');
//     } else {
//         header.classList.remove('header-fixed');
//
//     }
// }
