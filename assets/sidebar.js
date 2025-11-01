$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$('#sidebar-wrapper a[href="' + window.location.pathname + '"]').addClass("active");
if ($('#sidebar-wrapper a.active').length == 0) {
    $('#sidebar-wrapper a[href="/admin/index"]').addClass("active");
}
$("#page-content-wrapper").click(function() {
    if (window.innerWidth < 990 && $("#wrapper").hasClass("toggled")) $("#wrapper").removeClass("toggled");
});