window.addEventListener('scroll', function () {
    var header = document.querySelector('header');
    if (window.scrollY > 0) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

document.getElementById('nav-toggle').addEventListener('click', function() {
    document.getElementById('navbar-links').classList.toggle('show-navbar');
    document.getElementById('nav-close').style.display = 'block';
});

document.getElementById('nav-close').addEventListener('click', function() {
    document.getElementById('navbar-links').classList.remove('show-navbar');
    document.getElementById('nav-close').style.display = 'none';
});



window.addEventListener('resize', () => {
    const carousel = document.querySelector('.carousel');
    if (window.innerWidth >= 1200) {
        carousel.style.transform = 'none';
    } else {
        changeSlide(currentSlide);
    }
});




// let slideIndex = 0;
// showSlides();

// function showSlides() {
//     let slides = document.getElementsByClassName("mySlides");
//     for (let i = 0; i < slides.length; i++) {
//         slides[i].style.display = "none";
//     }
//     slideIndex++;
//     if (slideIndex > slides.length) { slideIndex = 1 }
//     slides[slideIndex - 1].style.display = "block";
//     setTimeout(showSlides, 5000); // Change image every 5 seconds
// }

// function toggleNavbar() {
//     const navbarLinks = document.querySelector('.navbar-links');
//     navbarLinks.classList.toggle('show-navbar');
// }






// // /*=============== SHOW MENU ===============*/
// const navMenu = document.getElementById('nav-menu'),
// navToggle = document.getElementById('nav-toggle'),
// navClose = document.getElementById('nav-close')

// /* Menu show */
// if(navToggle){
// navToggle.addEventListener('click', () =>{
// navMenu.classList.add('show-menu')
// })
// }

// /* Menu hidden */
// if(navClose){
// navClose.addEventListener('click', () =>{
// navMenu.classList.remove('show-menu')
// })
// }

// // /*=============== REMOVE MENU MOBILE ===============*/
// const navLink = document.querySelectorAll('.nav__link')

// const linkAction = () =>{
//     const navMenu = document.getElementById('nav-menu')
//     // When we click on each nav__link, we remove the show-menu class
//     navMenu.classList.remove('show-menu')
// }
// navLink.forEach(n => n.addEventListener('click', linkAction))

// // // Carousel bg
// // const myCarouselElement = document.querySelector('#myCarousel')

// // const carousel = new bootstrap.Carousel(myCarouselElement, {
// //   interval: 1000,
// //   touch: false
// // })

// // /* =====HEADER BLUR===== */
// // const blurHeader = () =>{
// //   const header = document.getElementById('header')
// //   // Add a class if the bottom offset is greater than 50 of the viewport
// //   this.scrollY >= 50 ? header.classList.add('blur-header') 
// //                      : header.classList.remove('blur-header')
// // }
// // window.addEventListener('scroll', blurHeader)

