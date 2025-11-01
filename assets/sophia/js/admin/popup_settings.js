// Live preview update functions
function updatePreview() {
    // Get form values
    const title = $('[name="title"]').val();
    const subtitle = $('[name="subtitle"]').val();
    const emailPlaceholder = $('[name="email_placeholder"]').val();
    const buttonText = $('[name="button_text"]').val();
    const disclaimer = $('[name="disclaimer_text"]').val();
    const dismissText = $('[name="dismiss_text"]').val();
    const thankyouTitle = $('[name="thankyou_title"]').val();
    const thankyouMessage = $('[name="thankyou_message"]').val();
    const thankyouButtonText = $('[name="thankyou_button_text"]').val();

    // Update State 1 preview
    $('.preview-title').html(title);
    $('.preview-subtitle').html(subtitle);
    $('.preview-email-placeholder').attr('placeholder', emailPlaceholder);
    $('.preview-button-text').text(buttonText);
    $('.preview-disclaimer').html(disclaimer);
    $('.preview-dismiss-text').html('<u>' + dismissText + '</u>');

    // Update State 2 preview
    $('.preview-thankyou-title').text(thankyouTitle);
    $('.preview-thankyou-message').html(thankyouMessage);
    $('.preview-thankyou-button-text').text(thankyouButtonText);
}

// Toggle between state 1 and state 2 in preview
function togglePreviewState() {
    $('#preview-state1').toggle();
    $('#preview-state2').toggle();
}

// Update preview on any input change
$(document).ready(function() {
    // Initial preview update
    updatePreview();

    // Update preview on any form change
    $('#popupSettingsForm input, #popupSettingsForm textarea').on('input change', function() {
        updatePreview();
    });
});

// Save popup settings
function savePopupSettings() {
    // Get form data
    const formData = {};

    // Get all form fields
    $('#popupSettingsForm').serializeArray().forEach(function(item) {
        formData[item.name] = item.value;
    });

    // Handle checkbox separately (unchecked checkboxes don't appear in serializeArray)
    formData.enabled = $('#enabled').is(':checked') ? 1 : 0;

    $.ajax({
        type: 'POST',
        url: '/response/admin/update_popup_settings',
        dataType: 'json',
        data: formData,
        success: function(response) {
            notify(response.message.message, response.message.error);
        },
        error: function(xhr, status, error) {
            notify('Failed to save settings. Please try again.', false);
        }
    });

    return false;
}
