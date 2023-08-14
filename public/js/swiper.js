const swiper = new Swiper('.swiper', {
  slidesPerView:4,
  loop:true,
  spaceBetween: 20,
 
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  const swiper2 = new Swiper('.swiper-2', {
    slidesPerView: 2,
    direction: "vertical",
    
    spaceBetween:30,
    slidesPerView: "auto",
    freeMode: true,
    
    scrollbar: {
      el: '.swiper-scrollbar',
      draggable: true,
    },
    mousewheel: true,
  });