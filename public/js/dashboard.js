/*Sidebar*/
(function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $(".sidebar .sidenav-menu a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });
    $(".sidebar .sidenav-menu a.open").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sidenav-toggled");
    });
})(jQuery);

//Initialize Tool tip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready( function () {
    $('#table').DataTable({
        lengthMenu: [25, 50, 75, 100]
    });
});

//Group by
$(document).ready( function () {
    // Setup - add a text input to each footer cell
    $('#tableGroupBy thead tr').clone(true).appendTo( '#tableGroupBy thead' );
    $('#tableGroupBy thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#tableGroupBy').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
});

/**
 * Single Select
 */
$(document).ready(function() {
    $('.single-select').select2();
});

$("#organization").select2({
    tags: true,
});

$("#location").select2({
    tags: true,
});

$("#organizationCategory").select2({
    tags: true,
});

$("#jobTitle").select2({
    tags: true,
});

$("#individual").select2({
    tags: true,
});

$("#individualGroup").select2({
    tags: true,
});

