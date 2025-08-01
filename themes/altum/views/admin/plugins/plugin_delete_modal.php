<?php defined('ZEFANYA') || die() ?>

<div class="modal fade" id="plugin_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="modal-title">
                        <i class="fas fa-fw fa-sm fa-trash-alt text-dark mr-2"></i>
                        <?= l('admin_plugin_delete_modal.header') ?>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" title="<?= l('global.close') ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <p class="text-muted"><?= l('admin_plugin_delete_modal.subheader') ?></p>
            </div>

        </div>
    </div>
</div>

<?php ob_start() ?>
<script>
    'use strict';

    /* On modal show load new data */
    $('#plugin_delete_modal').on('show.bs.modal', event => {
        let plugin_id = $(event.relatedTarget).data('plugin-id');

        $(event.currentTarget).find('#plugin_delete_modal_url').attr('href', `${url}admin/plugins/delete/${plugin_id}&global_token=${global_token}`);
    });
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>
