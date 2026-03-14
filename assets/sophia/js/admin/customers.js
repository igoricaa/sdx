function customers(page = 1, search = $('#search').val(), country = $('#country_filter').val()) {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/customers/' + page,
        dataType: 'json',
        data: { search: search, country: country },
        success: function(e) {
            var table = "";
            pagination("customers", page, e.pages);
            if (parseInt(e.results) > 0) {
                $.each(e.data, function(i, d) {
                    table += '<tr class="customers_list" onclick="show_customer(\'' + d.email + '\')"><td>' + (e.start++) + '.</td><td>' + d.email + '</td><td>' + d.firstname + ' ' + d.lastname + '</td><td>' + (d.country || 'N/A') + '</td><td>' + d.orders + '</td><td>$' + d.spent + '</td></tr>';
                });
            } else {
                var table = "<tr><td colspan='22'>No results</td></tr>";

            }
            $('#customers_table').html(table);
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // location.reload();

        }
    });
}
customers();
$("#search").on('input', function() {
    customers();
});

$("#country_filter").on('change', function() {
    customers();
});

$("#export_customers").on('click', function() {
    var region = $('#country_filter').val();
    var exportUrl = '/admin/customers?export=1';
    if (region) {
        exportUrl += '&region=' + encodeURIComponent(region);
    }
    window.location.href = exportUrl;
});

function show_customer(id) {
    window.location.href = '/admin/customer/' + id;
}