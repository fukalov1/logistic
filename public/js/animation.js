function onEntr(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('animation-active');
      }
    });
  }
  let options = { threshold: [0.5] };
  let observer = new IntersectionObserver(onEntr, options);
  let elements = document.querySelectorAll('.table-animation');
  for (let elm of elements) {
    observer.observe(elm);
  }

  function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('animation-word');
      }
    });
  }
  let option = { threshold: [0.5] };
  let observe = new IntersectionObserver(onEntry, option);
  let element = document.querySelectorAll('.animation');
  for (let elm of element) {
    observe.observe(elm);
  }


// const anchors = document.querySelectorAll('a[href*="#"]')
//
// for (let anchor of anchors) {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault()
//
//         const blockID = anchor.getAttribute('href').substr(1)
//
//         document.getElementById(blockID).scrollIntoView({
//             behavior: 'smooth',
//             block: 'start'
//         })
//     })
// }

$(document).ready(function() {
    $(window).on('load', function(){
        var top = $(window.location.hash+'+*').offset().top;
        $('html,body').stop().animate({
            scrollTop: top
        }, 1500);
    });
});
