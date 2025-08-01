<?php defined('ZEFANYA') || die() ?>

<?php ob_start() ?>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="h4 text-truncate mb-0"><i class="fas fa-fw fa-envelope fa-xs text-primary-900 mr-2"></i> <?= l('admin_statistics.email_reports.header') ?></h2>

            <div>
                <span class="badge <?= $data->total['email_reports'] > 0 ? 'badge-success' : 'badge-secondary' ?>"><?= ($data->total['email_reports'] > 0 ? '+' : null) . nr($data->total['email_reports']) ?></span>
            </div>
        </div>

        <div class="chart-container <?= $data->total['email_reports'] ? null : 'd-none' ?>">
            <canvas id="email_reports"></canvas>
        </div>
        <?= $data->total['email_reports'] ? null : include_view(THEME_PATH . 'views/partials/no_chart_data.php', ['has_wrapper' => false]); ?>
    </div>
</div>
<?php $html = ob_get_clean() ?>

<?php ob_start() ?>
<script>
    let color = css.getPropertyValue('--primary');
    let color_gradient = null;

    /* Display chart */
    let email_reports_chart = document.getElementById('email_reports').getContext('2d');
    color_gradient = email_reports_chart.createLinearGradient(0, 0, 0, 250);
    color_gradient.addColorStop(0, set_hex_opacity(color, 0.1));
    color_gradient.addColorStop(1, set_hex_opacity(color, 0.025));

    new Chart(email_reports_chart, {
        type: 'line',
        data: {
            labels: <?= $data->email_reports_chart['labels'] ?>,
            datasets: [{
                label: <?= json_encode(l('admin_statistics.email_reports.chart')) ?>,
                data: <?= $data->email_reports_chart['email_reports'] ?? '[]' ?>,
                backgroundColor: color_gradient,
                borderColor: color,
                fill: true
            }]
        },
        options: chart_options
    });
</script>
<?php $javascript = ob_get_clean() ?>

<?php return (object) ['html' => $html, 'javascript' => $javascript] ?>
