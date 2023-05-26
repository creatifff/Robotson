const init = () => {
    let swiper = new Swiper(".mySwiper", {
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
