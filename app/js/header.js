(function() {
  'use strict';
  
  var $topnav = $('.topnav');

  $('.nav-expand').click(function(event) {
    $topnav.toggleClass('expanded');
  });

  $topnav.find('.dropdown').click(function(event) {
    if($(window).width() < 991) {
      event.preventDefault();
    }
    $(this).find('.dropdown-menu').toggleClass('expandedDropdown');
  });

  $topnav.find('.dropdown-item').click(function(event) {
    event.stopPropagation();
  });
})();