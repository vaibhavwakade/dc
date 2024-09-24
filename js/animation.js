// import { gsap } from 'gsap';

// const sliderSection = document.querySelector('.slider-section');
// const background = sliderSection.querySelector('.background');

// gsap.to(background, {
//   duration: 30,
//   ease: 'power2.inOut',
//   x: '100%',
//   repeat: -1,
//   yoyo: true
// });

$(document).ready(function(){
    $('.slider').slick({
      autoplay: true,
      autoplaySpeed: 5000,
      fade: true,
      cssEase: 'linear'
    });
  });