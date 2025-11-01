function products(page = 1, search = $('#search').val(), search_status = getParam('status')) {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/products/' + page,
        dataType: 'json',
        data: { search: search, status: search_status },
        success: function(e) {
            var table = "";
            var status = "";
            pagination("products", page, e.pages);
            if (parseInt(e.results) > 0) {
                $.each(e.data, function(i, d) {
                    switch (parseInt(d.status)) {
                        case 0:
                            status = "<span class='badge badge-success badge-cst'><i class='far fa-check-circle'></i> Dostupan</span>";
                            break;
                        case 1:
                            status = "<span class='badge badge-warning badge-cst'><i class='far fa-circle'></i> U pripremi</span>";
                            break;
                        case 2:
                            status = "<span class='badge badge-danger badge-cst'><i class='far fa-times-circle'></i> Arhiviran</span>";
                            break;
                        default:
                            status = "Not defined";
                    }
                    table += '<tr class="orders_list" onclick="show_product(' + d.id + ')"><td>' + (e.start++) + '.</td><td>' + d.title + '</td><td>' + status + '</td></tr>';
                    // table += '<tr class="orders_list" onclick="show_product(' + d.id + ')"><td>' + (e.start++) + '.</td><td>' + d.title + '</td><td>' + status + '</td><td>' + d.inventory + '</td><td>' + d.type + '</td><td>' + d.vendor + '</td></tr>';
                });
            } else {
                var table = "<tr><td colspan='22'>No results</td></tr>";

            }
            $('#products_table').html(table);
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // location.reload();
        }
    });
}
products();
$("#search").on('input', function() {
    products();
});

function show_product(id) {
    window.location.href = '/admin/product/' + id;
}