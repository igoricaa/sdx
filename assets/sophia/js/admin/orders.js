function orders(
  page = 1,
  search = $('#search').val(),
  search_status = getParam('status')
) {
  loading();
  $.ajax({
    type: 'POST',
    url: ' /response/admin/orders/' + page,
    dataType: 'json',
    data: { search: search, status: search_status },
    success: function (e) {
      var table = '';
      var status = '';
      pagination('orders', page, e.pages);
      if (parseInt(e.results) > 0) {
        $.each(e.data, function (i, d) {
          switch (parseInt(d.status)) {
            case 0:
              status =
                "<span class='badge badge-warning badge-cst'><i class='far fa-circle'></i> Za slanje</span>";
              break;
            case 1:
              status =
                "<span class='badge badge-success badge-cst'><i class='far fa-check-circle'></i> Poslato</span>";
              break;
            case 2:
              status =
                "<span class='badge badge-danger badge-cst'><i class='far fa-times-circle'></i> Vraćeno</span>";
              break;
            default:
              status = 'Not defined';
          }
          table +=
            '<tr class="orders_list" onclick="show_order(' +
            d.id +
            ')"><td>' +
            e.start++ +
            '.</td><td>#' +
            d.id +
            '</td><td>' +
            getDateFormat(d.created_date) +
            '</td><td>' +
            d.firstname +
            ' ' +
            d.lastname +
            '</td><td>$' +
            addCommas(d.price) +
            '</td><td>' +
            (d.is_paypal == 1
              ? ' Paypal'
              : d.is_zelle == 1
              ? ' Zelle'
              : d.payment === 'Loading...'
              ? ' Crypto'
              : d.payment === 0
              ? ' Card'
              : '') +
            '</td><td>' +
            status +
            '</td><td>' +
            d.items +
            ' product(s)</td></tr>';
        });
      } else {
        var table = "<tr><td colspan='22'>No results</td></tr>";
      }
      $('#orders_table').html(table);
    },
    complete: function (e) {
      loading(0);
    },
    error: function (e) {
      // location.reload();
    },
  });
}
orders();
$('#search').on('input', function () {
  orders();
});

function show_order(id) {
  window.location.href = '/admin/order/' + id;
}
