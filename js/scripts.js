$(document).ready(function() {

    $('.filter').grabgets({
        hidden: false // do not replace values in hidden inputs (defaulth is true)
    });

   $('a[href="#submenu"]').click(function() {
     $('.subnav').toggleClass("active");
   });

    $('.b-pageHeader__search').click(function() {
        $('.modal-visa').modal('show');
    });

    if( $('.subnav li').hasClass("current-menu-item") ) {
        $('a[href="#submenu"]').parent().addClass("current_page_item");
    }
});
