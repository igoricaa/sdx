<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Welcome Popup Settings</h2>
            <button class="btn btn-primary" onclick="savePopupSettings()">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </div>
</div>

<div class="row">
    <!-- Settings Form -->
    <div class="col-md-7">
        <form id="popupSettingsForm" onsubmit="savePopupSettings(); return false;">

            <!-- Enable/Disable Section -->
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-power-off"></i> Popup Status</h5>
                </div>
                <div class="card-body">
                    <div class="custom-control custom-switch custom-switch-lg">
                        <input type="checkbox" class="custom-control-input" id="enabled" name="enabled" value="1" <?= $data['settings']['enabled'] ? 'checked' : '' ?>>
                        <label class="custom-control-label" for="enabled">
                            <strong>Enable Welcome Popup</strong>
                            <br><small class="text-muted">Turn on/off the popup without deleting your settings</small>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Timing Settings -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-clock"></i> Timing Settings</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Delay (seconds)</label>
                                <input type="number" class="form-control" name="delay_seconds" value="<?= $data['settings']['delay_seconds'] ?>" min="0" max="60">
                                <small class="text-muted">Wait time before showing popup</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cookie Duration (days)</label>
                                <input type="number" class="form-control" name="cookie_days" value="<?= $data['settings']['cookie_days'] ?>" min="1" max="365">
                                <small class="text-muted">How long to hide popup for returning visitors</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- State 1: Email Collection -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-envelope"></i> Email Collection Screen</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Main Title</label>
                        <input type="text" class="form-control" name="title" value="<?= $data['settings']['title'] ?>" required>
                        <small class="text-muted">Supports HTML (use &lt;br&gt; for line breaks)</small>
                    </div>

                    <div class="form-group">
                        <label>Subtitle <small class="text-muted">(optional)</small></label>
                        <textarea class="form-control" name="subtitle" rows="2"><?= $data['settings']['subtitle'] ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Placeholder</label>
                                <input type="text" class="form-control" name="email_placeholder" value="<?= htmlspecialchars($data['settings']['email_placeholder']) ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Submit Button Text</label>
                                <input type="text" class="form-control" name="button_text" value="<?= htmlspecialchars($data['settings']['button_text']) ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Disclaimer Text</label>
                        <textarea class="form-control" name="disclaimer_text" rows="2"><?= $data['settings']['disclaimer_text'] ?></textarea>
                        <small class="text-muted">Privacy/marketing consent text</small>
                    </div>

                    <div class="form-group">
                        <label>Dismiss Link Text</label>
                        <input type="text" class="form-control" name="dismiss_text" value="<?= htmlspecialchars($data['settings']['dismiss_text']) ?>">
                        <small class="text-muted">Text for "no thanks" option</small>
                    </div>
                </div>
            </div>

            <!-- State 2: Thank You Screen -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-gift"></i> Thank You Screen</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Thank You Title</label>
                        <input type="text" class="form-control" name="thankyou_title" value="<?= htmlspecialchars($data['settings']['thankyou_title']) ?>">
                    </div>

                    <div class="form-group">
                        <label>Promo Code</label>
                        <input type="text" class="form-control" name="promo_code" value="<?= htmlspecialchars($data['settings']['promo_code']) ?>" required>
                        <small class="text-muted">The discount code customers will receive</small>
                    </div>

                    <div class="form-group">
                        <label>Thank You Message</label>
                        <textarea class="form-control" name="thankyou_message" rows="3" required><?= $data['settings']['thankyou_message'] ?></textarea>
                        <small class="text-muted">Supports HTML. Use &lt;u&gt;&lt;b&gt;CODE&lt;/b&gt;&lt;/u&gt; to highlight the promo code</small>
                    </div>

                    <div class="form-group">
                        <label>Continue Button Text</label>
                        <input type="text" class="form-control" name="thankyou_button_text" value="<?= htmlspecialchars($data['settings']['thankyou_button_text']) ?>">
                    </div>
                </div>
            </div>

        </form>
    </div>

    <!-- Live Preview -->
    <div class="col-md-5">
        <div class="sticky-top" style="top: 80px;">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0"><i class="fas fa-eye"></i> Live Preview</h5>
                </div>
                <div class="card-body p-0">
                    <div class="popup-preview-container" style="background: rgba(0,0,0,0.5); padding: 20px; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                        <div class="popup-preview" style="background: white; border-radius: 10px; max-width: 450px; width: 100%; padding: 30px; position: relative;">
                            <button type="button" class="preview-close" style="position: absolute; top: 15px; right: 15px; background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>

                            <!-- State 1 Preview -->
                            <div id="preview-state1">
                                <h1 class="text-center font-weight-bold preview-title" style="font-size: 1.5rem; margin-bottom: 20px;">UNLOCK 10% OFF<br>your order</h1>
                                <div class="text-center preview-subtitle" style="margin-bottom: 20px;"></div>
                                <input type="email" class="form-control mb-3 preview-email-placeholder" placeholder="Email" readonly>
                                <button class="btn btn-warning btn-block btn-lg mb-2 preview-button-text">Continue</button>
                                <p class="small text-center preview-disclaimer" style="margin-bottom: 20px;">*by submitting this form, you agree to receive promotional and marketing emails.</p>
                                <p class="text-center font-weight-bold"><a href="#" class="preview-dismiss-text"><u>PAY FULL PRICE</u></a></p>
                            </div>

                            <!-- State 2 Preview (hidden by default) -->
                            <div id="preview-state2" style="display: none;">
                                <h1 class="text-center preview-thankyou-title" style="font-size: 1.8rem; margin-bottom: 30px;">Thank you!</h1>
                                <h5 class="text-center preview-thankyou-message" style="margin-bottom: 30px;">
                                    Use promo code <u><b>10SDX</b></u> at checkout and get 10% off!
                                </h5>
                                <button class="btn btn-warning btn-block btn-lg mb-2 preview-thankyou-button-text">Continue</button>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 text-center">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="togglePreviewState()">
                            <i class="fas fa-exchange-alt"></i> Toggle State
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.custom-switch-lg .custom-control-label {
    padding-left: 2.5rem;
    padding-top: 0.25rem;
}
.custom-switch-lg .custom-control-label::before {
    height: 2rem;
    width: calc(3rem + 0.75rem);
    border-radius: 3rem;
}
.custom-switch-lg .custom-control-label::after {
    width: calc(2rem - 4px);
    height: calc(2rem - 4px);
    border-radius: calc(2rem - (2rem / 2));
}
.custom-switch-lg .custom-control-input:checked ~ .custom-control-label::after {
    transform: translateX(calc(2rem - 0.25rem));
}
</style>
