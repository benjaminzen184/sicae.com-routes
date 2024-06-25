$(document).ready(function(){

  const arrayMenus = [
    ['menu__button--menu', [$('.menu__container--menu'), $('.menu__button--menu')]],
    ['menu__button--user', [$('.menu__container--user'), $('.menu__button--user')]],
    ['menu__button--notify', [$('.menu__container--notify'), $('.menu__button--notify')]],
    ['menu__button--search', [$('.menu__container--search'), $('.menu__button--search')]]
  ];
  
  
  // switch menu
  $(document).on('click', (event) => { 
    const currentTarget = $(event.currentTarget.activeElement);
    const target = $(event.target);
    
    function switchMenu(state, elements) {for (const element of elements) {(state) ? element.removeClass('open') : element.addClass('open');} }
    
    for (const val of arrayMenus) { if(!val[1][0].find(target).length) { currentTarget.hasClass(val[0]) ? switchMenu(val[1][0].hasClass('open'), val[1]) : switchMenu(true, val[1]); }}
  });

  let BannerHome = new zibSlide({
    slideClass: '.a-banner__slide',
    dots: true,
    autorun: true,
    arrowLeftClass: '.zib zib-chevron-left',
    arrowRightClass: '.zib zib-chevron-right',
  })
})