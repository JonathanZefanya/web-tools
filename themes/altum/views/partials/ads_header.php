<?php defined('ZEFANYA') || die() ?>
<?php
if(
    !empty(settings()->ads->header)
    && (
        !is_logged_in() ||
        (is_logged_in() && !$this->user->plan_settings->no_ads)
    )
    && \Altum\Router::$controller_settings['ads']
): ?>
    <div class="container my-3 d-print-none"><?= settings()->ads->header ?></div>
<?php endif ?>
