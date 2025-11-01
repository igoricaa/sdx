function categories_list() {
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/categories_list/',
        dataType: 'json',
        success: function(e) {
            var table = "";
            $.each(e, function(i, d) {
                table += '<option value="' + d.id + '">' + d.name + '</option>';
            });
            $('#categories_list').html(table);
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // location.reload();
        }
    });
}
categories_list();

$('#create_product').click(function() {
    var form_data = new FormData(document.getElementById("form_product"));
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/new_product/',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(e) {
            notify(e.message, e.error);
        },
        complete: function(e) {
            loading(0);
        },
        error: function(e) {
            // // location.reload();
            alert('error');
        }
    });
});

$('#variants').change(function() {
    var status = $('#variants').is(':checked');
    if (status) {
        $('#variant_details').show();
    } else {
        $('#variant_details').hide();
    }
});
$('#physical_product').change(function() {
    var status = $('#physical_product').is(':checked');
    if (status) {
        $('#physical_product_details').show();
    } else {
        $('#physical_product_details').hide();
    }
});
$('#quantity_discount').change(function() {
    var status = $('#quantity_discount').is(':checked');
    if (status) {
        $('#quantity_discount_details').show();
    } else {
        $('#quantity_discount_details').hide();
    }
});

function addURLinput() {
    var inp = '<input type="text" class="form-control mb-3" name="img_url[]" placeholder="https://google.com/image.jpg">';
    $('#URLinputs').append(inp);
    return false;
}

function add_quantity_discount() {
    var inp = '<div class="row"><div class="col-3 pr-0"><div class="form-group"><label>Broj komada</label><input type="text" class="form-control" placeholder="10" name="quantity_discount_num[]"></div></div><div class="col-9"><div class="form-group"><label>Cena po komadu</label><input type="text" class="form-control" placeholder="2500" name="quantity_discount_price[]"></div></div></div>';
    $('#quantity_discount_inputs').append(inp);
    return false;
}

function addVariant() {
    var inp = '<div class="row"><div class="col-3 pr-0"><div class="form-group"><label>Naziv</label><input type="text" class="form-control" placeholder="Boja" name="variant_name[]"></div></div><div class="col-9"><div class="form-group"><label>Opcije <small>(varijante razdvajate zarezom)</small></label><input type="text" class="form-control" placeholder="Plava, Zelena, Crvena" name="varient_options[]"></div></div></div>';
    $('#VARIANTSinputs').append(inp);
    return false;
}