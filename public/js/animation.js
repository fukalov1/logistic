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



var counter = function() {

    $('#about-section').waypoint( function( direction ) {

        if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

            var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
            $('.number > span').each(function(){
                var $this = $(this),
                    num = $this.data('number');
                $this.animateNumber(
                    {
                        number: num,
                        numberStep: comma_separator_number_step
                    }, 7000
                );
            });

        }

    } , { offset: '95%' } );

}
counter();
