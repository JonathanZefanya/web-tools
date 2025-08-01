<?php defined('ZEFANYA') || die() ?>

<div class="container">
    <?= \Altum\Alerts::output_alerts() ?>

    <?php if(settings()->main->breadcrumbs_is_enabled): ?>
<nav aria-label="breadcrumb">
        <ol class="custom-breadcrumbs small">
            <li><a href="<?= url('tools') ?>"><?= l('tools.breadcrumb') ?></a> <i class="fas fa-fw fa-angle-right"></i></li>
            <li class="active" aria-current="page"><?= l('tools.css_minifier.name') ?></li>
        </ol>
    </nav>
<?php endif ?>

    <div class="row mb-4">
        <div class="col-12 col-lg d-flex align-items-center mb-3 mb-lg-0 text-truncate">
            <h1 class="h4 m-0 text-truncate"><?= l('tools.css_minifier.name') ?></h1>

            <div class="ml-2">
                <span data-toggle="tooltip" title="<?= l('tools.css_minifier.description') ?>">
                    <i class="fas fa-fw fa-info-circle text-muted"></i>
                </span>
            </div>
        </div>

        <?= $this->views['ratings'] ?>
    </div>

    <div class="card">
        <div class="card-body">

            <form action="" method="post" role="form">
                <input type="hidden" name="token" value="<?= \Altum\Csrf::get() ?>" />

                <div class="form-group">
                    <label for="css"><i class="fab fa-fw fa-css3 fa-sm text-muted mr-1"></i> <?= l('tools.css_minifier.css') ?></label>
                    <textarea id="css" name="css" class="form-control <?= \Altum\Alerts::has_field_errors('css') ? 'is-invalid' : null ?>" required="required"><?= e($data->values['css']) ?></textarea>
                    <?= \Altum\Alerts::output_field_error('css') ?>
                </div>

                <button type="submit" name="submit" class="btn btn-block btn-primary"><?= l('global.submit') ?></button>
            </form>

        </div>
    </div>

    <?php if(isset($data->result)): ?>
        <div class="mt-4">
            <div class="table-responsive table-custom-container">
                <table class="table table-custom">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">
                                <?= l('tools.css_minifier.result.css_characters') ?>
                            </td>
                            <td class="text-nowrap <?= $data->css_characters > $data->minified_css_characters ? 'text-danger' : 'text-success'; ?>">
                                <?= nr($data->css_characters) ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="font-weight-bold">
                                <?= l('tools.css_minifier.result.minified_css_characters') ?>
                            </td>
                            <td class="text-nowrap <?= $data->css_characters >= $data->minified_css_characters ? 'text-success' : 'text-danger'; ?>">
                                <?= nr($data->minified_css_characters) ?> <?= '(' . nr(get_percentage_change($data->css_characters, $data->minified_css_characters), 2) . '%)' ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="result"><?= l('tools.css_minifier.result') ?></label>
                            <div>
                                <button
                                        type="button"
                                        class="btn btn-link text-secondary"
                                        data-toggle="tooltip"
                                        title="<?= l('global.clipboard_copy') ?>"
                                        aria-label="<?= l('global.clipboard_copy') ?>"
                                        data-copy="<?= l('global.clipboard_copy') ?>"
                                        data-copied="<?= l('global.clipboard_copied') ?>"
                                        data-clipboard-target="#result"
                                        data-clipboard-text
                                >
                                    <i class="fas fa-fw fa-sm fa-copy"></i>
                                </button>
                            </div>
                        </div>
                        <textarea id="result" class="form-control" rows="10"><?= htmlspecialchars($data->result, ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                </div>
            </div>
        </div>
    <?php endif ?>

<?= $this->views['extra_content'] ?>

    <?= $this->views['similar_tools'] ?>

    <?= $this->views['popular_tools'] ?>
</div>

<?php include_view(THEME_PATH . 'views/partials/clipboard_js.php') ?>
