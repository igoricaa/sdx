$('a[data-dropdown]').click(function() {
    $('#sidebar-wrapper .main-sidebar').removeClass('dropdown-active');
    $(this).addClass('dropdown-active');
    var target = $(this).data('dropdown');
    $('.dropdown').removeClass('show');
    $('#' + target).addClass('show');
});

var path = window.location.pathname;
var elem = $('a[href="' + path + '"]');

if (elem.parent().hasClass('dropdown')) {
    elem.parent().addClass('show');
    elem.parent().prev().addClass('dropdown-active');
}

function pagination(fux, page, numb) {
    var pagination = "";
    var i = 0;
    if (numb > 0) {
        while (i++ < numb) {
            var active = (page == i) ? "active" : "";
            pagination += '<li class="page-item ' + active + '"><a href="#" class="page-link" onclick="' + fux + '(' + i + ')">' + i + '</a></li>';
        }
    }
    if (numb > 1)
        $("#is_pagination").show();
    else
        $("#is_pagination").hide();
    $("#pagination").html(pagination);
}

function getDateFormat(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        hour = '' + d.getHours(),
        minute = '' + d.getMinutes(),
        year = d.getFullYear();
    if (isNaN(year)) return "";

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;
    if (hour.length < 2)
        hour = '0' + hour;
    if (minute.length < 2)
        minute = '0' + minute;
    var r_date = day + '.' + month + '.' + year + '. ' + hour + ':' + minute;
    return r_date;
}

function getParam(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function loading(a = 1) {
    if (a == true) {
        $('#loading').show();
    } else {
        $('#loading').hide();
    }
}

function notify(e, a = !1) {
    var t = (a) ? 'success' : 'error';
    var n = (a) ? 'Success!' : 'Error!';
    swal(n, e, t), loading(0);
}

function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

jQuery(document).ready(function($) {
    // Get page title
    var pageTitle = $("title").text();

    // Change page title on blur
    $(window).blur(function() {
        $("title").text("SmartDrugs <=");
    });

    // Change page title back on focus
    $(window).focus(function() {
        $("title").text(pageTitle);
    });
});