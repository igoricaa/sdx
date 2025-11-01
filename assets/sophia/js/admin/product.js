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
            var pCat = $('#categories_list').data('category');
            $("#categories_list option[value='" + pCat + "']").attr('selected', 'selected');
        },
        error: function(e) {
            // location.reload();
        }
    });
}
categories_list();

$('#edit_product').click(function() {
    var form_data = new FormData(document.getElementById("form_product"));
    loading();
    $.ajax({
        type: 'POST',
        url: ' /response/admin/edit_product/',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(e) {
            notify(e.message, e.error);
            if (e.error) {
                // location.reload();
            }
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

// $('#variants').change(function() {
//     var status = $('#variants').is(':checked');
//     if (status) {
//         $('#variant_details').show();
//     } else {
//         $('#variant_details').hide();
//     }
// });
$('#physical_product').change(function() {
    physical_product();
});
physical_product();

function physical_product() {
    var status = $('#physical_product').is(':checked');
    if (status) {
        $('#physical_product_details').show();
    } else {
        $('#physical_product_details').hide();
    }
}

function quantity_discount() {
    var status = $('#quantity_discount').is(':checked');
    if (status) {
        $('#quantity_discount_details').show();
    } else {
        $('#quantity_discount_details').hide();
    }
}
$('#quantity_discount').change(function() {
    quantity_discount();
});
quantity_discount();

function addURLinput() {
    var inp = '<input type="text" class="form-control mb-3" name="img_url[]" placeholder="https://google.com/image.jpg">';
    $('#URLinputs').append(inp);
    return false;
}

function add_quantity_discount() {
    var inp = '<div class="row"><div class="col-3 pr-0"><div class="form-group"><label>Broj komada</label><input type="text" class="form-control" placeholder="10" name="quantity_discount_num[]"></div></div><div class="col-9"><div class="form-group"><label>Popust po komadu</label><input type="text" class="form-control" placeholder="2500" name="quantity_discount_price[]"></div></div></div>';
    $('#quantity_discount_inputs').append(inp);
    return false;
}

function add_packages_input() {
    var inp = '<div class="row"> <div class="col-3 pr-0"> <div class="form-group"><label>Ime pakovanja</label><input type="text" class="form-control" placeholder="10" name="package_name[]"></div> </div> <div class="col-9"> <div class="form-group"><label>Cena pakovanja</label><input type="text" class="form-control" placeholder="2500" name="package_price[]"></div> </div> </div>';
    $('#packages_input').append(inp);
    return false;
}

function add_collapse_description() {
    var inp = '<div class="collapse_item"><div class="form-group "><label>Naziv</label><input type="text" class="form-control" name="collapse_name[]"></div><div class="form-group collapse_name mb-0"><label>Opis</label><textarea name="collapse_description[]" rows="2" class="form-control"></textarea></div></div><hr>';

    $('#collapse_description_inputs').append(inp);
    return false;
}

function addVariant() {
    var inp = '<div class="row"><div class="col-3 pr-0"><div class="form-group"><label>Naziv</label><input type="text" class="form-control" placeholder="Boja" name="variant_name[]"></div></div><div class="col-9"><div class="form-group"><label>Opcije <small>(varijante razdvajate zarezom)</small></label><input type="text" class="form-control" placeholder="Plava, Zelena, Crvena" name="varient_options[]"></div></div></div>';
    $('#VARIANTSinputs').append(inp);
    return false;
}

function removeImg(id) {
    alert(id);
}

$('.delete[data-delete-image]').click(function() {
    var imageID = $(this).data('delete-image');
    $(this).parent().parent().fadeOut();
    $('form').append('<input type="hidden" name="delete_image[]" value="' + imageID + '">');
    // alert('Delete: ' + imageID);
});

$('#delete_product').click(function() {
    swal({
            text: "Potvrdite brisanje product(s)!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((value) => {
            if (!value) return false;
            loading();
            $.ajax({
                type: 'POST',
                url: ' /response/admin/delete_product/',
                dataType: 'json',
                data: $('form').serialize(),
                success: function(e) {
                    notify(e.message, e.error);
                    if (e.error) {
                        window.location.href = '/admin/products_list';
                    }
                },
                complete: function(e) {
                    loading(0);
                },
                error: function(e) {
                    // location.reload();
                }
            });
            return false;
        });
});