function categories(page = 1, search = $('#search').val()) {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/categories/' + page,
        dataType: 'json',
        data: { search: search },
        success: function(e) {
            var table = "";
            var status = "";
            pagination("categories", page, e.pages);
            if (parseInt(e.results) > 0) {
                $.each(e.data, function(i, d) {
                    switch (parseInt(d.status)) {
                        case 0:
                            status = "<span class='badge badge-success badge-cst'><i class='far fa-check-circle'></i> Dostupna</span>";
                            break;
                        case 1:
                            status = "<span class='badge badge-warning badge-cst'><i class='far fa-circle'></i> Nedostupna</span>";
                            break;
                        default:
                            status = "Not defined";
                    }
                    table += '<tr class="categories_list" onclick="show_category(' + d.id + ')"><td>' + (e.start++) + '.</td><td>' + d.name + '</td><td>' + status + '</td></tr>';
                });
            } else {
                var table = "<tr><td colspan='22'>No results</td></tr>";

            }
            $('#categories_table').html(table);
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // location.reload();
        }
    });
}
categories();
$("#search").on('input', function() {
    categories();
});

function show_category(id) {
    window.location.href = '/admin/category/' + id;
}